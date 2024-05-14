
            <?php
// Check if a session is not already active
// if (session_status() == PHP_SESSION_NONE) {
//     session_start(); // Start the session
// }

if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo '<ul class="cart-item border-bottom padding-small" id="cart">';
    
    foreach($_SESSION['cart'] as $productId => $item) {
        // Convert price and quantity to numeric values
        $price = floatval($item['price']); // Convert to float
        $quantity = intval($item['quantity']); // Convert to integer

        // Calculate total price
        $total = $price * $quantity;
        
        echo '<div class="cart-item padding-small" id="cart">';
        echo '<div class="row align-items-center">';
        
        // Product Image
        echo '<div class="col-lg-4 col-md-3">';
        echo '<div class="cart-info d-flex gap-2 flex-wrap align-items-center">';
        echo '<div class="col-lg-5">';
        echo '<div class="card-image">';
        echo '<img src="' . $item['image'] . '" alt="' . $item['name'] . '" class="img-fluid border rounded-3">';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-lg-4">';
        
        // Product Name
        echo '<div class="card-detail">';
        echo '<h5 class="mt-2"><a href="single-product.html">' . $item['name'] . '</a></h5>';
        
        // Product Price
        echo '<div class="card-price">';
        echo '<span class="price text-primary fw-light" id="totalAmount">$' . number_format($item['price'], 2) . '</span>';
        echo '</div>';
        
        echo '</div>'; // Closing card-detail
        echo '</div>'; // Closing col-lg-4
        echo '</div>'; // Closing cart-info
        echo '</div>'; // Closing col-lg-4 col-md-3
        
        // Quantity and Total
        echo '<div class="col-lg-6 col-md-7">';
        echo '<div class="row d-flex">';
        
        // Quantity Selector
        echo '<div class="col-md-6">';
        echo '<div class="product-quantity my-2 my-2">';
        echo '<div class="input-group product-qty align-items-center" style="max-width: 150px">';
        echo '<input readonly type="text" id="quantity" name="quantity" class="form-control bg-white shadow border rounded-3 py-2 mx-2 input-number text-center" value="' . $item['quantity'] . '" min="1" max="100" required="">';
        echo '</div>'; // Closing input-group
        echo '</div>'; // Closing product-quantity
        echo '</div>'; // Closing col-md-6
        
        // Total Price
        echo '<div class="col-md-4">';
        echo '<div class="total-price">';
        echo '<span class="money fs-2 fw-light text-primary">$' . number_format($total, 2) . '</span>';
        echo '</div>'; // Closing total-price
        echo '</div>'; // Closing col-md-4
        
        echo '</div>'; // Closing row d-flex
        echo '</div>'; // Closing col-lg-6 col-md-7
        
        // Remove Item Button
        echo '<div class="col-lg-1 col-md-2">';
        echo '<div class="cart-cross-outline">';
        echo '<button class="remove-item" data-product-id="' . $productId . '" style="border: none !important; background: none  !important;"><svg class="cart-cross-outline" width="38" height="38"><use xlink:href="#cart-cross-outline"></use></svg></button>';
        echo '</div>'; // Closing cart-cross-outline
        echo '</div>'; // Closing col-lg-1 col-md-2
        
        echo '</div>'; // Closing row align-items-center
        echo '</div>'; // Closing cart-item border-bottom padding-small
    }
    
    echo '</ul>'; // Closing cart-item border-bottom padding-small
} else {
    echo '<p>Your cart is empty.</p>';
}
?>