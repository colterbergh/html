<?php
require_once("db.php");
echo 'butt';
$do		= mysql_real_escape_string($_GET['do']);
$id		= mysql_real_escape_string($_GET['id']);
$userid = mysql_real_escape_string($_GET['userid']);
$pin 	= mysql_real_escape_string($_GET['pin']);
$note	= mysql_real_escape_string($_GET['note']);

$timestamp = date("Y-m-d H:i:s");

// clockMe Clock me in or out functionality
if ($do=='clockMe'){
 //See if user exists and if password is correct
 $q = mysql_query("SELECT userid FROM user WHERE userid='$userid' AND pin='$pin'");
 $row = mysql_fetch_assoc($q);
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
 			$go = mysql_query("INSERT INTO action (count, userid, action, timestamp, note) VALUES ('','$userid', '$action', '$timestamp', '$note')");
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
			else echo json_encode('2');
	}		

else 
echo json_encode("nomatch");
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
 
if ($do=='adminLogin'){	
	echo json_encode('2');
} 
