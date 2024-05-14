<!-- remove_from_cart.php -->

<?php
session_start();

if(isset($_POST['productId'])) {
    $productId = $_POST['productId'];
    
    // Check if the product exists in the cart
    if(isset($_SESSION['cart'][$productId])) {
        // Remove the product from the cart
        unset($_SESSION['cart'][$productId]);
        echo "Item removed from cart successfully";
    } else {
        echo "Product not found in cart";
    }
} else {
    echo "Invalid request";
}
?>
