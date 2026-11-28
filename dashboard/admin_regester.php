<?php
require_once __DIR__ . '/security.php';


if(isset($_POST['registerbtn']))
{
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = ($_POST['password'] ?? '');
    $cpassword = ($_POST['confirmpassword'] ?? '');

    if ($username === '' || $password === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['status'] = "Please fill in all fields with a valid email.";
        header('Location: register.php');
        exit;
    }
    if ($password !== $cpassword) {
        $_SESSION['status'] = "Passwords do not match.";
        header('Location: register.php');
        exit;
    }

    $stmt = $conn->prepare('SELECT id FROM admins WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $_SESSION['status'] = "Email already exists.";
        header('Location: register.php');
        exit;
    }

    $stmt = $conn->prepare('INSERT INTO admins (username, email, password) VALUES (?, ?, ?)');
    $stmt->execute([$username, $email, password_hash($password, PASSWORD_DEFAULT)]);

    $_SESSION['success'] = "Admin registered successfully.";
    header('Location: register.php');
    exit;
}



if(isset($_POST['updatebtn']))
{
  $id = (int)($_POST['edit_id'] ?? 0);
  $username=trim($_POST['edit_username'] ?? '');
  $email=trim($_POST['edit_email'] ?? '');

  $stmt = $conn->prepare("UPDATE admins SET username=?, email=? WHERE id=?");
  $query_run = $stmt->execute([$username, $email, $id]);
  
  if($query_run)
  {
    $_SESSION['success']="DATA is Updated";
    header('Location:register.php');
    exit;
  }
  else
  {
    $_SESSION['status']="Your Data is Not Updated";
    header('Location:register.php');
    exit;
  }
}
  if(isset($_POST['deletebtn']))
  {
    $id = (int)($_POST['deleteid'] ?? 0);
    if ((int)$id === (int)$_SESSION['admin_id']) {
      $_SESSION['status'] = "You cannot delete your own account.";
      header('Location: register.php');
      exit;
    }
    $stmt = $conn->prepare("DELETE  FROM admins WHERE id=?");
    $query_run = $stmt->execute([$id]);

    if($query_run)
    {
      $_SESSION['success']="DATA is Deleted";
      header('Location:register.php');
      exit;
    }

    else
    {
      $_SESSION['status']="DATA is not  Deleted";
      header('Location:register.php');
      exit;
    }


  }
  

  
if(isset($_POST['update_member_btn']))
{
   $id = (int)($_POST['edit_id'] ?? 0);
  $username=trim($_POST['edit_username'] ?? '');
  $email=trim($_POST['edit_email'] ?? '');

  $stmt = $conn->prepare("UPDATE data SET username=?, email=? WHERE id=?");
  $query_run = $stmt->execute([$username,$email,$id]);
  
  if($query_run)
  {
    $_SESSION['success']="DATA is Updated";
    header('Location:member_fetch.php');
    exit;
  }
  else
  {
    $_SESSION['status']="Your Data is Not Updated";
    header('Location:member_fetch.php');
    exit;
  }

}


if(isset($_POST['delete_btn']))
{
  $id = (int)($_POST['delete_id'] ?? 0);
  $stmt = $conn->prepare("DELETE  FROM data WHERE id=?");
  $query_run = $stmt->execute([$id]);

  if($query_run)
  {
    $_SESSION['success']="DATA is Deleted";
    header('Location:member_fetch.php');
    exit;
  }

  else
  {
    $_SESSION['status']="DATA is not  Deleted";
    header('Location:member_fetch.php');
    exit;
  }


}

?>
