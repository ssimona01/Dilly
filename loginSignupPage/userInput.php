<?php
$username = $_POST['loginuser'];
$password = $_POST['loginpass'];
$conn = oci_connect( 'student', 'STUDENT', "localhost/xe");
  $query = 'select username from app_users where username= \''.$username.'\'';
  $id = oci_parse($conn, $query);
  $result = oci_execute($id);
 
while ($row = oci_fetch_array($id, OCI_RETURN_NULLS+OCI_ASSOC)) {
  
     foreach ($row as $item) {
 
        $u_name = $item;

     }
    
  }
   $query1 = 'select password from app_users where username= \''.$username.'\'';
  $id = oci_parse($conn, $query1);
  $result = oci_execute($id);
 
while ($row = oci_fetch_array($id, OCI_RETURN_NULLS+OCI_ASSOC)) {
 
     foreach ($row as $item) {
 
        $u_password = $item;
 
     }
    
  }
$connection_string = 'localhost/xe';
  if($username == $u_name and $password == $u_password and !($username == '') and !($password == '')){
    $conn = oci_connect( 'student', 'STUDENT', $connection_string);
    #echo 'Connection succesfull';
    header('Location: ../homepageAfterLogin/index.html');
 
}else{
    header('Location: loginSignup.html');
 }   
 
?>

