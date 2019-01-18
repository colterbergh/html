<? //require_once('../ajax/action.php') ?>
<!-- Dashboard Buttons -->
	<center>
  <div id="dashFade" style="display:none;">
  <div style="clear:both; margin-top:15px; ">
	<div class="col-sm-2" style="margin:0 -20px 0 0; width:200px;">
    	<input type="submit" class="form-control btn btn-danger" value="Home" style="min-width:200px;height:50px;" onclick="window.location='index.php'">
    </div>
	<div class="col-sm-2" style="margin:0 -20px 0 0; width:200px;">
    	<input type="submit" class="form-control btn btn-success" value="Employee Center" style="min-width:200px;height:50px;" onclick="window.location='employee.php'">
    </div>
	<div class="col-sm-2" style="margin:0 -20px 0 0; width:200px;">
    	<input type="submit" class="form-control btn btn-info" value="Reports" style="min-width:200px;height:50px;" onclick="window.location='reports.php'">
    </div>
    <div class="col-sm-2" style="margin:0 -20px 0 0; width:200px;">
    	<input type="submit" class="form-control btn btn-warning" value="My Account" style="min-width:200px;height:50px;" onclick="window.location='myaccount.php'">
    </div>
 	
 	<div class="col-sm-2" style="margin:0 -20px 0 0 0px; width:200px;">    	
			<? //echo $_SESSION['name'] ?>
		<input type="submit" class="form-control btn btn-default" value="Logout" style="min-width:200px;height:50px;" onclick="window.location='../../logout.php'">
			
    </div>
 	
 </div>
    </div>
    </center>
    