<?php
include 'dashboard/config.php';


session_start();



if (isset($_SESSION['email'])) {
    $user_id = $_SESSION['email'];
} else {
    $user_id = '';
    header('location:member_login.php');
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Design Page For beginners</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="css/home.css">

    <script src="./jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            $(".size_select").click(function() {
                $(".slider").addClass("active");
                $(".select_size").show();
                $(".select_quantity").hide();
            })

            $(".qty_select").click(function() {
                $(".slider").addClass("active");
                $(".select_size").hide();
                $(".select_quantity").show();
            })

            $(".close, .bg_shadow, .button").click(function() {
                $(".slider").removeClass("active");
            })

            $(".select_size .body ul li").click(function() {
                $(".select_size .body ul li").removeClass("active");
                $(this).addClass("active");
                $(".size_select span").text($(this).text());
                $(".slider").removeClass("active");
            })

            $(".select_quantity .body ul li").click(function() {
                $(".select_quantity .body ul li").removeClass("active");
                $(this).addClass("active");
                $(".qty_select span").text($(this).text());
                $(".slider").removeClass("active");
            })

        });
    </script>
</head>

<body>

<?php include 'header/header.php';?>

    <!-- <div class="cart_navigation">
        <div class="cart_logo">
            <a href="#"><i class="fas fa-shopping-cart"></i></a>
        </div>
        <div class="middle_content">
            <div class="bag">BAG ----</div>
            
            <div class="address">ADDRESS ----</div>
            
            <div class="payment">PAYMENT</div>
            
        </div>
        <div class="secure">
            <i class="fas fa-lock"></i>
            <p>100% secure</p>
        </div>
    </div> -->
    <div class="wrapper">

        <div class="wrapper_content">
            <div class="header_title">
                <div class="title" style="color:white;">
                    MY SHOPPING CART :
                </div>
                <div class="amount">
                    <!-- <b>( 2 ) ITEMS</b>  -->
                </div>

            </div>


            <?php
            $grand_total = 0;
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            if ($select_cart->rowCount() > 0) {
                while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
            ?>

                    <form action="" method="post">
                        <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
                        <div class="product_wrap">
                            <div class="product_info">
                                <div class="product_img">
                                    <img src="dashboard/instruments_img/<?= $fetch_cart['image']; ?>" alt="ProductImage" width="200px" height="200px">
                                </div>
                                <div class="product_data">
                                    <div class="description">
                                        <div class="main_header">
                                            <?= $fetch_cart['name']; ?>
                                        </div>

                                    </div>
                                    <div class="qty">

                                        <div class="qty_select">
                                            <p>Qty : <span><input type="number" name="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $fetch_cart['quantity']; ?>"></span></p>

                                        </div>
                                    </div>
                                    <div class="price">
                                        <div class="current_price">₹ <?= $fetch_cart['price']; ?>/-</div>


                                    </div>
                                </div>
                            </div>
                            <div class="product_btns">
                                <!-- items to delete -->
                                <div>
                                    Sub-Total : <span>₹ <?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</span>
                                </div>
                            </div>

                        </div>
                    </form>

            <?php

                    $grand_total = $grand_total + $sub_total;
                }
            } else {
                echo '<p style="color:white;"> Your cart is empty</p>';
            }
            ?>


            <div class="wrapper_amount">
                <div class="header_title">
                    <div class="title" style="color: white;">
                        TOTAL PRICE DETAILS:
                    </div>

                </div>
                <div class="price_details">

                    <div class="total">
                        <?php

                        $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                        $select_cart->execute([$user_id]);
                        if ($select_cart->rowCount() > 0) {
                            while ($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                                <div class="ftotal">
                                    <p class="ct"><h3><?= $fetch_cart['name']; ?></h3></p>
                                    <p class="ct"><h3><?= "₹ " . $fetch_cart['price']; ?></h3></p>
                                </div>

                        <?php }
                        } ?>
                    </div>
                    <div class="gtotal">
                        <p>
                        <h2>Total :</h2>
                        </p>
                        <p>
                        <h2><?php echo "₹ " . $grand_total; ?></h2>
                        </p>
                    </div>
                </div>

                <?php

                        $select_product = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
                        $select_product->execute([$user_id]);
                        if ($select_product->rowCount() > 0) {
                            while ($fetch_product = $select_product->fetch(PDO::FETCH_ASSOC)) {}}
                        ?>
                <div class="checkout">
                    <a href="checkout.php" role="button" class="checkout_btn">Place Order</a>
                </div>
            </div>
        </div>
</body>

</html>