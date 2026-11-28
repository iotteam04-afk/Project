<?php
session_start();
require_once __DIR__ . '/../config.php';

if(isset($_POST['logout_btn'])){
  $_SESSION = [];
  session_destroy();
  header('Location: login.php');
  exit;
  }

  if (isset($_SESSION['admin_id'])) {
    header('Location: index.php');
    exit;
  }

  if (isset($_POST['login_btn'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare('SELECT id, username, password FROM admins WHERE email = ?');
    $stmt->execute([$email]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row && password_verify($password, $row['password'])) {
      session_regenerate_id(true);
      $_SESSION['admin_id'] = $row['id'];
      $_SESSION['admin_name'] = $row['username'];
      header('Location: index.php');
      exit;
    } 
    $_SESSION['status'] = 'Wrong email or password';
    header('Location: login.php');
    exit;
  }
  include('includes/header.php');
?>




<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Here</h1>
                  <?php

                  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    echo '<h2 class="bg-danger text-white"> ' . e($_SESSION['status']) . ' </h2>';
                    unset($_SESSION['status']);
                  }
                  ?>
                </div>

                <form class="user" action="login.php" method="POST">

                  <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email ">
                  </div>
                  <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                  </div>

                  <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                  <hr>
                </form>


              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>


<?php
include('includes/scripts.php');
?>