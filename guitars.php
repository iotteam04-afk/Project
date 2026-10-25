<?php 

include 'dashboard/config.php';

if(isset($_SESSION['email'])){
  $user_id = $_SESSION['email'];
}else{
  $user_id = '';
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/guitars.css" rel="stylesheet" type="text/css">
  <title>Guitars</title>
</head>

<body>
  <!-- .card*3 -->

  <!-- guitar r1 -->

  <div class="row">
  <?php 
  $category = $_GET['category'];

$select_product = $conn->prepare("SELECT * from `products` WHERE category = ?");
$select_product->execute([$category]);
if($select_product->rowCount() > 0){
  while($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)){
    ?>



    <div class="card" id="g11">
       <img src="dashboard/instruments_img/guitar/<?php echo $fetch_product['image']; ?>" alt="">
      <div class="card-content">
        <h2 class="i_name"><?php echo $fetch_product['name']; ?></h2>
        <p class="i_content"><?php echo $fetch_product['details']; ?></p>
        
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
      <img src="./instruments_img/guitar/FSX315C4.png" alt="">
      <div class="card-content">
        <h2 class="i_name">Yamaha FSX315C</h2>
        <p class="i_content">Great playability and class-leading quality.</p>
        <a href="#" class="button">cart</a>
      </div>
    </div>

    <div class="card" id="g12">
      <img src="./instruments_img/guitar/FSX80C.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Yamaha FSX80C</h2>
        <p class="i_content">Perfect acoustic-electric Guitar for beginners.</p>
        <a href="#" class="button">cart</a>
      </div>
    </div>

    <div class="card" id="g13">
      <img src="instruments_img/guitar/FenderSquier.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Fender Squier Bullet</h2>
        <p class="i_content">Basswood,fingerboard: Rosewood. Controls Master Volume,Tone</p>
        <a href="#" class="button">cart</a>
      </div>
    </div>
  </div>



  <!-- guitar r2 -->

  <div class="row">

    <div class="card" id="g21">
      <img src="instruments_img/guitar/JS140M.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Ibanez JS140M</h2>
        <p class="i_content">Great playability and class-leading quality.</p>
        <a href="#" class="button">cart</a>
      </div>
    </div>

    <div class="card" id="g22">
      <img src="instruments_img/guitar/Kadence.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Kadence</h2>
        <p class="i_content">Perfect acoustic-electric Guitar for beginners.</p>
        <a href="#" class="button">cart</a>
      </div>
    </div>

    <div class="card" id="g23">
      <img src="instruments_img/guitar/TanglewoodCross.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Tanglewood Cross</h2>
        <p class="i_content">TWCR O Acoustic Guitar, Orchestra, Whiskey Barrel Burst Satin Finish</p>
        <a href="#" class="button">cart</a>
      </div>
    </div>
  </div>


  <!-- guitar r3 -->

  <div class="row">

    <div class="card" id="g1">
      <img src="instruments_img/guitar/YamahaPACIFICA012.jpg" alt="">
      <div class="card-content">
        <h2 class="i_name">Yamaha PACIFICA012</h2>
        <p class="i_content">Dark Blue Metallic Electric Guitar, quality of craftsmanship and tone.</p>
        <a href="#" class="button">cart</a>
      </div>
    </div>

    <div class="card" id="g2" style="width: 100%;">
      <img src="instruments_img/guitar/IBANEZGRG170D.jpg" alt="" >
      <div class="card-content" >
        <h2 class="i_name">Ibanez GRG170DX</h2>
        <p class="i_content">A double cutaway body profile0,</p>
        <a href="#" class="button">cart</a>
      </div>
    </div>

    <div class="card" id="g3">
      <img src="instruments_img/guitar/Washburn.jpg" alt="" >
      <div class="card-content" >
        <h2 class="i_name">Washburn WD10CEB</h2>
        <p class="i_content">Washburn WD10CEB/BL/R Apprentice Series Acoustic Guitar</p>
        <a href="#" class="button">cart</a>
      </div>
    </div>
  </div>

</body>

</html>