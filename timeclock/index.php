<!DOCTYPE html>
<? // main index page
ob_start();
//require_once("ajax/db.php"); 
$time = time(); 

?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
	<link href='http://fonts.googleapis.com/css?family=Cambo' rel='stylesheet' type='text/css'>
	
    <script src="js/ajax.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <title>clockme.co | Track employee hours, easily. Web based clock in clock out employee hour tracking</title>

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
  
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color:white;color:black;border-bottom:0px;
    ">
      <div class="container" style="background-color:white; color:black;">
        <div class="navbar-header" style="background-color:white;">
          <button type="button" style="background-color:black;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
           <a class="navbar-brand" style="color:black;" href="#"><b>clock</b>me
        </div>

        <div class="collapse navbar-collapse" style="background-color:white;color:black;">
       <div class="hideHeader">   
          <ul class="nav navbar-nav" style="background-color:white; ">
            <li><a href="#"></a></li>
            <li><a href="admin/" style="color:black;">
            	<input type="submit" class="form-control btn btn-success" style="min-width:200px;height:50px;" value="Admin">
            </a></li>
            <li><a href="go/" style="color:black;">
            	<input type="submit" class="form-control btn btn-info" style="min-width:200px;height:50px;" value="Employee">
            </a></li>
            <li><a href="signup/" style="color:black;">
            	<input type="submit" class="form-control btn btn-danger" style="min-width:200px;height:50px;" value="Sign Up">
            </a></li>
            <li><a href="" style="color:black;"></a><br><br><br><br><br></li>
          	<li><a href="" style="color:black;"></a></li>
          	<li><a href="" style="color:black;"></a></li>
          	
          
          </ul>
 </div> <!--/.hideHeader -->
        </div><!--/.nav-collapse -->       

          </ul><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container" style="margin-top:15px;">

<!-- WHERE THE MERGE OCCURED 
	<img style="-webkit-filter:contrast(105%);-webkit-filter:brightness(140%);" src="assets/images/clockedin-sketch.jpg"  height="350px">
	<div style="float:left;display:inline;margin-left:10px;" id="sidebar" role="navigation">
       <div style="font-family: 'Playfair Display', serif;font-size:34px;">-->
       
       <!-- CLOCK IMAGE -->
       <center>
       
       <span style="font-size:40px;">
       Track employee hours. Easily.
		</span>	
		
		
		<a id="signup"></a>
		<div class="clockImage">
		<img src="assets/images/clockmejpg.jpg" height="150px;">
		<br>
		<span style="font-size:14px; ">
       For $9+ a month we'll save you <br> 
       time & money on labor.
       </span>
		<br>
		<br>
        </div>
		<div class="input-group input-group-lg" stlye="padding:2px;">
		<div class="input-group input-group-lg">
		
		<div id="signUpButton">
		<input type="submit" class="form-control btn btn-success" style="width:225px;height:45px;color:#;" value="Sign Up" onclick="openSignup();">
		</div>
		<div id="signUpForm" class="input-group input-group-lg" style="padding:2px; display:none;  margin-top:-70px;">
	<form onsubmit="newCompany();return false">
		
		<input id="email" type="text" style="text-align:center; width:230px; height:50px;" class="form" placeholder="ENTER EMAIL">
		
		<div class="input-group input-group-lg" style="padding:2px;">
		<input style="margin:5px 0; width:230px;" id="submit" type="submit" class="form-control btn btn-danger" value="Sign Up">
	
	</form>
		</div>
		
		or <a id="blob" style="color:#5cb85c; font-size:12px;" href="admin/">Sign in</a>
		</div>
		
		<div id="signin" style="font-size:12px; margin:30px 0 0 0;">
		or <a id="blob" style="color:#5cb85c; font-size:12px;" href="admin/">Sign in</a>
		
		</div>
		
		</form>

		</div>
        <br><br>
        <div id="status" class="status"></div>
        <div id="statusOut" class="statusOut"></div>
        <div id="statusOther" class="statusOther"></div>	
        </div><!--/span-->
    
<div>
<center>
<a style="color:gray;" href="#learnmore"><div style="width:100%; margin-top:-10px;">Learn More</div></a><br><br>
<div><br><br><br><br></div>
</center>
</div>

<div class="salesrunLeft">
	<a id="learnmore"></a>
	<b><u>Easy hour tracking</u></b>
	<br>
	No more spreadsheets, time clocks, or software. Save time, money, and brain cells.
</div>

<div class="salesrunRight">
<img src="assets/images/paper.jpg">
</div>
<div class="clearfix"></div>
	
<div class="salesrunRight">
	<b>From Anywhere</b>
	<br>
	Clock in & out on the web. Use a single computer, or multiple phone, tablet, & laptop stations.	
</div>
<div class="salesrunLeft">
<br>
<img src="assets/images/computers.jpg">
</div>
<div class="clearfix"></div>
	
	<br><br>
<div class="salesrunLeft">
	<b>Data at your fingertips</b>
	<br>
	Employee's hourly reports sent to your email just in time for payroll.
</div>
<div class="salesrunRight">
<img src="assets/images/mail.jpg">
</div>
	<br><br>
	<div class="clearfix"></div>
<div class="salesrunRight">
	<b>Business</b>
	<br>
	We have a plan that works for you. 60 days free. No credit card required. Free to cancel at anytime.<br>
	
</div>
<div class="salesrunLeft">
<img src="assets/images/business.jpg">
</div>
<div class="clearfix"></div>

<div class="salesrunLeft">
	<b>Pricing</b>
	<br>
	$10 a month for 1 employee <br>
	$20 a month for 10 <br>
	$100 a month for 50 <br>
	

</div>

<div class="salesrunRight">
<img src="assets/images/bulb.jpg">
<a href="signup/" style="color:red;" >
<br> Sign up in 2 seconds
</a>
</div>
<div class="clearfix"></div>

<hr>
<center>
<div style="word-spacing:10px;">
<b>clock</b>me.<? echo date('Y', $time) ?> <a href="admin/">Sign.In</a> <a href="go/">Clock.In</a>
</div>
</center>
<br>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="include/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="offcanvas.js"></script>
 
    </div><!-- /.container --> 
    </div><!--/row-->
	
  
  </body>
</html>
