  <?php

  session_start();


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
    $_SESSION['status']='something is wrong';
    header('location:login_member.php');
  }



}


  ?>





  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Member login Page </title>
    <link href="member_login.css" rel="stylesheet" type="text/css">
    <!-- <link href="mem_log.php"> -->


  </head>

  <body>

    <div class="loginbox">

      <h1>Member Login </h1><br><br>

      <?php
      if(isset($_SESSION['status']) && $_SESSION['status']!='') 
      {
        echo'<h2 style="colour:white";>'.$_SESSION['status'].'</h2>';
        unset($_SESSION['status']);
      }


      ?>

      <form action="post" method="POST">

        <p type="text_em" style="color: white;font-size: 24px;">Email Id</p>

        <input type="email" name="email" placeholder="Enter your Email" required >

        <p type="text_pa" style="color: white;font-size: 24px;">Password</p>

        <input type="password" name="password" placeholder="Password" required >

        <input type="submit" value="Login" name="enter"  ><br>



        <!-- <script src="memberLogin.js"></script> -->

        <a href="Register.php" style="color: white;font-size: 18px;">Create a new account</a>

      </form>

    </div>


  </body>


  </html>