<?php
$firstname = $_POST['newfirstname'];
$lastname = $_POST['newlastname'];
$username = $_POST['newusername'];
$password = $_POST['newpassword'];
$check = $_POST['checkpassword'];
$email = $_POST['newemail'];
$birthday = $_POST['newbdate'] . '';
$date=date_create($birthday);
$birthday = date_format($date,"d-M-y");
$city ='Random';
$country ='Random';

$conn = oci_connect( "student", "STUDENT", "localhost/xe");
if (trim($check) == trim($password)) 
{

if ( trim($firstname) == '' and trim($lastname) =='' and trim($username) == '' and trim($password) == '' and trim($birtday) == '' and trim($city) == '' and trim($country) == '' ){
	header('Location: signupdata.php');
}

$num_rows = 0;
$sql = 'select * from app_users where username= ' .  '\'' . $username . '\'';
$id = oci_parse($conn, $sql);
$result = oci_execute($id);
$num_rows = oci_fetch_all($id, $res);

if( $num_rows != 0){
	echo 'Username taken. Please write another username:';
	header('Location: signupdata.php');
}
else
{
	$sqlmaxid = 'select max(id) from app_users';
	$id1 = oci_parse($conn, $sqlmaxid);
	$result1 = oci_execute($id1);

	while ($row = oci_fetch_array($id1, OCI_RETURN_NULLS+OCI_ASSOC)) {
	 foreach ($row as $item) {	   
	   $maxid = $item;	   
	 	}
	}

	$maxid = $maxid + 1;

	$sql_insert = 'insert into app_users (id, username, password) values ( ' . $maxid. ', \'' . $username . '\', \''  . $password . '\')';
	$id = oci_parse($conn, $sql_insert);
	$result = oci_execute($id);

	$sql_insert2 = 'insert into user_credentials (user_id, email, firstname, lastname, birth, city, country) values ( ' . $maxid . ', \'' . $username . '@yahoo.com\', \''. $firstname . '\', \'' . $lastname .  '\', to_date(\'' . $birthday . '\' ,\'DD-MON-RR\' ) , \' ' . $city . '\', \'' . $country . '\')';
	$id = oci_parse($conn, $sql_insert2);
	$result = oci_execute($id);

	header('Location: afterSignup.html');
}
}
else
{
$message = "Passwords are not the same!";
echo "<script type='text/javascript'>alert('$message');
	 </script>";
}
?>
<!DOCTYPE html>
<html >
 <head>
  <meta charset="UTF-8">
  <title>Welcome to Moments!!! </title>
  
  
  <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Macondo">
    <style>
      body {
        font-family: 'Macondo', cursive;
        font-size: 15px;
      }
	  #Head{
			   		 text-align:center;
					 font-family:'Orange Juice';
					 font-size:40px;
					 color:white;

    </style>
   <link rel="stylesheet" href="forgotPasswordCss.css">
</head>

<body>
  <header id="Head"><a href="../homePage/home.html">Dilly</a></header>
  <div class="forgot-wrap">
		<div class="forgot-form">
			<br>
			<br>
			<font size="6"> Something went wrong...</font>
			<br>
			<br>
			<br>
			<br>
			<form action="loginSignup.html" method="post">
					<div class="group">
					<input type="submit" class="button" value="Go Back" >
				</div>
			</form>
			</div>		
	</div>
	<footer align="center">&copy; 2017 Dilly, All rights reserved</footer>
</body>
</html>



