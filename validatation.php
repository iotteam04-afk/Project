<?php


// include 'components/connect.php';

session_start();

$connection =mysqli_connect('localhost','root','','sheights');
mysqli_select_db($connection,'sheights');

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

if(isset($_POST['enter'])){

   $email = $_POST['email'];
   $pass = $_POST['password'];


   $select_user = "SELECT * from data where email='$email' && password='$pass' ";
  $resut=mysqli_query($connection,$select_user);
   $num=mysqli_num_rows($resut);


   if($num > 0){
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   }else{
      $message[] = 'incorrect username or password!';
   }

}























// session_start();
// if(isset($_SESSION['user_id'])){
//   $user_id = $_SESSION['user_id'];
// }else{
//   $user_id = '';
// };

// header('location:member_login.php');

// $connection =mysqli_connect('localhost','root');

// if($connection){
//     echo"Data entered";
//   }
//   else{
//     echo"Data not entered";
//   }

//   mysqli_select_db($connection,'sheights');
//   // $name=$_POST['username'];
//   $em=$_POST['email'];
//   $pass=$_POST['password'];

//   $q="SELECT * from data where email=$em && password=$pass ";

//   $resut=mysqli_query($connection,$q);
//   $num=mysqli_num_rows($resut);

//   if($num>0){
//     $_SESSION['user_id']== $row['id'];
//     header('location: home.php');

    
//   }else{
//     echo"Entered Wrong Data";
//     header('location:member_login.php');
//   }

//   mysqli_query($connection,$q);

?>