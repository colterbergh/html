<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
*/

//"Just because there are a lot of people working on something doesn't mean the problem is solved" - Drew Houston
require_once("db.php");
require("PasswordHash.php");

// PHPASS Variables
$hash_cost_log2 = 8;
$hash_portable = FALSE;

$hasher = new PasswordHash($hash_cost_log2, $hash_portable);

$do		= mysql_real_escape_string($_GET['do']);
$id		= mysql_real_escape_string($_GET['id']);
$userid = mysql_real_escape_string($_GET['userid']);
$pin 	= mysql_real_escape_string($_GET['pin']);
$note	= mysql_real_escape_string($_GET['note']);
$email	= mysql_real_escape_string($_GET['email']);
$password	= mysql_real_escape_string($_GET['pass']);
$timeEdit 	= mysql_real_escape_string($_GET['time']); 
$count		= mysql_real_escape_string($_GET['count']);
$origTime	= mysql_real_escape_string($_GET['origTime']);

$timestamp = time();

// clockMe Clock me in or out functionality
if ($do=='clockMe'){
 //See if user exists and if password is correct	
 if ($userid != ''){											/*XXXXXX change 1=1 to password check  @TYSON CHECK THIS*/
 $q = mysql_query("SELECT userid, companyid FROM user WHERE 1=1 AND (userid='$userid' OR  email='$userid')")or die(mysql_error());
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
		echo $message;
		}
			
	}
	else 
		echo "row not greater than 0";
}
else echo '2';
exit; 
}
	
// statusCheck functionality
if ($do=='statusCheck'){
	if ($userid!=""){
	$q = mysql_query("SELECT action FROM action WHERE userid='$userid' ORDER BY count DESC LIMIT 1");
 		$row = mysql_fetch_assoc($q);	
		if ($row['action']=='IN'){
 				echo '0';
 			}
 		elseif ($row['action']=='OUT'){
 				echo '1';
 		}	
 		    else
 				echo '2';
}
exit;

}

// Admin Login 
if ($do=='adminLogin'){ 
	$q = mysql_query("SELECT * FROM company WHERE email='$email'");
	$row = mysql_fetch_assoc($q);
	
	$hash = '*';
	
	if ($row > 0){
		
		if ($hasher->CheckPassword($password, $row['password'])) {
            $_SESSION['name'] = $row['name'];

		    $_SESSION['id']   = $row['id'];
            $_SESSION['email'] = $email;
            echo json_encode('0');
		}
	}
	
    echo json_encode('1');
    exit;
} 

// ShowEmployees
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
 
	$firstname = mysql_real_escape_string($_GET['firstname']);
	$lastname = mysql_real_escape_string($_GET['lastname']);
	$username = mysql_real_escape_string($_GET['username']);
	$email	  = mysql_real_escape_string($_GET['email']);
	$password = mysql_real_escape_string($_GET['password']);
	$confirm = mysql_real_escape_string($_GET['confirm']);
	
	if($firstname!="" && $lastname!="" && $username!="" && $password!=""){
	
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
		$q = mysql_query("INSERT INTO user (companyid, userid, email, pin, firstname, lastname, count, letgo) VALUES ('$_SESSION[id]','$username', '$email', '$password', '$firstname', '$lastname', '', ''); ");
		if ($q){
			
			echo 'success';
		}
		else echo "no query";
	}
  else echo 'usernameTaken';
  }
  else echo "Please fill all fields";
exit;
}

// Edit Employee //can't change Company ID
if($do=="editEmployee"){
  
	$firstname = mysql_real_escape_string($_GET['firstname']);
	$lastname = mysql_real_escape_string($_GET['lastname']);
	$username = mysql_real_escape_string($_GET['username']);
	$email	= mysql_real_escape_string($_GET['email']);
	$password = mysql_real_escape_string($_GET['password']);
	$confirm = mysql_real_escape_string($_GET['confirm']);
	
	if ($firstname != "" && $lastname != "" && $username != "" && $password != "" && $confirm != ""){
	
	// Select correct user
	$q = mysql_query("SELECT * FROM user WHERE userid='$username' AND companyid='$_SESSION[id]'");
	$row = mysql_fetch_array($q);
	$num = mysql_num_rows($q);
	
		// check to see if passwords match
		if ($password != $confirm){
				echo '1';
				exit;
		}
	
		// update database
		$q = mysql_query("UPDATE user SET pin='$password', email='$email', firstname='$firstname', lastname='$lastname' WHERE count='$row[count]'"); 
			if ($q){
				//success
				echo 'success';
			}
				else echo 'error';
  }
  else echo "Please fill all fields";

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
	
	$email	 = mysql_real_escape_string($_GET['email']);
	// See if company name already exists
	$q = mysql_query("SELECT * FROM company WHERE email='$email'");
	$row = mysql_fetch_array($q);
	$num = mysql_num_rows($q);

	if ($num==0){
		$query = mysql_query("INSERT INTO company (id, name, email, password, date1, date2) VALUES ('', '', '$email', '', '', '')");

		if ($query){
			$_SESSION['email']=$email;
		
		// Put ID in session
		$query = mysql_query("SELECT * FROM company WHERE email='$email'");	
		$row= mysql_fetch_assoc($query);
			$_SESSION['id']=$row['id'];
			echo 'success';
		}
		else echo "Error: Failed query. Email colter@goliathmade.com";
	}
	else echo 'companyTaken';
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
	
	$email 			= mysql_real_escape_string($_GET['email']);
	$companyName 	= mysql_real_escape_string($_GET['companyName']);
	$password		= mysql_real_escape_string($_GET['password']);
	$confirmPassword = mysql_real_escape_string($_GET['confirmPassword']);
	$date1			= mysql_real_escape_string($_GET['date1']);
	$date2			= mysql_real_escape_string($_GET['date2']);
	
	if ($email != "" && $password != ""){
	
	if($password!=$confirmPassword){
		echo "passwords dont match";
	exit;
	}	
		// NEED to add a check to stop them from changing their email to one that already exists
		
		//$query = mysql_query("SELECT * FROM company WHERE id='$_SESSION[id]'");
		//$row = mysql_fetch_array($query);
		//$num = mysql_num_rows($query);
		
		//if($num < 1){
		
		$hash = $hasher->HashPassword($password);
		
		// @tyson : why < 20?
		
		if (strlen($hash) < 20) {
    		echo "Invalid Password Hash";
    		echo strlen($hash);
    		exit;
		}
		
		
		$query = mysql_query("UPDATE company SET name='$companyName', email='$email', password='$hash', date1='$date1', date2='$date2' WHERE id='$_SESSION[id]'");
		if ($query){
		echo "success";
	}
	else echo "email already exists";
	
	}
	else echo "safe";
}

if ($do=='letGo'){
$count = mysql_real_escape_string($_GET['count']);
	$q = mysql_query("UPDATE user SET letgo='1' WHERE count='$count'");
	if ($q){
		echo "success";
	}
}

if ($do=='restore'){
$count = mysql_real_escape_string($_GET['count']);
	$q = mysql_query("UPDATE user SET letgo='0' WHERE count='$count'");
	if ($q){
		echo "success";
	}
	else echo "error";

}

if($do=='saveEdit'){
	$timeEdit = strtotime($timeEdit);
	
	$query = mysql_query("UPDATE action SET note = timestamp, timestamp='$timeEdit' WHERE userid='$userid' AND count='$count'");
	if ($query){
		echo "success";
	}
	else{
		echo "error";
	}
}	

if ($do=='doesUserExist'){
	
	$q = mysql_query("SELECT * FROM user WHERE userid='$userid'");
	$num = mysql_num_rows($q);

if($num>0){
	echo "Username Taken";
	exit;
}
	else {
		echo "success";
	}
}