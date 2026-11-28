<?php
session_start();

require_once __DIR__ . '/config.php';



if(!isset($_SESSION['user_id'])){
   header('Location: member_login.php');
   exit;
 }
 $user_id = $_SESSION['user_id'];


 
 $order_done = false;
 $message = [];
 
// $pid = $_GET['id'];


if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $address = $_POST['address'];
   
   $stmt = $conn->prepare('SELECT * FROM `cart` WHERE user_id = ?');
   $stmt->execute([$user_id]);
   $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

   
   if(count($items) === 0){
      $message[] = 'Your cart is empty';
   } else {
      $price_total = 0;
      $total_product = 0;
      foreach($items as $it){
         $price_total  += $it['price'] * $it['quantity'];
         $total_product += $it['quantity'];
      }
      $conn->beginTransaction();

      $stmt = $conn->prepare('INSERT INTO `order` (name,number,email,method,address,total_products,total_price,user_id) VALUES (?,?,?,?,?,?,?,?)');
      $detail_query = $stmt->execute([$name, $number, $email,$method,$address, $total_product, $price_total, $user_id]);
      $order_id = $conn->lastInsertid();

      $stmt = $conn->prepare('INSERT INTO order_items (order_id,product_id,name,price,quantity) VALUES (?,?,?,?,?)');
      foreach($items as $it){
         $stmt->execute([$order_id,$it['pid'],$it['name'],$it['price'],$it['quantity']]);
      }

      $stmt = $conn->prepare('DELETE FROM `cart` WHERE user_id = ?');
      $stmt->execute([$user_id]);

      $conn->commit();
      $order_done = true;
      

      }
}
?>
      
   
      <?php if ($order_done): ?>
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
            <span><?= e($total_product) ?></span>
            <span class='total'> total : ₹<?= e($price_total) ?>/-  </span>
         </div>
         <div class='customer-details'>
            <p> your name : <span><?= e($name) ?></span> </p>
            <p> your number : <span><?= e($number) ?></span> </p>
            <p> your email : <span><?= e($email) ?></span> </p>
            <p> your address : <span><?= e($address) ?></span> </p>
            <p> your payment mode : <span><?= e($method) ?></span> </p>
            <p>(*pay when product arrives*)</p>
         </div>
            <a href='home.php' class='btn'>continue shopping</a>
         </div>
      </div>
      
      <?php endif; ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="dashboard/vendor/fontawesome-free/css/all.min.css">
   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/checkout.css">

</head>
<body>


<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>
   <?php foreach ($message as $msg) { ?>
      <div class="message"><span><?= e($msg) ?></span></div>
   <?php } ?>

   <form action="" method="post">

   <div class="display-order">
      <?php
         $stmt = $conn->prepare( "SELECT * FROM `cart` where user_id=?");
         $stmt->execute([$user_id]);
         $cart_rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
         $total = 0;
         $grand_total = 0;
         if(count($cart_rows) > 0){
            foreach($cart_rows as $fetch_cart){
            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
            $grand_total +=  $total_price;
      ?>
      <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
         }
      }else{
         echo "<div class='display-order'><span>your cart is empty!</span></div>";
      }
      ?>
      <span class="grand-total"> grand total : ₹<?= $grand_total; ?> /- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="tel" placeholder="enter your number" name="number" max="10" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address</span>
            <textarea name="address" id="address" cols="30" rows="10" placeholder="enter your address"></textarea>
         </div>
         
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>
</div>
</body>
</html>