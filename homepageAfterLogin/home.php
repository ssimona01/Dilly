<!DOCTYPE html>
<html>
<head>
	<title>Main</title>
	<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" href="../bootstrap-3.3.7-dist/css/font-awesome.css">
	<link rel="stylesheet" href="styel.css">
	<link rel="stylesheet" href="../bootstrap-3.3.7-dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="../bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
	<script src="../bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	
</head>
<body>
<audio autoplay> 
  <source src="login.mp3">
  <source src="login.ogg">
</audio>
	<nav class="navbar navbar-custom navbar-fixed-top ">
		<div class="container-fluid">
			<div class="navbar-header">
				<!-- Sigla site-ului-->
				<a href="#" class="navbar-brand" style="font-size:30px;font-family:Orange Juice;color:	#ee7777;top:0;">Dilly</a>
			</div>
			<!--Meniul din pagina homepage after login-->
			<ul class="nav navbar-nav navbar-right">
				<li><a  href="../questionsPage/questionsPage-iframe.html"><i class="fa fa-question" aria-hidden="true"></i>&nbsp;Questions</a></li>
				<li><a  href="../addMoment/first.html"><i class="fa fa-rocket" aria-hidden="true"></i>&nbsp;Add Moments</a></li>
				<li><a  href="../Friends/pg.html"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Friends</a></li>
				<!-- Notification bar-->
				<li class="dropdown"><a class="dropdown-toggle " data-toggle="dropdown" href="#"><i class="fa fa-cogs" aria-hidden="true"></i>&nbsp;Activity
				<span class="caret"></span></a>
					<ul class="dropdown-menu" style="background:orange;">
						<li class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">x</a>First Notification</li>
						<!--<li class="divider"></li>-->
						<li class="alert alert-info"><a href="#" class="close" data-dismiss="alert">x</a>Second Notification</li>
						<!--<li class="divider"></li>-->
						<li class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">x</a>Third Notification</li>
						<!--<li class="divider"></li>-->
					</ul>
				</li>
				<!-- Profile bar-->
				<li class="dropdown"> <a href="#" class="dropdown-toggle " data-toggle = "dropdown"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;Account
				<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="../Friends/pg.html"> Friends </a></li>
						<li><a href="../settingsPage/settings.html"> Account Settings </a></li>
						<li><a href="../supportPage/support.html"> Help&Support </a></li>
						<li><a href="logout.php"> Logout </a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<header>
		<div class="text-center">
			<h1 style="font-size:70px">Dilly</h1>
			<p style="font-size:20px;">Keep your memories intact.</p>
		</div>
	</header>
	<div class="container-fluid acting">

<?php
include '../loginSignupPage/getuser.php';

include("connection.php");

$sql='select id from app_users where username= ' .  '\'' . $user . '\'';

  $id = oci_parse($con, $sql);
  $result = oci_execute($id);
 
while ($row = oci_fetch_array($id, OCI_RETURN_NULLS+OCI_ASSOC)) {
  
     foreach ($row as $item) {
 
        $logedUserId = $item;

     }
    
  }
$query='select 
		content_id,
		description
		from app_content where user_id='.'\''. $logedUserId . '\'';
		
	$statement=oci_parse($con,$query);
	oci_execute($statement);
	
	while($row=oci_fetch_array($statement))
	{
		echo '<div class="col-md-16 block-a">
			<div class="image">';
		echo "<img src='../Images/img".$row[0].'.jpg'."'class='img-responsive ' style='display: block;margin: auto;width: 50%;'>";
		echo '<h2 style="text-align:center"><span >'.$row[1].'</span></h2>';
		echo '<div class="col-md-4"></div>
		</div>';
	}
	oci_free_statement($statement);
	oci_close($con)
	

?>

</div>
		<div class="footer" style="text-align:center">
		&copy; 2017 Dilly, All rights reserved
		</div>

</body>
</html>