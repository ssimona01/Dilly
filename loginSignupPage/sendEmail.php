<?php
 error_reporting(0);
   $thing = $_POST['forgotpass'];
   $adress = (string) $thing;
   $test = 'test';
  if(!$c = oci_connect("student","STUDENT","localhost/xe"))
  {
    die;
  }
  else
  {
   
    $s = oci_parse($c,"BEGIN
                         :returnValue := get_password(:thing);
                       END;");
 
    oci_bind_by_name($s,":returnValue",$returnValue);
    oci_bind_by_name($s,":thing",$adress); 
    if (@oci_execute($s))
    {
      print "".$returnValue." is pass for   ".$adress."  . Please Work. ";  
       $test = $returnValue;
    }
    oci_close($c);
    mail(
     $adress,
     'Dilly Mail Soft - Recover your password.',
     'Here you have received the password for your account : '.$test);
header('Location: donePassword.html');
  }
//echo $var;
/*
*/
?>