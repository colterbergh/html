<? ob_start();
require_once('../ajax/action.php');
if (isset($_SESSION['email'])){
	header("location:dash/");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png" -->
	
	<script src="../js/ajax.js"></script>
	<script src="../js/bootstrap.min.js"></script>
    <title>clockme</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
     <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:white;color:black;border-bottom:0px;">
      <div class="container" style="background-color:white; color:black;">
        <div class="navbar-header" style="background-color:white;">
          <button type="button" style="background-color:black;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a href="../index.php" class="navbar-brand" style="color:black;" href="#"><b>clock</b>me
        </div>

        <div class="collapse navbar-collapse" style="background-color:white;color:black;">
       <div class="hideHeader">   
          <ul class="nav navbar-nav" style="background-color:white; ">
            <li><a href="#"></a></li>
            <li><a href="index.php" style="color:black;">
            	<input type="submit" class="form-control btn btn-success" style="min-width:200px;height:50px;" value="Admin">
            </a></li>
            <li><a href="../go/" style="color:black;">
            	<input type="submit" class="form-control btn btn-info" style="min-width:200px;height:50px;" value="Employee">
            </a></li>
            <li><a href="../signup" style="color:black;">
            	<input type="submit" class="form-control btn btn-danger" style="min-width:200px;height:50px;" value="Sign Up">
            </a></li>
            <li><a href="" style="color:black;"></a><br><br><br></li>
          	<li><a href="" style="color:black;"></a></li>
          	<li><a href="" style="color:black;"></a></li>
          	
          
          </ul>
 </div> <!--/.hideHeader -->
        </div><!--/.nav-collapse -->       

          </ul><!--/.nav-collapse -->
        </div>
      </div>
    </div>
      
    <div class="container">
		
      <div class="row row-offcanvas row-offcanvas-right">
		
        <div class="col-sm-6 col-md-offset-3">
          <p class="pull-right visible-xs">
            <!--<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button> -->
          </p>
          <div style="margin-top:50px; padding:10px;">
          <div class="companyLogin">
            <center>

     <form onsubmit="adminLogin(); return false;">     
            <h2>COMPANY LOGIN</h2>
       <center>
       <hr style="width:230px; margin-top:5px;">
       </center>
       <div style="clear:both;"></div> 
              <div class="input-group input-group-lg" stlye="padding:10px;">
 		 <span class="input-group"></span>
 		 <input name="email" id="email" type="text" class="form-control" placeholder="EMAIL" >
		</div>
		
		<div class="input-group input-group-lg" stlye="padding:2px;">
  		<span class="input-group"></span>
  		<input name="password" id="password" type="password" class="form-control" placeholder="PASS">	
		<div class="input-group input-group-lg">
		</div>
		

		<input type="submit" class="form-control btn btn-success" value="Dashboard Login">
   	 </form>
   	 	<br><br>or<br><br> 
   	 	<input type="button" class="form-control btn btn-default" value="Employee Clock In" onclick="window.location='../go'">
   	 	
   	 </div>
        
          </div>
             </center>      
         
        </div><!--/span-->
        <center>
		<div id="status" class="status"></div>
		<div id="statusOut" class="statusOut"></div>
		</center>
</div>
        </div><!--/span-->
      </div><!--/row-->
	
	    </div><!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../include/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../offcanvas.js"></script>
  </body>
</html>
<? ob_end_flush(); ?>