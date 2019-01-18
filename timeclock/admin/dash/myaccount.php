<?php 	// MyAccount
	ob_start();
	require_once('../../include/newheader.php');
	require_once('../../include/dashButtons.php'); 
	require_once('../../ajax/db.php');
	
	//if(!isset($_SESSION['email'])){
	//	header("location:../index.php");
	//}
	
	$query = mysql_query("SELECT * FROM company WHERE email='$_SESSION[email]'");
	$row = mysql_fetch_assoc($query);

?>
	<head>
	<script src="../../js/ajax.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

	</head>	
	<div class="container">
    	
    	<h3>My Account</h3>  
    <div class="row row-offcanvas row-offcanvas-right">
        
        <div class="col-sm-4 col-md-offset-4">
    	<div class="input-group input-group-lg" style="padding:2px;">
    		<input type="text" id="companyName" class="form-control" placeholder="Company Name" value="<?php echo $row['name'] ?>"><br>

    	</div>
    	<div class="input-group input-group-lg" style="padding:2px;">
    		<input type="text" id="email" class="form-control" placeholder="Email" value="<?php echo $row['email'] ?>"><br>
    	</div>
    	<div class="input-group input-group-lg" style="padding:2px;">
    		<input type="password" id="password" class="form-control" placeholder="Password" value="<?php echo $row['password'] ?>"><br>
    	</div>
    	<div class="input-group input-group-lg" style="padding:2px;">
    		<input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Pass" value="<?php echo $row['password'] ?>"><br>
    	</div>
  
    	<div class="input-group input-group-lg" class="form-control" class="form-control" style="padding:5px 0 0 0;">
    	
    	First Payroll Date Range:<br>
    	<div class="input-group input-group-lg" style="padding:5px 0;">
    		<input id="date1" type="date" style="padding:14px 35px 14px 35px;">    	
    	</div>
    	<div style="padding:5px 0;">
    		<input id="date2" style="padding:13px 35px 13px 35px;" type="date">
    	
    	</div>

    		<div>
    		<div class="input-group input-group-lg" style="padding:5px 0;">
    		Monthly Plan: 
    		</div>	
    	<input type="button" value="Small" style="width:75px;" class="form-control btn btn-default">	
    	<input type="button" value="Med." style="width:75px;" class="form-control btn btn-default">
    	<input type="button" value="Large" style="width:75px;" class="form-control btn btn-default">
    	<br>
    	<div class="input-group input-group-lg" class="form-control" class="form-control" style="padding:2px;">
    	 <div id="statusOut" style="color:orange; font-size:14px;"></div>
    	<div id="replaceSaveBtn">
    		<input type="button" value="Save" style="width:235px;" class="form-control btn btn-success" onclick="editCompany();">
    	</div>
   
     </div>
         <div id="status" style="color:green; font-size:24px;"></div>
       
        
	</div><!--/.container-->
	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../include/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../offcanvas.js"></script>
  </body>
</html>