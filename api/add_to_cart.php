

<?php
session_start();

// Check if POST data is received
if(isset($_POST['productId']) && isset($_POST['quantity']) && isset($_POST['color']) && isset($_POST['size']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['image'])) {
    $productId = $_POST['productId'];
    $quantity = intval($_POST['quantity']);
    $color = $_POST['color'];
    $size = $_POST['size'];
    $name = $_POST['name'];
    $price = floatval($_POST['price']);
    $image = $_POST['image'];
    
    // Add item to cart session
    if(isset($_SESSION['cart'][$productId])) {
        // If item already exists in cart, update quantity
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        // If item doesn't exist in cart, add it with details
        $_SESSION['cart'][$productId] = [
            'name' => $name,
            'price' => $price,
            'quantity' => $quantity,
            'color' => $color,
            'size' => $size,
            'image' => $image
        ];
    }
    
    // Calculate cart count
    $cartCount = count($_SESSION['cart']);
    
    // Send JSON response with updated cart count
    echo json_encode(['cartCount' => $cartCount]);
} else {
    // Handle invalid or missing POST data
    echo json_encode(['error' => 'Invalid request']);
}
?>
