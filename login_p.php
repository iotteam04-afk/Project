<?php

function validate(){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $db='member_login'; 

  $db=new mysqli('localhost',$email,$password,$db) or die("not connected");
}
echo"connected";
?>