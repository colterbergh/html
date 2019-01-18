<?php
//"Just because there are a lot of people working on something doesn't mean the problem is solved" - Drew Houston
require_once("db.php");

$do		= mysql_real_escape_string($_GET['do']);
$id		= mysql_real_escape_string($_GET['id']);
$userid = mysql_real_escape_string($_GET['userid']);
$pin 	= mysql_real_escape_string($_GET['pin']);
$note	= mysql_real_escape_string($_GET['note']);
$email	= mysql_real_escape_string($_GET['email']);
$password	= mysql_real_escape_string($_GET['pass']);

$timestamp = time();

// clockMe Clock me in or out functionality
if ($do=='clockMe'){
 //See if user exists and if password is correct
 $q = mysql_query("SELECT userid,companyid FROM user WHERE userid='$userid' AND pin='$pin'");
 $row = mysql_fetch_assoc($q);
 	$companyid = $row['companyid'];
 	if ($row > 0){
 		
 		//Should work for first clock in
 		//See what last action was (in or out) so we can do the opposite
 		$q = mysql_query("SELECT action FROM action WHERE userid='$userid' ORDER BY count DESC LIMIT 1");
 		$row = mysql_fetch_assoc($q);
 			// If last action was OUT, make next action IN
 			if ($row['action']=='IN'){
 				$action='OUT';
 			}
 			else
 				$action='IN';	
 			
 			// Perform ClockIn or ClockOut
 			$go = mysql_query("INSERT INTO action (count, companyid, userid, action, timestamp, note) VALUES ('', '$companyid', '$userid', '$action', '$timestamp', '$note')");
		if ($go){
			//Message handling for json/ajax 0 = just clocked in, 1 = just clocked out, 2 = wrong user/pin
			if ($action=='IN'){
				$message = '0';
			}
			if ($action=='OUT'){
				$message = '1';
			}
		echo json_encode($message);
		}
			
	}		
else echo json_encode('2');
exit; 
}
	
// statusCheck functionality
if ($do=='statusCheck'){
	$q = mysql_query("SELECT action FROM action WHERE userid='$userid' ORDER BY count DESC LIMIT 1");
 		$row = mysql_fetch_assoc($q);	
		if ($row['action']=='IN'){
 				echo json_encode('0');
 			}
 		elseif ($row['action']=='OUT'){
 				echo json_encode('1');
 		}	
 		    else
 				echo json_encode('2');
exit;
}

// Admin Login 
if ($do=='adminLogin'){	
	$q = mysql_query("SELECT * FROM company WHERE email='$email' AND password='$password'");
	$row = mysql_fetch_assoc($q);
	
	if ($row > 0){
		
		$_SESSION['name'] = $row['name'];
		// company id
		$_SESSION['id']   = $row['id'];
		$_SESSION['email'] = $email;
		//
	echo json_encode('0');
	}
	else
		echo json_encode('1');
exit;
} 

// Employees : ShowEmployees
if ($do=="showE"){
	if(isset($_SESSION['$array'])){	
		echo json_encode($_SESSION['$array']);
		exit;
	}
	
	//$q = mysql_query("SELECT companyid from user UNION ALL SELECT id from company");
	$q = mysql_query("SELECT firstname, lastname,userid FROM user WHERE companyid='$_SESSION[id]'"); 
	$row = mysql_fetch_array($q);
	$array = array();
  	while($row = mysql_fetch_array($q)){
  		$array[] = $row;
  		
  	}
  	// Save employees in Session array 
	$_SESSION['$array'] = $array;  
echo json_encode($array);
exit;
}

// ADD new Employee
if($do=="addEmployee"){
  
  //if ($firstname != "" && $lastname != "" && $username != "" && $password != "" && $confirm != ""){

	$firstname = mysql_real_escape_string($_GET['firstname']);
	$lastname = mysql_real_escape_string($_GET['lastname']);
	$username = mysql_real_escape_string($_GET['username']);
	$password = mysql_real_escape_string($_GET['password']);
	$confirm = mysql_real_escape_string($_GET['confirm']);
	
	//echo $firstname.$lastname.$username.$password.$confirm;
	
	// See if this username already exists
	$q = mysql_query("SELECT userid FROM user WHERE userid='$username' AND companyid='$_SESSION[id]'");
	$row = mysql_fetch_array($q);
	$num = mysql_num_rows($q);
	
		// check to see if passwords match
		if ($password != $confirm){
				echo json_encode('1');
				exit;
			}
		
	// insert into database if userid doesnt already exist
	if($num==0){
		$q = mysql_query("INSERT INTO user (companyid, userid, pin, firstname, lastname, count) VALUES ('$_SESSION[id]','$username', '$password', '$firstname', '$lastname', ''); ");
		if ($q){
			// Get all employees to save in session array
			$q = mysql_query("SELECT firstname, lastname,userid FROM user WHERE companyid='$_SESSION[id]'"); 
			$row = mysql_fetch_array($q);
			$array = array();
  			while($row = mysql_fetch_array($q)){
  				$array[] = $row;  		
  			}
  			// Save employees in Session array 
			$_SESSION['$array'] = $array;  
			//success
			echo json_encode('success');
		}
	}
  else echo json_encode('usernameTaken');
  //}
exit;
}

// Edit Employee //can't change Company ID or Username
if($do=="editEmployee"){
  
  //if ($firstname != "" && $lastname != "" && $username != "" && $password != "" && $confirm != ""){

	$firstname = mysql_real_escape_string($_GET['firstname']);
	$lastname = mysql_real_escape_string($_GET['lastname']);
	$username = mysql_real_escape_string($_GET['username']);
	$password = mysql_real_escape_string($_GET['password']);
	$confirm = mysql_real_escape_string($_GET['confirm']);
	
	//echo $firstname.$lastname.$username.$password.$confirm;
	
	// Select correct user
	$q = mysql_query("SELECT userid FROM user WHERE userid='$username' AND companyid='$_SESSION[id]'");
	$row = mysql_fetch_array($q);
	$num = mysql_num_rows($q);
	
		// check to see if passwords match
		if ($password != $confirm){
				echo json_encode('1');
				exit;
			}
		
	// update database
	if($num==0){
		$q = mysql_query("UPDATE user SET password='$password', firstname='$firstname', lastname'$lastname'); ");
		if ($q){
			//success
			echo json_encode('success');
		}
	}
  else echo json_encode('error');
  //}
exit;
}

// Test Joining a table
if ($do=="join"){
$q = mysql_query("SELECT * FROM user u, action a WHERE  p.userid = a.userid AND u.companyid='$_SESSION[id]';");

$array = array();
  	while($row = mysql_fetch_array($q)){
  		$array[] = $row;
  		
  	}
echo json_encode($array);
exit;
}


// Add New Company / SigUp
if($do=="newCompany"){
  
	//$company = mysql_real_escape_string($_GET['company']);	
	$email	 = mysql_real_escape_string($_GET['email']);
	//$password = mysql_real_escape_string($_GET['password']);
	//$confirm = mysql_real_escape_string($_GET['confirm']);
	
	// See if company name already exists
	$q = mysql_query("SELECT * FROM company WHERE email='$email'");
	$row = mysql_fetch_array($q);
	$num = mysql_num_rows($q);
	
	if ($num==0){
		
		$query = mysql_query("INSERT INTO company (id, name, email, password, payrollDate) VALUES ('', '', '$email', '','')");
		if ($query){
			$_SESSION['email']=$email;
			$_SESION['id']=$row['id'];
			echo json_encode('success');
		}
	}
	else echo json_encode('companyTaken');
exit;
}

// Test Joining a table
if ($do=="join"){
$q = mysql_query("SELECT * FROM user u, action a WHERE  p.userid = a.userid AND u.companyid='$_SESSION[id]';");

$array = array();
  	while($row = mysql_fetch_array($q)){
  		$array[] = $row;
  		
  	}
echo json_encode($array);
exit;
}


// Show employees that are clocked in

if ($do=="showIn"){
	if(isset($_SESSION['$array'])){	
		echo json_encode($_SESSION['$array']);
		exit;
	}
	
	//$q = mysql_query("SELECT companyid from user UNION ALL SELECT id from company");
	$q = mysql_query("SELECT firstname, lastname,userid FROM user WHERE companyid='$_SESSION[id]'"); 
	$row = mysql_fetch_array($q);
	$array = array();
  	while($row = mysql_fetch_array($q)){
  		$array[] = $row; 		
  	}
  	
  	// Save employees in Session array 
	$_SESSION['$array'] = $array;  
echo json_encode($array);
exit;
}

// editCompany edit company

if($do=="editCompany"){

echo "good";
	
	$email 			= $_GET['email'];
	$companyName 	= $_GET['companyName'];
	$password		= $_GET['password'];
	$confirmPassword = $_GET['confirmPassword'];
	$payrollDate	= $_GET['payrollDate'];
	
	if ($email != "" && $password != ""){
	echo "email pass good";
	
	if($password==$confirmPassword){
		
		// NEED to add a check to stop them from changing their email to one that already exists
		
		//$query = mysql_query("SELECT * FROM company WHERE id='$_SESSION[id]'");
		//$row = mysql_fetch_array($query);
		//$num = mysql_num_rows($query);
		
		//if($num < 1){
		
		$query = mysql_query("UPDATE company SET email='$email', name='$companyName', password='$password', payrollDate='$payrollDate' WHERE id='$_SESSION[id]'"); 
		echo "fooon";
	//}
	//else echo "email already exists";
	}
	else echo "passwords don't match";
	}
}

