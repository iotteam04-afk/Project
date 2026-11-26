<?php // challenge 5 – vulnerable variant, NOT included anywhere yet. Nothing includes this file.

if(isset($_SESSION['email'])){
     $user_id = $_SESSION['email'];
  }else{
     $user_id = '';
  };

  
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
      header('location:member_login.php');
    }
  }

  ?>