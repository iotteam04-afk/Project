<?php 

include 'dashboard/config.php';


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/percussion.css" rel="stylesheet" type="text/css">
  <title>Percussions</title>
</head>

<body>
  <!-- .card*3 -->

  <!-- guitar r1 -->
  <?php 

$select_product = $conn->prepare("SELECT * from `products` WHERE `category` = `Percussion`");
$select_product->execute();
if($select_product->rowCount() > 0){
  while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)){
    ?>

<div class="row">

    <div class="card" id="g11">
       <img src="./instruments_img/<?php $fetch_product['image']; ?>" alt="">
      <div class="card-content">
        <h2 class="i_name"><?php $fetch_product['name']; ?></h2>
        <p class="i_content"><?php $fetch_product['details']; ?></p>
        
        <a href="#" class="button">Know More</a>
      </div>
    </div>

</div>

<?php


  }
}

?>


  <div class="row">

    <div class="card" id="g11">
       <img src="./instruments_img/guitar/FenderSquier.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Khanjari - tambourine</h2>
        <p class="i_content">Made in steel and bakelite with extra drumhead nylon sheet.</p>
        <a href="#" class="button">Know More</a>
      </div>
    </div>

    <div class="card" id="g12">
      <img src="./instruments_img/percussion/PlasticEggShaker.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Meinl Plastic Egg Shaker</h2>
        <p class="i_content">Egg Shakers from Meinl,extremely pronounced and crystal clear sound.</p>
        <a href="#" class="button">Know More</a>
      </div>
    </div>

    <div class="card" id="g13">
      <img src="./instruments_img/percussion/51F+jdNqqaL._SL1020_.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Latin Percussion LP446-L</h2>
        <p class="i_content">Great for a variety of musical applications,Large - 9" tube shaker</p>
        <a href="#" class="button">Know More</a>
      </div>
    </div>
  </div>

  <!-- guitar r2 -->

  <div class="row">

    <div class="card" id="g21">
      <img src="./instruments_img/percussion/s-pdpxl.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Wooden Cabasa Shaker</h2>
        <p class="i_content">Hand Shaker Percussion Instrument With Metal Beads For Classroom Band 3.5".</p>
        <a href="#" class="button">Know More</a>
      </div>
    </div>

    <div class="card" id="g22">
      <img src="./instruments_img/percussion/TrianglewithBeater.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Triangle</h2>
        <p class="i_content">BuyPluto6 Triangle with Beater-Indias music equipment superstore.</p>
        <a href="#" class="button">Know More</a>
      </div>
    </div>

    <div class="card" id="g23">
      <img src="./instruments_img/percussion/Freeship.jpg" alt="" style="width: 358px;height:355px">
      <div class="card-content">
        <h2 class="i_name">Freeship Fine 1pc</h2>
        <p class="i_content">Wooden three tone AGOGO beater guiro scraper percussion musical instrument.</p>
        <a href="#" class="button">Know More</a>
      </div>
    </div>
  </div>


  <!-- guitar r3 -->

  <div class="row">

    <div class="card" id="g1">
      <img src="./instruments_img/percussion/Bongo.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Bongo Drum</h2>
        <p class="i_content">Matte Electro-Acoustic EQ Violin with Case Bow Rosin Extra Strings.</p>
        <a href="#" class="button">Know More</a>
      </div>
    </div>

    <div class="card" id="g2" style="width: 100%;">
      <img src="./instruments_img/percussion/Djembe.jpg" alt="" >
      <div class="card-content" >
        <h2 class="i_name">African Djembe</h2>
        <p class="i_content">Professional & Sweet Sound natural spruce wood violin top.</p>
        <a href="#" class="button">Know More</a>
      </div>
    </div>

    <div class="card" id="g3">
      <img src="./instruments_img/percussion/Cajon.jpg" alt="" >
      <div class="card-content" >
        <h2 class="i_name">Meinl Pickup Cajon</h2>
        <p class="i_content">Equipped with three Piezo pickups,two for snare and for the bass sounds.</p>
        <a href="#" class="button">Know More</a>
      </div>
    </div>
  </div>

</body>

</html>