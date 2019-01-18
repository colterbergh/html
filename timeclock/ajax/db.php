<?php
  session_start();
  
	// IF WORKING LOCAL OR LIVE, CHANGE DB BASED ON URL
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$localOrLive = substr($actual_link, 0,14);
	/*
	if ($localOrLive="http://localho"){		
		
		$host = "localhost";
		$user = "root";
		$pass = "root";
		$databaseName = "timesheet";
	}
	else { */
		$host = "localhost";
  		$user = "goliathv_gm";
  		$pass = "goliath1";		
		$databaseName = "goliathv_timesheet";		
  	//}
  //db is timesheet site is timeclock	
  $con = mysql_connect($host,$user,$pass);
  $dbs = mysql_select_db($databaseName, $con);
  
  /*
  
  $query = mysql_query("SELECT userid FROM user WHERE companyid='1'");
	 while($row = mysql_fetch_assoc($query)){
		echo $row['userid'];
	}
	*/
?>