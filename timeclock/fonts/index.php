<!DOCTYPE html>
<? // main index page
//ob_start();
//require_once("ajax/db.php"); 
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <script src="js/ajax.js"></script>
	<script src="/js/bootstrap.min.js"></script>
    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">pocket</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#"></a></li>
            <li><a href="#about"></a></li>
            <li><a href="#contact"></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container" style="margin-top:100px;">

<!-- WHERE THE MERGE OCCURED -->
	<img style="-webkit-filter:contrast(105%);-webkit-filter:brightness(140%);" src="assets/images/clockedin-sketch.jpg"  height="350px">
	<div style="float:left;display:inline;margin-left:10px;" id="sidebar" role="navigation">
       <div style="font-family: 'Playfair Display', serif;font-size:34px;">
       <br>
       <!-- CLOCK IMAGE -->
       <img src="assets/images/clocklogo.jpeg" height="100px">
       <br>
       Track employee hours, easily.
		</div>
		
		<div class="input-group input-group-lg" stlye="padding:2px;">
  		<span class="input-group"></span>
  		.
		<div class="input-group input-group-lg">
		<br>
		<center>
		<div id="signUpButton">
		<input type="submit" class="form-control btn btn-success" style="width:225px;height:45px;color:#;" value="Sign Up" onclick="openSignup();">
		</div>
		<div id="signUpForm" class="input-group input-group-lg" style="padding:2px; display:none;  margin-top:-20px;">
	<form onsubmit="newCompany();return false">
		<input id="email" type="text" class="form-control" placeholder="ENTER EMAIL">
		
		<div class="input-group input-group-lg" style="padding:2px;">
		<input style="margin:5px 0; width:230px;" id="submit" type="submit" class="form-control btn btn-danger" value="Next">
	</form>
		</div>
		
		or <a id="blob" style="color:#5cb85c; font-size:12px;" href="admin/">Sign in</a>
		</div>
		
		<div id="signin" style="font-size:12px; margin:30px 0 0 0;">
		or <a id="blob" style="color:#5cb85c; font-size:12px;" href="admin/">Sign in</a>
		
		</div>
		</center>
		</form>

		</div>
        <br><br>
        <div id="status" class="status"></div>
        <div id="statusOut" class="statusOut"></div>
        <div id="statusOther" class="statusOther"></div>	
        </div><!--/span-->
      </div><!--/row-->
	
	    </div><!--/.container-->
<div style="color:gray; margin-top:130px;">
<center>
<a style="color:gray;" href="#learnmore"><div style="width:100%;">Learn More</div></a>
</center>
</div>
<div class="salesrunLeft">
	<a id="learnmore"></a>
	
	<b>Easy hour tracking</b>
	<br>
	No more spreadsheets, time clocks, or software. Save time and brain cells.
</div>
<div class="salesrunRight">
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
</div>
<div class="clearfix"></div>
	<br><br>
<div class="salesrunRight">
	<b>From Anywhere</b>
	<br>
	Clock In / Clock out from the web. Use a single computer, or utilize phones, tablets, & laptops.	
</div>
<div class="salesrunLeft">
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
</div>
<div class="clearfix"></div>
	
	<br><br>
<div class="salesrunLeft">
	<b>Data at your fingertips</b>
	<br>
	Employee's hourly reports sent to your email just in time for payroll. Or log into your dashboard for quick access to your info.
</div>
<div class="salesrunRight">
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
</div>
	<br><br>
	<div class="clearfix"></div>
<div class="salesrunRight">
	<b>Business</b>
	<br>
	Whether you have one employee or 1,000: we have a plan that works for you. 60 days free. No credit card required.
</div>
<div class="salesrunLeft">
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
| - - - - - - - - - - - - - - - - - |<br>
</div>
<div class="clearfix"></div>
<br><br><br><br><br><br>
<hr>
<center>
<b>clocked</b>in 2014 | hello@clockedin.co
</center>
<br>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="include/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>
 
    </div><!-- /.container --> 
  </body>
</html>
