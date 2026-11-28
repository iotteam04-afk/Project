<?php



 
if(isset($_POST['add_to_cart'])){

   if($user_id === '') {
      header('Location: member_login.php');
      exit;
   }
      $pid = (int)($_POST['pid'] ?? 0);
      $name = trim($_POST['name'] ?? '');
      $price = (int)($_POST['price'] ?? 0);
      $image = basename(trim($_POST['image'] ?? ''));
      $qty = (int)($_POST['qty'] ?? 1);

      $check_cart_numbers = $conn->prepare("SELECT * FROM `cart` WHERE pid = ? AND user_id = ?");
      $check_cart_numbers->execute([$pid, $user_id]);

      if($check_cart_numbers->rowCount() > 0){
         $message[] = 'already added to cart!';
      }else{


         $insert_cart = $conn->prepare("INSERT INTO `cart`(user_id, pid, name, price, quantity, image) VALUES(?,?,?,?,?,?)");
         $insert_cart->execute([$user_id, $pid, $name, $price, $qty, $image]);
         $message[] = 'added to cart!';
         
      }

   }



?>