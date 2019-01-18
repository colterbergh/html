<? 	ob_start();
	require_once('../../ajax/action.php');
	require_once('../../include/newheader.php');
	require_once('../../include/dashButtons.php'); 

	if(!isset($_SESSION['email'])){
		header("location:../index.php");
	}

?>	
<head>
	<script src="../../js/ajax.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

</head>	
 <body>   

    	<div class="container">
		<div id="message"></div>
    	<h2>Reports</h2>       
        <div style="clear:both;">
<?	
// GET DATE RANGE
if($do=="range"){
	$query = mysql_query("SELECT date1, date2 FROM company WHERE id='$_SESSION[id]'");
	$row = mysql_fetch_array($query);
	
	//STORE IN ARRAY
	$dateArray = array();
	
	$i = $row['date1'];
	$b = $row['date2'];
	
	for ($i = $i; $i<=$b; $i++){
		//DATE RANGE TO UNIX
		$dateArray[] = $i;
		//echo $i,"<br>";
	}
}	
	//BEGIN DATE, NEEDS TO BE MADE DYNAMIC
$beginDate 	= mysql_real_escape_string($_POST['beginDate']);
$endDate 	= mysql_real_escape_string($_POST['endDate']);
$submit 	= mysql_real_escape_string($_POST['submit']);
?>
<form action="reports.php" method="POST">
<input id="beginDate" name="beginDate" type="date" value="02-25-2014"> <input id="endDate" name="endDate" type="date" value="02-25-2014">
<input type="submit" name="submit" value="go">
</form>
<br>
<?	 
	if ($endDate < $beginDate){
		echo "Please put smaller date on the left. Larger date on the right.";
		exit;
	}
	$beginF			= strtotime($beginDate);
	$endF			= strtotime($endDate);
	$beginFriendly 	= date('m-d-y', $beginF);
	$endFriendly	= date('m-d-y', $endF);
	echo $beginFriendly." to ".$endFriendly;
	echo " | If date range includes today, users must be clocked out to included todays hours.<br><br>";
	
	if ($beginDate==""){	
		$time = time();
		$beginDate = date('Y-m-d', $time); 
		$endDate = $beginDate;
		Echo "Today: <br><br>";
	}
		else
			$beginDate = strtotime($beginDate);
	// Need to add in AND companyid='$_SESSION[id]'
	
	$query = mysql_query("SELECT * FROM action WHERE companyid='$_SESSION[id]' AND timestamp >= $beginDate"); 
	$output = array();
	$names 	= array();
	
	while($row=mysql_fetch_array($query)){
  			$output[] = $row;	
		
	}
	$num = mysql_num_rows($query);
	
	if($num==""){
		echo "No data for this date range.";
	}
	   
	// BEGIN TYSONS CODE
	$lastAction = null;
	$timeCalculation = array();

	foreach ($output as $value){
	if ($lastAction == null){
		$lastAction = $value;
	} 
		else {
			$timeCalculation[$value['userid']] += $value['timestamp'] - $lastAction['timestamp'];
			
			$lastAction = null;
		}
	}
	foreach ($timeCalculation as $user => $time) {
		//echo $user . " " . date('i:s', $time) . "<br>";
		echo $user." : ";
		//IF MORE THAN ONE HOUR CONVERT TO HOURS, INSTEAD OF MINUTES
		$minutes = round(abs($time)/60);
		$hours = ($time/60)/60;
		//2 DECIMAL PTS, ROUND UP
		$hours = number_format((float)$hours, 2, '.', '');
		
		//OVERTIME
		if ($hours > 8){
			$overTime = $hours - 8;
			echo "8 reg hours | ";
			echo $overTime." overtime hours";
			exit;
		}
		
		elseif ($minutes>60){
			echo $hours." hours";
		
		} 
		else
			echo round(abs($time)/60). " minutes <br>";
	}
	// END TYSONS CODE

	
		?>          
           <br>
           <div id="showEmployees" style="font-size:24px; padding:0 15px;"></div> 
        </div><!--/span-->

        <br>
        <div id="status" style="color:green; font-size:24px;"></div>
        <div id="statusOut" style="color:orange; font-size:24px;"></div>
        </div><!--/span-->
    
     
	    </div><!--/.container-->
		</div>
		<? require_once('../../include/footer.php'); ?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../include/jquery.min.js"></script>
   <script src="../../js/bootstrap.min.js"></script>
    <script src="../../offcanvas.js"></script>
  </body>
</html>
<?php ob_flush(); ?>