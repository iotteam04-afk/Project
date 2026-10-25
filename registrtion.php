<?php
session_start();
header('location:member_login.php');

$connection =mysqli_connect('localhost','root');

if($connection){
    echo"Data entered";
  }
  else{
    echo"Data not entered";
  }

  mysqli_select_db($connection,'sheights');
  $name=$_POST['username'];
  $em=$_POST['email'];
  $pass=$_POST['password'];

  $q="SELECT * from data where username='name' && email ='em' && password='pass' ";

  $resut=mysqli_query($connection,$q);
  $num=mysqli_num_rows($resut);

  if($num==1){
    echo"Data dublicate";
  }else{
    $qy="insert into data(username,email, password)values('$name','$em','$pass')";
    mysqli_query($connection,$qy);
  }

  mysqli_query($connection,$q);

?>