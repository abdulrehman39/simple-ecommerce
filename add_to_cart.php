<?php
session_start();

// Check if POST data is received
if(isset($_POST['productId']) && isset($_POST['quantity']) && isset($_POST['color']) && isset($_POST['size'])) {
    $productId = $_POST['productId'];
    $quantity = $_POST['quantity'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    
    // Fetch product details including image URL from a data source (e.g., database)
    // Example: Assume $productDetails is fetched based on $productId
    $productDetails = [
        'id' => $productId,
        'name' => 'Iphone 15 Pro Max', // Example product name
        'price' => 1999.99, // Example product price
        'color' => $color, // Product color
        'size' => $size, // Product size
        'image' => 'images/product-thumbnail-1.png' // Example product image URL
    ];
    
    // Add item to cart session
    if(isset($_SESSION['cart'][$productId])) {
        // If item already exists in cart, update quantity
        $_SESSION['cart'][$productId]['quantity'] += $quantity;
    } else {
        // If item doesn't exist in cart, add it with details
        $_SESSION['cart'][$productId] = [
            'name' => $productDetails['name'],
            'price' => $productDetails['price'],
            'quantity' => $quantity,
            'color' => $color,
            'size' => $size,
            'image' => $productDetails['image'] // Store image URL in cart
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
