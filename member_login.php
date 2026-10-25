  <?php


include 'dashboard/dbconfig.php';

  session_start();


  

  if(isset($_SESSION['email'])){
     $user_id = $_SESSION['email'];
  }else{
     $user_id = '';
  };


  //$connection = mysqli_connect("localhost", "root", "", "sheights");
  // mysqli_select_db($connection,'sheights');

  if (isset($_POST['enter'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM data WHERE email='$email' AND password='$password'";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_fetch_array($query_run)) {
      $_SESSION['email'] = $email;
      header('location:home.php');
    } else {
      $_SESSION['status'] = 'something is wrong';
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
    <link href="css/login.css" rel="stylesheet" type="text/css">

  </head>

  <body>

    <div class="loginbox">

      <h1>Member Login </h1><br><br>

      <form action="" method="POST">

        <p type="text_em" style="color: white;font-size: 24px;">Email Id</p>

        <input type="email" name="email" placeholder="Enter your Email" required>

        <p type="text_pa" style="color: white;font-size: 24px;">Password</p>

        <input type="password" name="password" placeholder="Password" required>

        <input type="submit" value="Login" name="enter"><br>

        <a href="Register.php" style="color: white;font-size: 18px;">Create a new account</a>

      </form>

    </div>


  </body>


  </html>