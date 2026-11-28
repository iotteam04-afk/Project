<?php
require_once __DIR__ . '/config.php';


session_start();



if (!isset($_SESSION['user_id'])) {
    header('Location:member_login.php');
    exit;
} 
$user_id = $_SESSION['user_id'];
    
if (isset($_POST['update_qty'])){
    $stmt = $conn->prepare("UPDATE cart SET quantity = ? WHERE id = ? AND user_id = ?");
    $stmt->execute([(int)$_POST['qty'],(int)$_POST['cart_id'], $user_id]);
    header('Location: cart.php');
    exit;
}
if (isset($_POST['remove_item'])){
    $stmt = $conn->prepare("DELETE FROM cart WHERE id = ? AND user_id = ?");
    $stmt->execute([(int)$_POST['cart_id'], $user_id]);
    header('Location: cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/home.css">

</head>

<body>

<?php include 'header/header.php';?>

    <div class="wrapper">

        <div class="wrapper_content">
            <div class="header_title">
                <div class="title" style="color:white;">
                    MY SHOPPING CART :
                </div>
                <div class="amount">
                </div>

            </div>


            <?php
            $grand_total = 0;
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $select_cart->execute([$user_id]);
            $items = $select_cart->fetchAll(PDO::FETCH_ASSOC);
            if (count($items) > 0) {
                foreach ($items as $fetch_cart) {
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
                                <button type = "submit" name = "update_qty">Update</button>
                                <button type = "submit" name = "remove_item">Remove</button>
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

                        
                        if (count($items) > 0) {
                            foreach ($items as $fetch_cart) {
                        ?>
                                <div class="ftotal">
                                    <p class="ct"><h3><?= $fetch_cart['name']; ?></h3></p>
                                    <p class="ct"><h3><?= "₹ " . ( $fetch_cart['price'] * $fetch_cart['quantity']); ?></h3></p>
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
                <?php if (count($items) > 0): ?>
                <div class="checkout">
                    <a href="checkout.php" role="button" class="checkout_btn">Place Order</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
</body>

</html>