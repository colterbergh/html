<? 	// MyAccount
	ob_start();
	require_once('../../include/newheader.php');
	require_once('../../include/dashButtons.php'); 
	require_once('../../ajax/db.php');
	
	if(!isset($_SESSION['email'])){
		header("location:../index.php");
	}
?>
	<head>
	<script src="../../js/ajax.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

	</head>	
	<div class="container">
    	<h2>Past Employees</h2> 
    	<br>      
		<h3>
<?
$q = mysql_query("SELECT * FROM user WHERE companyid='$_SESSION[id]' AND letgo='1'"); 
		
		$array = array();
  			while($row = mysql_fetch_array($q)){
  				$array[] = $row;
  			}
  			  		
          // If not in session:
          $arr = $array;
         
          foreach ($arr as $value){
          	$uid = $value['count'];
          	echo '<input type="submit" class="btn btn-default" value="Restore Employee" onClick="restore('.$value[count].');"> ';
          	echo $value['firstname']." "
          		.$value['lastname']." | "
          		.$value['userid']." | ";
          		echo "<br><br>";  
          }
          
?>
<!-- Where Form Messages Show -->
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