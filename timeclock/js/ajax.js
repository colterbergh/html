function doesUserExist(){
	var userid 	 = $("#username").val();
	
	$.ajax({
		url:"../../ajax/action.php",
		data:"do=doesUserExist&userid="+userid,
		success: function(data){
			
			if(data=='success'){
				$('#statusOut').empty();
				$('#status').empty().html('Available :)');
				}
			else{
				$('#status').empty(); 
				$('#statusOut').empty().html('Username taken :(');
			}
		}
	});

}



function goHome(){
	window.location='index.php'
}

function saveEdit(count){
	var userid 	 = $("#username").val();
	var time 	 = $("#time"+count).val();
	var origTime = $("#origTime"+count+"").val();

	$.ajax({
		url:"../../ajax/action.php",
		data:"do=saveEdit&userid="+userid+"&count="+count+"&time="+time+"&origTime="+origTime,
		success: function(data){
			
			if(data=='success'){
				$('#etBtn').empty().html('Saved!');
				}
			else{ 
				$('#etBtn').empty().html('Error');
			}
		}
	});

}

function testy(){
	$("#testy").empty();

}

function dashFade(){
	$("#dashFade").fadeIn("fast");
	$("#menuIcon").empty();
}

function openSignup(){

	$("#signUpButton").empty().html("<br><br><br>");
	$("#signin").empty();
    
	$("#signUpForm").fadeIn("slow");	
}

// CLOCK ME 
function clockMe() {
$(document).ready(function(){

	var userid 	= $("#userid").val();
	var pin		= $("#pin").val();
	var note	= $("#note").val();

	$.ajax({                                      
	  url: '../ajax/action.php?',
	  data: "do=clockMe&userid="+userid+"&pin="+pin+"&note="+note,
	  success: function(data){
	  			
	  			$('#updateButton').empty();
	  			$('#status').empty();
	   			$('#statusOut').empty();
	   			$('#userid').val('');
	   			$('#pin').val('');
	  		if (data=='0'){
	   				   			
	   			$('#status').html('You just clocked in.');
	   		}	
	   		if (data=='1'){
	   			$('#statusOut').html('You just clocked out.');
	   			return false;
	   		}
	   		if (data=='2'){
	   			$('#statusOut').html('Wrong user/pass.<br>Try again homie.');
	   			return false;
	   		}
	  		
	  }
	});
	});
return false;
};	

// statusCheck // Check if someone is clocked in or out
function statusCheck() {
$(document).ready(function(){
	
	var userid 	= $("#userid").val();
	
	$.ajax({                                      
	  url: '../ajax/action.php',
	  data: "do=statusCheck&userid="+userid,
	  success: function(data){
	  		
	  		if (data=='0'){
	   			//$('#statusOut').empty();
	   			//$('#status').empty().html('Currently Clocked In');
	   			$('#updateButton').html('<input type="submit" class="form-control btn btn-warning" style="width:240px;" value="CLOCK OUT">');
	   		}
	   		if (data=='1'){
	   			//$('#status').empty();
	   			//$('#statusOut').empty().html('Currently Clocked Out');
	   			$('#updateButton').html('<input type="submit" class="form-control btn btn-success" style="width:240px" value="CLOCK IN">');
	   		}
	   		if (data=='2'){ 
	   		//	$('#updateButton').empty().html();
				
	   			$('#updateButton').empty().html('<br><input type="submit" class="form-control btn btn-success" style="width:240px" value="CLOCK IN"> <br>First Time Clock In.<br>or Invalid User.');
	   		}
	   		
	   }
	});
	});

return false;
};	


function adminLogin() {
    var email = document.getElementById('email').value;
    var pass = $("#password").val();
    
    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
    if (pattern.test(email)) {
        
        $.ajax({                                      
	  url: '../ajax/action.php',
	  data: "do=adminLogin&email="+email+"&pass="+pass,
	  dataType: 'json',  
	  success: function(data){	
	  		if (data=="0"){
	   			window.location='dash/';
	   			}
	   		if (data=="1"){	   	
	   			$('#statusOut').empty().html('Wrong email or password');
	   		}
	   }
	   
	}); 
        return true;
    } else {
       
        $("#statusOut").html('Hey, bad email/password.');
        return false;
    }
}


// SHow EMployees
// Debugged this for a while, only works WITHOUT the document.ready(function part
function showE() {

	$.ajax({                                      
	  url: '../../ajax/action.php?',
	  data: 'do=showE',
	  dataType: 'json',  
	  success: function(data){
	  	$('#showEmployees').empty().append('Name | Username <br>');
	  		
	  		for (var i in data){	    	
	    		$('#showEmployees').append('<li>'+data[i].firstname+' '+data[i].lastname+' '+data[i].userid+'</li>');	
	    	}
	   }
	   
	});

};

// add employee
function addEmployee() {
	var firstname 	= $("#firstname").val();
	var lastname 	= $("#lastname").val();
	var username	= $("#username").val();
	var email		= $("#email").val();
	var password	= $("#password").val();
	var confirm		= $("#confirm").val(); 
	
$.ajax({
	url:  '../../ajax/action.php?',
	data: 'do=addEmployee&firstname='+firstname+'&lastname='+lastname+'&username='+username+'&email='+email+'&password='+password+'&confirm='+confirm,
	success:  function(data){
		
		if (data=='1'){
			$('#message').html('Your passwords don\'t match');
		}
		
		if (data=='usernameTaken'){
			$('#message').html('Username already taken'); 
		}
		if (data=='success'){
			//$('#message').html('Employee Added!');
			window.location="employee.php?do=add";
		}
		else
			$('#message').html(data);
	}
});
};

// edit employee
function editEmployee() {	

	var firstname = $("#firstname").val();
	var lastname = $("#lastname").val();
	var username = $("#username").val();
	var email	= $("#email").val();
	var password = $("#password").val();
	var confirm = $("#confirm").val();
	
$.ajax({
	url:  '../../ajax/action.php?',
	data: 'do=editEmployee&firstname='+firstname+'&lastname='+lastname+'&username='+username+'&email='+email+'&password='+password+'&confirm='+confirm,
	success:  function(data){
		alert(data);
		if (data=='1'){
			$('#statusOut').html('Your passwords don\'t match');
		}
		if (data=='success'){
			$('#status').html('Saved!');
		}
		if (data=='error'){
			$('#statusOut').html('Error'); 
		}
	}
});
};


// newCompany
function newCompany() {

	var email = document.getElementById('email').value;   
    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
    if (pattern.test(email)) {
    
	$.ajax({
		url:  'ajax/action.php',
		data: 'do=newCompany&email='+email,
		success:  function(data){
	
		if (data=='success'){
			window.location="admin/dash/index.php";
		}
		if (data=='companyTaken'){
			$('#statusOther').html('Email taken :|'); 
		}		
	}	

	});
	return true;
    } else {       
        $("#statusOther").html('Valid email please :)');
        return false;
    }
};

// newCoVia -- new company via sign up page (url  and window.location has to be different.
function newCoVia() {
	
	var email = document.getElementById('email').value;   
    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;

    if (pattern.test(email)) {
    
	$.ajax({
		url:  '../ajax/action.php',
		data: 'do=newCompany&email='+email,
		success:  function(data){
		if (data=='success'){
			window.location="../admin/dash/index.php";
		}
		if (data=='companyTaken'){
			$('#statusOther').html('Email taken :|'); 
		}		
	}	

	});
	return true;
    } else {       
        $("#statusOther").html('Valid email please :)');
        return false;
    }
};

// edit Company
function editCompany() {
	var date1				= $("#date1").val();
	var date2				= $("#date2").val();
	var email 				= $("#email").val();
	var companyName 		= $("#companyName").val();
	var password 			= $("#password").val();
	var confirmPassword 	= $("#confirmPassword").val();
	var payrollDate 		= $("#payrollDate").val();
	
	if(date2>date1){

	$.ajax({
	url: '../../ajax/action.php?',
	data: 'do=editCompany&email='+email+'&companyName='+companyName+'&password='+password+'&confirmPassword='+confirmPassword+'&date1='+date1+'&date2='+date2,
	success: function(data){
		$("#status").empty();
		$("#statusOut").empty();
		
		if(data=='success'){
			$("#replaceSaveBtn").empty();
			$("#status").html('<input type="button" value="Saved" style="width:115px;" class="form-control btn btn-info" onclick="editCompany()"> <input type="button" value="Home" style="width:115px;" class="form-control btn btn-danger" onclick="goHome()">');	
		}
		else 
			$("#statusOut").html('Passwords don\'t match');
	}
	});
}
	else $("#statusOut").html('Fix date range: Low 1st, High 2nd.');
};

// Let go / remove employee (goes off of 'count' (unique id) for employee
function letGo(count){

  $.ajax({
	url: '../../ajax/action.php?',
	data: 'do=letGo&count='+count,
	success: function(data){
		$("#status").empty();
		$("#statusOut").empty();
		
		if(data=='success'){
			$("#message").html('Employee removed.<br> View / undo under <a href="past.php"><b>Past Employees</b></a><br>in Employee Center');	
		}
		else 
			$("#statusOut").html('Error');
	}
  });	
}

// Restore Employee (after being removed)
function restore(count){
  
  $.ajax({
	url: '../../ajax/action.php?',
	data: 'do=restore&count='+count,
	success: function(data){
		
		$("#status").empty();
		$("#statusOut").empty();
		
		if(data=='success'){
			$("#status").html('Employee Restored');	
		}
		else 
			$("#statusOut").html('Error');
	}
  });	
}

function expandAdd(){
	$("#expandAdd").fadeIn("fast");

}

