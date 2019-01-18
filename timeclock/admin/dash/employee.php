<?php 	// admin/dash/employee/ 
	session_start(); 
	require_once('../../ajax/db.php');
	require_once('../../include/newheader.php');

	if(!isset($_SESSION['email'])){
		header("location:../index.php");
	}
	$addSuccessful = mysql_real_escape_string($_GET['do']);
?>

	
	<!-- Dashboard Buttons -->
	<?php require_once('../../include/dashButtons.php'); ?>
	<br>
	<br>
	<head>
	<script src="../../js/ajax.js"></script>
	</head>
		<!-- Add new employee -->
     <div style="margin-left:10px;">
     <input type="submit" name="submit" class="form-control btn btn-default" style="width:180px;height:40px;" value="Add Employee +" onclick="expandAdd();"><br>

     <?php 
     if ($addSuccessful=="add"){
     	echo "<br>";
     	echo "<input type='submit' name='submit' class='form-control btn btn-default' style='width:180px;height:40px;' value='Employee added!'> "; 			echo " <a href='index.php'><input type='submit' name='submit' class='form-control btn btn-danger' style='width:180px;height:40px;' value='Home'></a>";

     	}
     ?>
     <!--
     <div class="coltBtn">
        <input type="submit" name="submit" class="form-control btn btn-default" style="width:180px;height:40px;margin-top:5px;" value="Past Employees" onclick="window.location='past.php'">
        </div>
 <div class="clearfix"></div>
     -->
    <div id="expandAdd" style="display:none; margin-top:10px;">
	 
	     <center>  
         <div class="coltBtn" style="float:left;">
        	<input id="firstname" type="text" class="form-control" placeholder="Firstname">
		</div>
		 <div class="coltBtn">
			<input id="lastname" type="text" class="form-control" placeholder="Lastname">  
		</div>
		
		<div class="coltBtn">	
			<input id="username" type="text" class="form-control" placeholder="Username" onblur="doesUserExist();">
		</div>		 
		<div class="coltBtn">
			<input id="email" type="text" class="form-control" placeholder="Email optional">
		</div>
		<div class="coltBtn"> <!-- confirmPassword : cP -->
			<input id="password" type="password" class="form-control" placeholder="Password">
        </div>
		
		<div class="coltBtn"> <!-- confirmPassword : cP -->
			<input id="confirm" type="password" class="form-control" placeholder="Pass again">
        </div>    
        <div class="coltBtn">
           	<input type="submit" class="form-control btn btn-success" value="ADD" onclick="addEmployee();">
        </div>
        
        <div class="clearfix"></div>
        <!-- Where Form Messages Show -->
        <div id="message" style="float:left; margin-top:10px;">
         <div id="status" style="color:green; font-size:14px;"></div>
        <div id="statusOut" style="color:orange; font-size:14px;"></div>
        
        </center>
        </div>
       </div>
      </div>
    </div>
         
    <div class="container">
		       
        <div style="clear:both;"></div>
          
           <br>
           <h4>
           <div class="" id="showEmployees" style="margin:20px 0 0 0;">
          <u>Full Name</u> . <u>Username</u> 
          <br>
 <?php 
      	
		$q = mysql_query("SELECT * FROM user WHERE companyid='$_SESSION[id]' AND letgo='0'"); 
		
		$array = array();
  			while($row = mysql_fetch_array($q)){
  				
  				$array[] = $row;
  			}
         
          foreach ($array as $value){

          	$uid = $value['userid'];
          	echo "<div class=''>";
          	echo $value['firstname']." "
          		.$value['lastname']." . "
          		.$value['userid']." . "
          		.'<a href="edit.php?id='.$uid.'">edit </a><br>';  
          	echo "</div>";
          }
         
          ?> 
          </h4>
          
           </div> 
        </div><!--/span-->
        
        <br>
        <br>
        <br>
        <br>
        
        </div>
        <center
       <div class="input-group">
        
	   </div>
		</center>
		</div>
        
        <br>
       
        </div><!--/span-->
     
     
	
	    </div><!--/.container-->

	</div>
	<center>
		<?php require_once('../../include/footer.php'); ?>
	</center>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../include/jquery.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../offcanvas.js"></script>
  </body>
</html>