<?	// edit employee .php
	ob_start();
	require_once('../../include/newheader.php');
	require_once('../../include/dashButtons.php'); 
	require_once('../../ajax/db.php');

	if(!isset($_SESSION['email'])){
		header("location:../index.php");
	}

	$id = mysql_real_escape_string($_GET['id']);
	$date = mysql_real_escape_string($_POST['date']);
	
	$getDate = mysql_real_escape_string($_GET['date']); 
	
	$submit	= $_POST['submit'];
	
	$firstname = mysql_real_escape_string($_POST['firstname']);
	$lastname = mysql_real_escape_string($_POST['lastname']);
	$username = mysql_real_escape_string($_POST['username']);
	$email	 = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	$confirm = mysql_real_escape_string($_POST['confirm']);

$q = mysql_query("SELECT * FROM user WHERE userid='$id'");
while($row = mysql_fetch_array($q)){
	$fname = $row['firstname'];
	$lname = $row['lastname'];
	$email = $row['email'];
	$uname = $row['userid'];
	$pass = $row['pin'];

}
?>
		
   <head>
	<script src="../../js/ajax.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

	</head>	
	
	<!-- Dashboard Buttons -->
	<? require_once('../../include/dashButtons.php'); ?>
	<br>
	<br>
		<div style="float:left; margin-left:25px;">
    	<div class="input-group input-group-lg" style="padding:2px;">
		  <form action="edit.php?id=<? echo $id; ?>&date=<? echo $date; ?>" method="POST">
			<h4>Edit Time Entries:</h4>
			<input name="date" type="date" class="form-control" style="width:205px; padding:20px;">
			<input type="submit" class="form control btn btn-info" style="padding:10px;" name="submit" value="Choose Day"><br><br>
			<div id="editTime">
				<? 
					if ($submit){
						$fDate = strtotime($getDate);
						$fDate = date('m-d-Y', $fDate);
						echo $fDate." | Edit one at a time ";
						echo "<br><br>";
						//$sql = mysql_query("SELECT action,timestamp FROM action WHERE ");
						//$row = mysql_fetch_array($sql);
						
						$sql = mysql_query("SELECT * FROM action WHERE userid='$id' AND timestamp='$date'");
									
						while($row = mysql_fetch_array($sql)){
							$ud = date('g:m:s A', $row['timestamp']);							
							echo "<div id='count$row[count]'>";
							echo "<div class='input-group input-group-lg' style='padding:2px;'>";
							echo "<input type='text' class='form-control' id='time$row[count]' value='$ud' style='margin:2px; padding:20px; width:200px;' onclick='editLaunch($row[count])'>";
							echo "</button>";
							echo " ".$row['action']."<br>";
							echo "</div></div>";
						}
						
						
	// MUST HAVE CHECKER TO MAKE SURE TIME EDIT IS IN VALID TIME FORMAT
					
				?>
				
<div class='input-group input-group-lg' style='padding:4px; float:left;'>
<input id='etBtn' style="height:45px;" type='button' class='form-control btn btn-success'; value='Save Edit' onclick='saveEdit("+count+");return false;'>
</div>				
</form>				
				<? 
	// STILL NEED TO CREATE $newValue & $count
					 
					}
				
				?>
		<div id="etBtn"></div>
			</div>
		</div>
		</div>
		
        <div class="col-sm-4 col-md-offset-4" style="float:left;">
    	<div class="input-group input-group-lg" style="padding:2px;">
    	<h4>Edit Employee Information</h4>
    	</div>
    	<div class="input-group input-group-lg" style="padding:2px;">
        	
        	<input name="firstname" id="firstname" type="text" class="form-control" value="<? echo $fname; ?>">
		</div>

		<div class="input-group input-group-lg" style="padding:2px;">	
			<input id="lastname" name="lastname" type="text" class="form-control" placeholder="LASTNAME" value="<? echo $lname; ?>">  
		</div>
		<div class="input-group input-group-lg" style="padding:2px;">	
			<input id="username" name="username" type="text" class="form-control" placeholder="USERNAME" value="<? echo $uname; ?>">
		</div>
		<div class="input-group input-group-lg" style="padding:2px;">	
			<input id="email" type="text" class="form-control" placeholder="EMAIL" value="<? echo $email; ?>">
		</div>
		<div class="input-group input-group-lg" style="padding:2px;">	
			<input id="password" name="password" type="password" class="form-control" placeholder="PASSWORD" value="<? echo $pass; ?>">
        </div>
        <div class="input-group input-group-lg" style="padding:2px;">	
        	<input id="confirm" name="confirm" type="password" class="form-control" placeholder="PASS AGAIN" value="<? echo $pass; ?>">
    	</div>
    	<div class="input-group input-group-lg" style="padding:2px; float:left;">   	
    	   	<input type="submit" name="submit" class="form-control btn btn-success" value="Save" onclick="editEmployee();">
      	</div>	
      		
      	<div class="input-group input-group-lg" style="padding:2px; float:left;">	
      		<input type="submit" name="submit" class="form-control btn btn-danger" value="Delete Employee" onclick="letGo(<? echo $id; ?>);">
        </div>
       <div class="clearfix"></div>
    
   
    <!-- Where Form Messages Show -->
        <br>
        <div id="message"></div>
        <div id="status" class="status"></div>
       <div id="statusOut" class="statusOut"></div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../include/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../offcanvas.js"></script>
  </body>
</html>   