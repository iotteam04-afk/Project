<?php

require_once __DIR__ . '/config.php';

session_start();


if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};



include 'wishlist_cart.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>category</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="dashboard/vendor/fontawesome-free/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/shop.css">
   <link rel="stylesheet" href="css/home.css">

</head>
<body>

<?php include 'header/header.php'; ?>
<?php if (!empty($message)) foreach ($message as $msg) { ?>
   <div class = "message"><span><?= e($msg) ?></span></div>
<?php } ?> 

<section class="products">

   <h1 class="heading">All Products</h1>

   <div class="box-container">

   <?php
      
      $select_products = $conn->prepare("SELECT * FROM `products`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>

   <form action="" class="box" method="POST">
   <input type="hidden" name="pid" value="<?= $fetch_products['id']; ?>">
      <input type="hidden" name="name" value="<?= $fetch_products['name']; ?>">
      <input type="hidden" name="price" value="<?= $fetch_products['price']; ?>">
      <input type="hidden" name="image" value="<?= $fetch_products['image']; ?>">
      <img src="dashboard/instruments_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="flex">
      <div class="price">₹ <span><?= $fetch_products['price']; ?></span>/-</div>
      
      <input type="number" min="1" value="1" name="qty" class="qty" max="99" onkeypress="if(this.value.length == 2) return false;">
      </div>
      <div class="name"><?= $fetch_products['details']; ?></div>
      
      <input type="submit" value="add to cart" class="btn" name="add_to_cart">
      <input type="button" value="Buy Now" href="checkout.php?id=<?= $fetch_products['id'];?>" class="btn">
   </form>
   <?php
      }
   }else{
      echo '<p class="empty">no products found!</p>';
   }
   ?>

   </div>

</section>
</body>
</html>