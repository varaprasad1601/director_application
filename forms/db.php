<?php
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"dirApplication");
if(!$db){
  echo "Connection not Established..!!";
}else{
  // echo "Connection Established..!!";
}
 ?>