<?php

require_once __DIR__ . '/security.php';

if (isset($_POST['add_product'])) {

   $name = trim($_POST['name'] ?? '');
   $price = (int)($_POST['price'] ?? 0);
   $category = $_POST['category'] ?? '';
   $details = trim($_POST['details'] ?? '');
   $image_01 = basename(trim($_POST['image_01'] ?? ''));

   if (!in_array($category, ['guitar', 'violin', 'percussion'],true)) {
      $category = 'guitar';
   }
   $select_products = $conn->prepare("SELECT * FROM `products` WHERE name = ?");
   $select_products->execute([$name]);

   if ($select_products->rowCount() > 0) {
      $message[] = 'product name already exist!';
   } else {

      $insert_products = $conn->prepare("INSERT INTO `products`(name, details, price,category,image) VALUES(?,?,?,?,?)");
      $insert_products->execute([$name, $details, $price, $category, $image_01]);

      $message[] = 'new product added!';

   }
};

if (isset($_POST['delete_product'])) {

   $deleted_id = (int)($_POST['delete_id'] ?? 0);

   $stmt = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   $stmt->execute([$deleted_id]);

   $stmt = $conn->prepare("DELETE FROM `products` WHERE id = ?");
   $stmt->execute([$deleted_id]);

   header('Location: add_products.php');
   exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">

   <link rel="stylesheet" href="./admin_style.css">

</head>

<body>

<?php if (!empty($message)) foreach ($message as $msg) { ?>
   <div class="message"><span><?= e($msg) ?></span></div>
<?php } ?>

   <section class="add-products">

      <h1 class="heading">add product</h1>

      <form action="" method="post">
         <div class="flex">
            <div class="inputBox">
               <span>product name (required)</span>
               <input type="text" class="box" required maxlength="100" placeholder="enter product name" name="name">
            </div>
            <div class="inputBox">
               <span>product price (required)</span>
               <input type="number" min="0" class="box" required max="9999999999" placeholder="enter product price" onkeypress="if(this.value.length == 10) return false;" name="price">
            </div>
            <div class="inputBox">
               <span>Select Category (required)</span>
               <select name="category" id="category" class="box">
                  <option value="guitar">Guitar</option>
                  <option value="violin">Violin</option>
                  <option value="percussion">Percussion</option>
               </select>
            </div>
            <div class="inputBox">
               <span>image 01 (required)</span>
               <input type="file" name="image_01" accept="image/jpg, image/jpeg, image/png, image/webp" class="box" required>
            </div>

            <div class="inputBox">
               <span>product details (required)</span>
               <textarea name="details" placeholder="enter product details" class="box" required maxlength="500" cols="30" rows="10"></textarea>
            </div>
         </div>

         <input type="submit" value="add product" class="btn" name="add_product">
         
      </form>

   </section>

   <section class="show-products">

      <h1 class="heading">products added</h1>

      <div class="box-container">

         <?php
         $select_products = $conn->prepare("SELECT * FROM `products`");
         $select_products->execute();
         if ($select_products->rowCount() > 0) {
            while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
         ?>
               <div class="box">
                  <img src="instruments_img/<?= e($fetch_products['image']) ?>" alt="">
                  <div class="name"><?= e($fetch_products['name']) ?></div>
                  <div class="price">Category: <?= e($fetch_products['category']) ?></div>
                  <div class="price">Rs. <span><?= e($fetch_products['price']) ?></span>/-</div>
                  <div class="details"><span><?= e($fetch_products['details']) ?></span></div>
                  <a href="update_product.php?update=<?= e($fetch_products['id']) ?>" class="btn">Update Products</a>
                  <form action="add_products.php" method="post" style="display: inline;">
                     <input type="hidden" name="delete_id" value="<?= e($fetch_products['id']) ?>">
                     <button type="submit" name="delete_product" class="btn">Delete </button>
                  </form>
               </div>
         <?php
            }
         } else {
            echo '<p class="empty">no products added yet!</p>';
         }
         ?>

      </div>

   </section>

</body>

</html>