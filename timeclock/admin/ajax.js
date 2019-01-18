// CLOCK ME 
function clockMe() {
$(document).ready(function(){
	var userid 	= $("#userid").val();
	var pin		= $("#pin").val();
	var note	= $("#note").val();

	$.ajax({                                      
	  url: 'http://www.goliathmade.com/timeclock/ajax/action.php?',
	  data: "do=clockMe&userid="+userid+"&pin="+pin+"&note="+note,
	  dataType: 'json',  
	  success: function(data){
	  		if (data=='0'){
	   			window.location='go/index.php?youJust=in';
	   		if (data=='1'){
	   			window.location='go/out.php?youJust=out';
	   		}
	   		if (data=='2'){
	   			$('#status').empty().append('Wrong user/pin');
	   		}
	   }
	   }
	});
	});
return false;
};	

// statusCheck == Check if someone is clocked in or out
function statusCheck() {
$(document).ready(function(){
	var userid 	= $("#userid").val();

	$.ajax({                                      
	  url: 'http://www.goliathmade.com/timeclock/ajax/action.php?',
	  data: "do=statusCheck&userid="+userid,
	  dataType: 'json',  
	  success: function(data){
	  		if (data=='0'){
	   			$('#status').html('Currently Clocked In');
	   		}
	   		if (data=='1'){
	   			$('#status').html('Currently Clocked Out');
	   		}
	   		if (data=='2'){ }
	   }
	});
	});
return false;
};	

// Admin Login
function adminLogin() {
$(document).ready(function(){
	var email 	= $("#email").val();
	var pass	= $("#password").val();

	$.ajax({                                      
	  url: 'http://www.goliathmade.com/timeclock/ajax/action.php?',
	  data: "do=adminLogin&email="+email+"&pass="+pass,
	  dataType: 'json',  
	  success: function(data){
	  		if (data=='0'){
	   			window.location='admin/dash';
	   		if (data=='1'){
	   			window.location='go/out.php?youJust=out';
	   		}
	   		if (data=='2'){
	   			$('#status').empty().append('Wrong user/pin');
	   		}
	   }
	   }
	});
	});
return false;
};	



/*
// Search
function search() {
$(document).ready(function(){ 
	
	var value = $('#search')[0].value;
	//$('#goal-feed').prepend('Loading…');
	if (value==''){
		printGoals();
	}
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: 'do=search&value='+value,
	  dataType: 'json',  
	  success: function(data)
	  {
	  	 $('#goal-feed').empty();
	  	 
	  	    for (var i in data)
	    {	    	
	    	var id = data[i].user; 
	    	var goalID = data[i].id;
	    	
	    	$('#goal-feed').append('<li class=\'goal-item goal-item ui-li ui-li-static ui-body-b\'><span class=\'user\'><a href="#goalClicked" id="notif" data-transition="slide" onClick="goalClicked('+id+') ; userProfile('+id+');"><div id="name'+goalID+'">'+data[i].firstname+'&nbsp'+data[i].lastname+'</div></a></span><abbr class=\'timeago\' title=\'\'>'+data[i].timestamp+'</abbr><p class=\'goal\'>'+data[i].goal+'</p><div class="clearfix"></div><a href="#" id="'+goalID+'" onClick="likeFav('+goalID+'); likeFavNum('+goalID+')">&#9734</a><a href="#likers" class="num-'+goalID+'" onClick="showLikers('+goalID+')"></a><a href="#delete?id='+goalID+'" id="delete'+goalID+'"></a></li>');
	   		
	    }
	   }
	  		});
	return false;
	});
	return false;
}; 


//Print All Goals ======================================================================================================================================
function printGoals() {
$(window).load(function(){ 
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: 'do=printGoals',
	  dataType: 'json',  
	  success: function(data)
	  {
	  	    for (var i in data)
	    {	    	
	    	var id = data[i].user; 
	    	var goalID = data[i].id;
	    	
	    	starStatus(+goalID);
	    	//name(+goalID);
	    	isitMyGoal(+id, +goalID);	    	
	    	likeFavNum(+goalID);
	    	
	    	$('#goal-feed').append('<li class=\'goal-item goal-item ui-li ui-li-static ui-body-b\'><span class=\'user\'><a href="#goalClicked" id="notif" data-transition="slide" onClick="goalClicked('+id+') ; userProfile('+id+');"><div id="name'+goalID+'">'+data[i].firstname+'&nbsp'+data[i].lastname+'</div></a></span><abbr class=\'timeago\' title=\'\'>'+data[i].timestamp+'</abbr><p class=\'goal\'>'+data[i].goal+'</p><div class="clearfix"></div><a href="#" id="'+goalID+'" onClick="likeFav('+goalID+'); likeFavNum('+goalID+')">&#9734</a><a href="#likers" class="num-'+goalID+'" onClick="showLikers('+goalID+')"></a><a href="#delete?id='+goalID+'" id="delete'+goalID+'"></a></li>');
	   		
	    }
	    var lastmsg = goalID;
	    $('#goal-feed').append('<center><button href=\'#\' id=\'more\' onClick=\'loadMoreGoals('+lastmsg+');\'>Load More Goals</button></center>');
	    }
	  		});
	return false;
	});
	return false;
}; 

// goalClicked :: print all goals by that person ======================================================================================================
function goalClicked(id){
$(document).ready(function(){
		
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: "do=goalClicked&id="+id, 
	  dataType: 'json',  
	  success: function(data)
	  {		   
	    $('.goalClicked').empty();
	    for (var i in data)
	    {
	    	//var id = data[i].user; 
	    	var userID = data[i].user;
	    	var goalID = data[i].id;
	    	starStatus(+goalID);
	    	isitMyGoal(+id, +goalID);
	    	likeFavNum(+goalID);
	    	
	    	$('.goalClicked').append('<li class=\'goal-item goal-item ui-li ui-li-static ui-body-b\'><span class=\'user\'><a href="#goalClicked" id="notif" data-transition="slide" onClick="goalClicked('+id+') ; userProfile('+id+');"><div id="name'+goalID+'">'+data[i].firstname+'&nbsp'+data[i].lastname+'</a></div></span><abbr class=\'timeago\' title=\'\'>'+data[i].timestamp+'</abbr><p class=\'goal\'>'+data[i].goal+'</p><div class="clearfix"></div><a href="#" id="'+goalID+'" onClick="likeFav('+goalID+')">&#9734</a><a href="#likers" class="num-'+goalID+'" onClick="showLikers('+goalID+')"></a><a href="#delete?id='+goalID+'" id="delete'+goalID+'"></a></li>');	    
	    }	  
	   var lastmsg = goalID;
	    $('.goalClicked').append('<center><a href="#" id="more" onClick="secondLoadMoreGoals('+lastmsg+","+userID+');">Load More Goals</a></center>');
	  } 
	});
	});
return false;
};

// userProfile :: The users profile (that you clicked) ================================================================================================
function userProfile(id){
$(document).ready(function(){
		
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: "do=userProfile&id="+id, 
	  dataType: 'json',  
	  success: function(data){
	  $('.userProfile').empty();
	  for (var i in data){
	  	
	  {	
	  	$('.userProfile').append('<ul class=\'interior-list-goalClicked\'><li class=\'goals-list-title ui-li ui-li-static ui-body-b ui-corner-top\'>'+data[i].firstname+' '+data[i].lastname+'<br>About: '+data[i].about+'<br>url: <a href='+data[i].site+'>'+data[i].site+'</a></li>');
	   } 	  
	  } 
	}
	});
	});
return false;
};

// getID		=====================================================================================================================================
function getID(){
	var id = $('div.id-val').text();
	return id;
}

// getEmail ============================================================================================================================================
	function getEmail() {
		$(document).ready(function(){
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=getEmail",
				success: function(data){
				 		$('.id-val').append(' '+data);
				
				}
				
				
			});
		});
	return false;
	}
	

// showEditProfile (shows the edit profile page -- does not actually perform the edit (doEditProfile does) ============================================
function showEditProfile() {
$(document).ready(function(){
	
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: "do=showEditProfile",
	  dataType: 'json',  
	  success: function(data)
	  {
	  	$('.interior-list').append('<ul class=\'interior-list-my-goals\'><li class=\'goals-list-title ui-li ui-li-static ui-body-b ui-corner-top\'>Edit Profile</li>');
	  		for(var i in data){ 
	    	$('.editProfile').empty().append('<li class=\'goal-item goal-item ui-li ui-li-static ui-body-b\'><input type="text" id="fname" placeholder="First Name" value="'+data[i].firstname+'"><br><input type="text" id="lname" placeholder="Last Name" value="'+data[i].lastname+'"><br><br><input type="text" id="email" placeholder="Email Address" value="'+data[i].email+'"><br><input type="password" placeholder="Password" id="pass"><br><input type="password" placeholder="Confirm Password" id="confirmPass"><br><input type="text" id="site" placeholder="Site/Blog" value="'+data[i].site+'"><br><br><textarea cols="30" placeholder="About/Bio" rows="5" id="about" value="'+data[i].about+'">'+data[i].about+'</textarea><br><a href="#me" id="editProfile"  onClick="doEditProfile('+data[i].id+')">Save</button></li>');
	    }
	  
	  } 
	});$('.interior-list').append('</ul>');
	});
return false;
};

// Post New Goal function: goalPost ====================================================================================================================
function goalPost(){
		$(function(){
			
			var newPost = $("#newPost")[0].value;
			
			$.ajax({
				url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
				data: 'do=post&post='+newPost,
				dataType: 'json',
				success: function(data){
					window.location="http://www.goliathmade.com/goalpost/index.html";							
				}
			});
		
		});
	
}

/*
//OLD Post new goal ========================================================================================================================================
function goalPost() {
	$.post('http://www.goliathmade.com/goalpost/ajax/action.php', { do: "John" }, $('#newPost').serialize(), function(data){  
		window.location='index.html';
		$('#newPost').val = '';
	});
return false;
} 
*/
/*
//Logged in User Data =================================================================================================================================
function userData(){
		$(function(){
			$.ajax({
				url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
				async: false,
				data: 'do=userData',
				dataType: 'json',
				success: function(data){
				
				var id = data.id;              //get id
				$(".id-val").append(+id);
				
				//return id;
				//alert(+id);
				//var fname = data.firstname;								
				//	$('#notif').append(' for '+fname+'');
						
				}
			 	
			});
		
		});
}

// Logout ==============================================================================================================================================
function logout() {
		$(document).ready(function(){
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/splashLogin.php",
				data: "do=logout",
				success: function(result){
						window.location='index.html';
					}
					
			});
		});
	return false;
	} 

// Login ==============================================================================================================================================
	function login() {
		$(document).ready(function(){
			var email 		= $("#email")[0].value;
			var password 	= $("#password")[0].value;
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/splashLogin.php",
				data: "email="+email+"&password="+password,
				dataType: "json",
				success: function(result){
					// IF USER DOESNT EXIST IN DB GO TO PAGE2 WHERE THEY WILL FILL IN FIRST AND LAST NAME
					if (result==0) {
						window.location='#page2';
					}
					// IF USER DOES EXIST, THEN JUST LOG THEM IN.
					if (result==1){
						window.location='index.html';
					}
					else {
					$("#error").append("Try again, human!");
					}
				}
				
			});
		});
	return false;
	}

// fbLogin user info ===================================================================================================================================
function fbLogin(){
		$(document).ready(function(){
			$.ajax({
				url: 'http://www.goliathmade.com/goalpost/facebook-php-sdk/examples/example.php',
				data: 'do=loginUrl',
				success: function(data){
					
					//$(".id-val").append('hey'+data);
					window.location=''+data;
				//return id;
				//alert(+id);
				//var fname = data.firstname;								
				//	$('#notif').append(' for '+fname+'');
						
				}
			 	 
			 	 });
		
		});
}


// finishSignUp =======================================================================================================================================
	function finishSignUp() {
		$(document).ready(function(){
			var fname		= $("#firstname")[0].value;
			var lname		= $("#lastname")[0].value;
			//var handle		= $("#handle")[0].value;
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/splashLogin.php",
				data: "do=finishSignUp&fname="+fname+"&lname="+lname,
				success: function(result){
						window.location='index.html';
					}
					
			});
		});
	return false;
	}

// 	likeFav ============================================================================================================================================ 

	function likeFav(id) {
		$(document).ready(function(){
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=likeFav&id="+id,
				dataType: 'json',
				success: function(data){		 
					if (data=="success"){
						 $('#'+id+'').empty().append('&#9733;');					 		
					}
					if (data=="deleted"){
						$('#'+id+'').empty().append('&#9734;');
					}
				}
			});
		});
	return false;
	} 

// 	likeFavNum ========================================================================================================================================= 

	function likeFavNum(id) {
		$(document).ready(function(){
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=likeFavNum&id="+id,
				dataType: 'json',
				success: function(data){		 		 
						 if (data==1){ 
						 	var likeOrLikes ='like'; 
						 }
						 if (data>1){ 
						 	var likeOrLikes ='likes'; 
						 } 
						 if (data==0){
						 	var likeOrLikes ='';
						 	$('#'+id+'').append();
						 	
						 }
						 if (data>0){
						 $('.num-'+id+'').empty().append('  '+data+' '+likeOrLikes+'');					 		
						}
				}
			});
		});
	return false;
	} 
// show likers =========================================================================================================================================
	function showLikers(id) {
		$(document).ready(function(){
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=showLikers&id="+id,
				dataType: 'json',
				success: function(data){		 
						$('.likers').empty();
						 for(var i in data) {
						 
						 $('.likers').append('<a href="#goalClicked" id="notif" onClick="goalClicked('+data[i].id+'); userProfile('+data[i].id+')">'+data[i].firstname+' '+data[i].lastname+'</a><br>'+data[i].about+'<br><br>');
				}		 
				}
			});
		});
	return false;
	} 
	
// starStatus==================== Check if logged-in-USER likes this post. if YES --> display green star.	===========================================
	function starStatus(id) {
		$(document).ready(function(){
			
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=starStatus&id="+id,
				dataType: "json",
				success: function(result){
				 	if (result){
				 		$('#'+id+'').empty().append('&#9733;');
					}
				}
				
				
			});
		});
	return false;
	}

// name ==================== Get First Name Last Name From Users Table to append printGoals============================================================
	function name(id) {
		$(document).ready(function(){
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=name&id="+id,
				dataType: "json",
				success: function(data){
				
					for (var i in data){
				 		//$('#name'+id+'').append(''+data[i].firstname+'');
						//alert(+data);
					}				
				}				
			});
		});
	return false;
	}

// STEAL ==============================================================================================================================================
	function steal() {
		$(document).ready(function(){
			var id = $("#id")[0].innerHTML;
			$.ajax({
				type: "GET",
				url: "http://www.goliathmade.com/goalpost/ajax/steal.php",
				data: "id="+id,
				success: function(result){
					if(result) {
						 window.location='index.html';
					}
				}
			});
		});
	return false;
	}	
	
// NOTIFICATIONS - NUMBER OF NEW ONES ==================================================================================================================
function numNotif() {		
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: "do=numNotif",
	  dataType: 'json',  
	  success: function(data)
	  {
	  	if (data >= 1) {
	  		$('#notif').html('&#9830; '+data+' New ');
	  	}	  	
	    if (data < 1 ) {
	    	$('#notif').html('Notifications');
	    }
	  } 
	});
return false;
};

// GOAL DATA FOR DISPLAYING NOTIFICATIONS =============================================================================================================
function notifUserData(id, notif_id) {		
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: "do=notifData&id="+id,
	  dataType: 'json',  
	  success: function(data){
	  		for(var i in data){
	  		$('.fnameLname'+notif_id).empty().append(''+data[i].firstname+' '+data[i].lastname);
	  	
	  }
	  } 
	});
return false;
};

// CLEAR NOTIFICATIONS ================================================================================================================================
function clearNotif() {		
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: "do=clearNotif",
	  dataType: 'json',  
	  success: function(data){
	  
	  } 
	});
return false;
};

// GET USER DATA FOR DISPLAYING NOTIFICATIONS =========================================================================================================
// GETS FNAME + LAST NAME + GOAL FOR NOTIFICATION INFO
function notifGoalData(id, notifID) {		
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: "do=notifGoalData&id="+id,
	  dataType: 'json',  
	  success: function(data){
	  		for(var i in data){
	  		$('.goalNotif'+notifID).empty().append(''+data);
	  	
	  }
	  } 
	});
return false;
};

// ====================================================================================================================================================
// 						NOTES: Theres def got to be a way to optimize this. The viewNotif() looping functions has to be so inefficient
// VIEW NOTIFICATIONS =================================================================================================================================
function viewNotif() {
	$.ajax({                                      
	  url: 'http://www.goliathmade.com/goalpost/ajax/action.php',
	  data: "do=viewNotif",
	  dataType: 'json',  
	  success: function(data)
	  { 	    
	    for(var i in data){
	    	
	    	// GET THE ID PER goal row IN goal TABLE 
	    	var id = data[i].goal_id;
	    	// GET THE ID PER notification row IN THE notif TABLE
	    	var notifID = data[i].id;
	    	// RUN notifUserData function in a loop to show first and last names etc.
	    	notifUserData(+data[i].actor_id, +notifID);
	    	// RUN notifGoalData in loop to get goal and .append() goal to appropriate post
	    	notifGoalData(+data[i].goal_id, +notifID);
	    	
	    	$('.interior-list').append('<li class=\'goal-item goal-item ui-li ui-li-static ui-body-b\'><a href="#goalClicked" id="notif" data-transition="slide" onClick="goalClicked('+data[i].actor_id+'); userProfile('+data[i].actor_id+')"><p class=\'fnameLname'+notifID+'\'></p></a>&nbsp'+data[i].action+' your goal<p class=\'goal\'></p><p id=\'id\'></p><p class=\'via\'></p><p class=\'goalNotif'+notifID+'\'></p><p class=\'goal-item-controls\'>'+data[i].time+'</p><div class="clearfix"></div></li>');
	    }
	  } 
	});
return false;
};

// LIMIT TEXT IN POST NEW GOAL BOX TO 140 CHARS ========================================================================================================
function limitText(limitField, limitCount, limitNum) {
	if (limitField.value.length > limitNum) {
		limitField.value = limitField.value.substring(0, limitNum);
	} else {
		limitCount.value = limitNum - limitField.value.length;
	}
}

// deleteGoal =================== DELETE GOAL ==========================================================================================================
	function deleteGoal(goalID) {
		$(document).ready(function(){
			
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=deleteGoal&goalID="+goalID,
				datatype: "json",
				success: function(result){
				 	if (result){
				 		$('#message').empty().append('Your goal was deleted.');
						window.location="index.html"
					}
				}
				
				
			});
		});
	return false;
	}

// isitMyGoal == CHECKS TO SEE IF IT IS YOUR GOAL, IF IT IS: DISPLAYS delete BUTTON ====================================================================

	function isitMyGoal(id, goalID) {
		$(document).ready(function(){
			
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=isitMyGoal&userID="+id,
				datatype: "json",
				success: function(result){
				 	if (result){
				 		$('#delete'+goalID+'').empty().append('<font size="1">&nbsp; Delete</font>');
					}
				
				}
				
				
			});
		});
	return false;
	}

// $_GET equivalent for JS =============================================================================================================================

function getQuerystring(key, default_)
{
  if (default_==null) default_=""; 
  key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
  var qs = regex.exec(window.location.href);
  if(qs == null)
    return default_;
  else
    return qs[1];
}

// loadMoreGoals ==== LOAD MORE GOALS FUNCTION =========================================================================================================
	function loadMoreGoals(lastmsg) {
		$(document).ready(function(){
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=loadMoreGoals&lastmsg="+lastmsg,
				dataType: "json",
				success: function(data){
				// If there is no data returned, remove 'Load More Goals' link and add 'The end.'
				if (data==''){
					$('#more').remove(); // removing old more button
					$('#goal-feed').append('<center><div id="more">The end.</div></center>');
				}
				 if (data !=''){				 
				 for (var i in data){	    	
	    			var id = data[i].user; 
	    			var goalID = data[i].id;
	    			
	    			starStatus(+goalID);
	    			name(+goalID);
	    			isitMyGoal(+id, +goalID);
				 	likeFavNum(+goalID);
				 	
$('#goal-feed').append('<li class=\'goal-item goal-item ui-li ui-li-static ui-body-b\'><span class=\'user\'><a href="#goalClicked" id="notif" data-transition="slide" onClick="userProfile('+id+'); goalClicked('+id+')"><div id="name'+goalID+'">'+data[i].firstname+'&nbsp'+data[i].lastname+'</div></a></span><abbr class=\'timeago\' title=\'\'>'+data[i].timestamp+'</abbr><p class=\'goal\'>'+data[i].goal+'</p><div class="clearfix"></div><a href="#" id="'+goalID+'" onClick="likeFav('+goalID+')">&#9734</a><a href="#likers" class="num-'+goalID+'" onClick="showLikers('+goalID+')"></a><a href="#delete?id='+goalID+'" id="delete'+goalID+'"></a></li>');
					
$('#more').remove(); // removing old more button
					}
					}
					var lastmsg = goalID;
	  				$('#goal-feed').append('<center><a href="#" id="more" onClick="loadMoreGoals('+lastmsg+');">Load More Goals</a></center>');
				}
				
				
			});
		});
	return false;
	}
	
// secondLoadMoreGoals ==== LOAD MORE GOALS FUNCTION for GoalClicked ==================================================================================
	function secondLoadMoreGoals(lastmsg, userID) {
		$(document).ready(function(){
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/ajax/action.php",
				data: "do=secondLoadMoreGoals&lastmsg="+lastmsg+"&id="+userID,
				dataType: "json",
				success: function(data){
				// If there is no data returned, remove 'Load More Goals' link and add 'The end.'
				if (data==''){
					$('#more').remove(); // removing old more button
					$('.goalClicked').append('<center><div id="more">The end.</div></center>');
				}
				
				 if (data !=''){				 
				 for (var i in data){	    	
	    		
	    			var id = data[i].user; 
	    			var goalID = data[i].id;
	    			
	    			starStatus(+goalID);
	    			name(+goalID);
	    			isitMyGoal(+id, +goalID);
				 	likeFavNum(+goalID);
				 	
$('.goalClicked').append('<li class=\'goal-item goal-item ui-li ui-li-static ui-body-b\'><span class=\'user\'><a href="#goalClicked" id="notif" data-transition="slide" onClick="userProfile('+id+'); goalClicked('+id+')"><div id="name'+goalID+'">'+data[i].firstname+'&nbsp'+data[i].lastname+'</div></a></span><abbr class=\'timeago\' title=\'\'>'+data[i].timestamp+'</abbr><p class=\'goal\'>'+data[i].goal+'</p><div class="clearfix"></div><a href="#" id="'+goalID+'" onClick="likeFav('+goalID+')">&#9734</a><a href="#likers" class="num-'+goalID+'" onClick="showLikers('+goalID+')"></a><a href="#delete?id='+goalID+'" id="delete'+goalID+'"></a></li>');
					
			$('#more').remove(); // removing old more button
					}
					
			var lastmsg = goalID;
	  		$('.goalClicked').append('<center><a href="#" id="more" onClick="secondLoadMoreGoals('+lastmsg+","+id+');">Load More Goals</a></center>');
							   
				
				}
				}
				
				
				
			});
		});
	return false;
	}	


// getFBdeets =================================================================================================================================
function getFBdeets() {
		$(document).ready(function(){
			
			$.ajax({
				url: "http://www.goliathmade.com/goalpost/facebook-php-sdk/examples/example.php?do=finishLogin",
				data: "finishLogin",
				success: function(data){				 	
				 		window.location="http://www.goliathmade.com/goalpost";
					
				}				
				
			});
		});
	return false;
	}

*/	