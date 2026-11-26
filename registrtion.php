<?php

session_start();


require_once __DIR__ . '/config.php';

  if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header('Location: Register.php');
    exit;
  }

  $username = trim($_POST['username'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $password = trim($_POST['password'] ?? '');

  if($username === '' || $email === '' || $password === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['status'] = 'Please fill in all fields with a valid email';
      header('Location: Register.php');
      exit;
  }

  $stmt = $conn->prepare('SELECT id FROM data WHERE email = ?');
  $stmt->execute([$email]);

  if($stmt->fetch()){
    $_SESSION['status'] = 'Email already registered';
    header('Location: Register.php');
    exit;
  }

  $stmt = $conn->prepare('INSERT INTO data (username, email, password) VALUES (?,?,?)');
  $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT)]);

  header('Location: member_login.php');
  exit;

?>