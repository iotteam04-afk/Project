<?php
session_start();
include('security.php');


$connection=mysqli_connect("localhost","root","","sheights");

if(isset($_POST['registerbtn']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($password===$cpassword)
    {
      $query="INSERT INTO admins (username,email,password)VALUES('$username','$email','$password') ";
    $query_run = mysqli_query($connection, $query);
    if($query_run)
    {
      $_SESSION['success']="Admin Profile Added";
      header('location:register.php');
    }
    else{
      $_SESSION['status']="Amdin Profile Not added";
      header('location:register.php');
    }

    }
    else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
        header('Location: register.php');
    }   

}



if(isset($_POST['updatebtn']))
{
  $id=$_POST['edit_id'];
  $username=$_POST['edit_username'];
  $email=$_POST['edit_email'];
  $password=$_POST['edit_password'];

  $query = "UPDATE admins SET username='$username', email='$email', password='$password' WHERE id='$id' ";
  $query_run = mysqli_query($connection, $query);
  
  if($query_run)
  {
    $_SESSION['success']="DATA is Updated";
    header(' location:register.php ');
  }
  else
  {
    $_SESSION['status']="Your Data is Not Updated";
    header(' location:register.php ');
  }
}
  if(isset($_POST['deletebtn']))
  {
    $id=$_POST['deleteid'];
    $query="DELETE  FROM admins WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
      $_SESSION['success']="DATA is Deleted";
      header(' location:register.php ');
    }

    else
    {
      $_SESSION['status']="DATA is not  Deleted";
      header(' location:register.php ');
    }


  }
  

  
if(isset($_POST['updatebtn']))
{
  $id=$_POST['edit_id'];
  $username=$_POST['edit_username'];
  $email=$_POST['edit_email'];
  $password=$_POST['edit_password'];

  $query = "UPDATE data SET username='$username', email='$email', password='$password' WHERE id='$id' ";
  $query_run = mysqli_query($connection, $query);
  
  if($query_run)
  {
    $_SESSION['success']="DATA is Updated";
    header(' location:member_fetch.php ');
  }
  else
  {
    $_SESSION['status']="Your Data is Not Updated";
    header(' location:member_fetch.php ');
  }

}


if(isset($_POST['delete_btn']))
{
  $id=$_POST['delete_id'];
  $query="DELETE  FROM data WHERE id='$id' ";
  $query_run = mysqli_query($connection, $query);

  if('query_run')
  {
    $_SESSION['success']="DATA is Deleted";
    header(' location:member_fetch.php ');
  }

  else
  {
    $_SESSION['status']="DATA is not  Deleted";
    header(' location:member_fetch.php ');
  }


}

?>
