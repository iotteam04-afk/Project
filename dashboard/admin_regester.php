<?php
session_start();
include('security.php');


require_once __DIR__ . '/../config.php';

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password===$cpassword)
    {
    $stmt=$conn->prepare("INSERT INTO admins (username,email,password)VALUES(?,?,?)");
    $query_run = $stmt->execute([$username, $email, $password]);
    if($query_run)
    {
      $_SESSION['success']="Admin Profile Added";
      header('Location: register.php');
      exit;
    }
    else{
      $_SESSION['status']="Amdin Profile Not added";
      header('Location:register.php');
      exit;
    }

    }
    else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('Location: register.php');
        exit;
    }   

}



if(isset($_POST['updatebtn']))
{
  $id=$_POST['edit_id'];
  $username=$_POST['edit_username'];
  $email=$_POST['edit_email'];
  

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
    $id=$_POST['deleteid'];
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
  $id=$_POST['edit_id'];
  $username=$_POST['edit_username'];
  $email=$_POST['edit_email'];
  

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
  $id=$_POST['delete_id'];
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
