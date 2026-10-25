<!DOCTYPE html>
<html lang="en">

<?php

include 'dashboard/config.php';

session_start();



if (isset($_SESSION['email'])) {
  $user_id = $_SESSION['email'];
} else {
  $user_id = '';
};


?>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="css/home.css" rel="stylesheet" type="text/css">
</head>

<body>

  <header id="header">
    <!-- <div class="container"> -->
    <nav class="topnav">
      <ul>
        <li> <a href="home.php">Home</a> </li>
      </ul>
      <ul class="name">
        <li>
          <div class="dd">
            <button class="dropbtn">Instruments
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="ddc">
              <a href="category.php?category=Guitar">Guitars</a>
              <a href="category.php?category=Violin">Violins</a>
              <a href="category.php?category=Percussion">Percussion</a>
            </div>
          </div>
        </li>
        <li> <a href="member_login.php">Member Login</a> </li>
        <li> <a href="admin_page.php" class="slpit">Admin Login</a> </li>
        <li> <a href="cart.php">Cart</a> </li>
      </ul>
    </nav>
  </header>

  <br>

  <div class="slideshow-container">

    <div class="mySlides fade">
      <div style="color:rgb(249 180 255); font-size: 70px;" class="text">PLAY WITH SOUND.</div>
      <img class="i_vh" src="images/img_1.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
      <div style="color:rgb(255, 255, 255); font-size: 70px;" class="text">LEARN THE SOUND.</div>
      <img class="i_vh" src="images/img_10.jpg" style="width:100%">
    </div>

    <div class="mySlides fade">
      <div style="color:rgb(255, 255, 255); font-size: 70px;" class="text">PLAY YOUR SOUND.</div>
      <img class="i_vh" src="images/img_11.jpg" style="width:100%;">
    </div>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>

  </div>
  <br>
  <br>
  <br>
  <div></div>

  <script src="slider_script.js"></script>

  <div>
    <h3 id="welcome">WELCOME TO sHeights</h3>
    <h2>
      <marquee> <i>GLADE TO SEE YOU HERE!! </i> </marquee>
    </h2>
    <h4>Find YOUR Sound for Music. </h4>
  </div>

  <br>
  <br>

  <!-- general product container -->
  <div class="product-container">

    <p id="bestone"> BEST ONES </p>

    <div class="products">
      <br>

      <!-- product 1 -->
<?php
      $select_products = $conn->prepare("SELECT * FROM `products` LIMIT 3");
      $select_products->execute();
      if($select_products->rowCount() > 0){
      while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){
      ?>
      <div class="product">
        <img src="dashboard/instruments_img/<?= $fetch_products['image'] ?>">
        <div class="product-info">
          <h3 class="product-name"><?= $fetch_products['name'] ?>
          </h3>
          <ul class="product-info" style="list-style-type:disc">
            <li><?= $fetch_products['details'] ?></li>
            <li>High durability and stability proven by Yamaha's quality standard</li>
            <li>38 inches long (96.5cm)</li>
          </ul>
          <h4 class="product-price">₹ 7,000</h4>
          <!-- <h4 class="product-offer">50%</h4> -->
          <!-- <p class="product-quantity">Qnt: <input value="1" name=""> -->
          
        </div>
      </div>
<?php }}?>
      <!-- product 2 -->

      <div class="product" style="float: right;">
        <img src="instruments_img/violin/violin_1.jpg">
        <div class="product-info">
          <h3 class="product-name">Sergio Tordini </h3>
          <ul class="product-info" style="list-style-type:disc">
            <li>Rosin And Soft Case - STC 441</li>
            <li>4/4 Full Size Acoustic Violin With Bow</li>
            <li>Made in Yamaha Music India factory</li>
          </ul>
          <h4 class="product-price">₹ 10,800</h4>
          <!-- <p class="product-quantity">Qnt: <input value="1" name=""> -->
          
        </div>
      </div>

      <!-- product 3 -->

      <div class="product">
        <img src="instruments_img/violin/violin_5.jpg">
        <div class="product-info">
          <h3 class="product-name">Mike Music 4/4 Black Violin </h3>
          <ul class="product-info" style="list-style-type:disc">
            <li>Size 4/4 Mike Music Black varnish violin</li>
            <li>Hard Case, Shoulder Rest, Bow, Rosin</li>
            <li>Basswood top with maple back & sides, tuned by professional Strings.</li>
          </ul>
          <h4 class="product-price">₹ 6,600</h4>
          <!-- <p class="product-quantity">Qnt: <input value="1" name=""> -->
          
        </div>
      </div>

      <!-- product 4 -->

      <div class="product">
        <img src="instruments_img/guitar/guitar_2.jpg">
        <div class="product-info">
          <h3 class="product-name">Yamaha FX280 TBS </h3>
          <ul class="product-info" style="list-style-type:disc">
            <li>(Brown Sunburst) Electro Acoustic Guitar,perfect acoustic-electric Guitar for beginners.</li>
            <li>4/4 Full Size Acoustic Violin With Bow</li>
            <li>Made in Yamaha Music India factory</li>
          </ul>
          <h4 class="product-price">₹10,990 </h4>
          <!-- <p class="product-quantity">Qnt: <input value="1" name=""> -->
          
        </div>
      </div>
    </div>
  </div>
  <!-- </div> -->

  <br>

  <div class="about-page" style="background-color: #ebd0e8;">

    <div class="about-page">
      Music has been a part of human life since times immemorial. It is not just an activity that involves an individual
      and a set of musical instruments. It is, instead, a medium that helps express the
      most profound human emotions.
    </div>

    <div class="about-page">
      Music may also refer to the art of composing such pleasant sounds with the help of the various musical
      instruments.
      Instruments has a particular
      design that is different from any other instrument around and is played much more differently then other
      instruments
      in circulation today.
    </div>

    <div class="about-page">
      sHeights Music has begin with a new start up for the people who love to hear and play instruments, to create music
      and with the talents they have in music.
    </div>

    <div class="about-page">
      sHeights Music India has its online presence where customers can order products directly from the website in order
      to ensure complete peace of mind regarding product authenticity and delivery.
    </div>

    <div class="about-page">
      <ul class="about-page">
        <li>
          Music Instruments
        </li>
        <ul class="about-page">
          <li>Guitar</li>
          <li>Violin</li>
          <li>Keyboard</li>
        </ul>
    </div>



    <div class="about-page">
      The world of music has endless possibilities. Sheights has been on the cutting edge of innovation. We know you
      will
      find a lot of music instruments
      that will delight you. as we specified previously, ordering from Sheights music India is a seal of trust between
      the
      creators and the users.
    </div>

    <div class="about-page">
      Please explore our online music store to view what makes us grow and fullfill your needs in music.
    </div>

  </div>



</body>

</html>