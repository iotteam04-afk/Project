<?php
session_start();
//  include('security.php');


$connection = mysqli_connect("localhost", "root", "", "sheights");

if (isset($_POST['enter'])) {
  $email_login = $_POST['email'];
  $password_login = $_POST['password'];

  $query = "SELECT * FROM data WHERE email='email_login' AND password='password_login'  ";
  $query_run = mysqli_query($connection, $query);

  if (mysqli_fetch_array($query_run)) {
    $_SESSION['username'] = $email_login;
    header('location:home.php');
  }
  else
  {
    $_SESSION['status']='Email / psasword not right';
    header('location:login_member.php');
  }



}
