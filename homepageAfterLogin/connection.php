<?php

$username="student";
$password="STUDENT";
$database="localhost/XE";

$con=oci_connect($username,$password,$database);

if(!$con){
	echo "Please try again later";
}

?>