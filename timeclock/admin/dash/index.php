<?php 	// admin/dash/index.php 
	ob_start(); 
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
<!-- Facebook SDK -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=115673545253048";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- twitter sdk -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	
	<div class="container">

	<div style="font-size:24px; text-decoration:bold; margin-top:20px;">
<div style="margin-top:15px;">	
<?php
	// Finish Sign Up and Add first employee instructions
	$query = mysql_query("SELECT name FROM company WHERE email='$_SESSION[email]'");
	$row = mysql_fetch_assoc($query);
	//nums
	$query2 = mysql_query("SELECT userid FROM user WHERE companyid='$_SESSION[id]'");
	$num2 = mysql_num_rows($query2);
	
	if($row['name']==''){
		echo "<center>Thanks for signing up!";
		echo "<br><a href='myaccount.php'>Step 1: Enter Profile Info. <br><br>";	
		echo "<img src='../../assets/images/profile.jpg'><br></a></center>";
		exit;
	}
	
	elseif($row['name']!=''){
		if ($num2<1){
			echo "<center><a href='employee.php'>Step 2: Add First Employee <br><br>"; 
			echo "<img src='../../assets/images/squre.jpg'><br></a></center>";
		}
	}
	
	if($num2>0){
	$q = mysql_query("SELECT count FROM action WHERE companyid='$_SESSION[id]'");
	$numActions = mysql_num_rows($q);
			if ($numActions<1){
				echo "<center>Step 3: Clock In! <a href='../../go'>clockme.co/go<br><br>";
				echo "<img src='../../assets/images/rocket.jpg'><br></a></center>";

				exit;
			}
			
		}
	// Show once User has completed sign up 
	if($row['name']!='' && $num2>0){
		echo "Currently Clocked In @ ". $row['name'].":";
?>	

</div>	

	<hr>
	</div>
	<div>
	<?php
		
	$query = mysql_query("SELECT firstname, lastname, userid FROM user WHERE companyid='$_SESSION[id]'"); 
	
	$array = array();
	 while ($row=mysql_fetch_assoc($query)){
		$array[]=$row['userid'];
		$q2=mysql_query("SELECT action,timestamp FROM action WHERE userid='$row[userid]' ORDER BY count DESC LIMIT 2");
		$row2 = mysql_fetch_assoc($q2);
			if ($row2['action']=="IN"){
				echo $row['firstname']." ".$row['lastname'];
				echo " ";
				echo "[".$row['userid']."]";
				echo " ";
			
					$curTime = time();
					$mysqlTimestamp = $row2['timestamp'];
					$dif = $curTime - $mysqlTimestamp;				
			
					$hours 	= ($dif / 60)/60;
					$min	= ($dif / 60);
					
					$newHours = number_format((float)$hours, 0, '.', '');
					$newMin	  = number_format((float)$min, 0, '.', '');

					
					if ($newHours>0){
						echo $newHours." hours ";
					}
					echo $newMin." min ";
					echo "<br>";
	
	
			
		//$query = mysql_query("S");
		//$q3 = mysql_query("SELECT TIMESTAMPDIFF(MINUTE,LogOutTime,LogInTime) AS TimeLoggedIn FROM LogTable");	
			
			}
	}
	
	}
	
	?>
	
	</div>
	<br><br>
	
	
	    </div><!--/.container-->

	</div>
	
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../include/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../offcanvas.js"></script>
  </body>
</html>