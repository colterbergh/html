<? 
ob_start();
require_once("../ajax/db.php"); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">
	
	<script src="js/ajax.js"></script>
	
    <title>timeclock</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-fixed-top navbar-inverse" role="navigation" style="background-color:green;">
      
      <div class="container" style="background-color:green;">
        <div class="navbar-header">
        
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="../" style="color:white; font-size:34px; font-decoration:bold;"><b>clocked</b>in</a>
        </div>
        <div class="collapse navbar-collapse">
         <div class="col-sm-4 col-md-offset-6">
          <ul class="nav navbar-nav">
            <li class="active" style="margin-right:20px;"><a href="admin/" style="background-color:green;">
          <?  if(isset($_SESSION['email'])){
				echo $_SESSION['name'];
			}
				else echo "<b>Login</b>";
	  	  ?>
            </a></li>
            
          </ul>
         </div>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->