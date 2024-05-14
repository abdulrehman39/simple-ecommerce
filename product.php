<!-- product.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>
</head>
<body>
    <h2>Product Name</h2>
    <img src="path_to_your_product_image.jpg" alt="Product Image" height="200px" width="200px">
    <p>Price: $10.99</p>
    
    <!-- Color selection -->
    <label for="color">Select Color:</label>
    <select id="color" name="color">
        <option value="Red">Red</option>
        <option value="Blue">Blue</option>
        <option value="Green">Green</option>
        <!-- Add more color options as needed -->
    </select>
    
    <!-- Size selection -->
    <label for="size">Select Size:</label>
    <select id="size" name="size">
        <option value="Small">Small</option>
        <option value="Medium">Medium</option>
        <option value="Large">Large</option>
        <!-- Add more size options as needed -->
    </select>
    
    <label for="quantity">Quantity:</label>
    <input type="number" id="quantity" name="quantity" value="1" min="1">
    <button class="add-to-cart" data-product-id="1">Add to Cart</button>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function(e) {
                e.preventDefault();
                
                var productId = $(this).data('product-id');
                var quantity = $('#quantity').val();
                var color = $('#color').val();
                var size = $('#size').val();
                
                // Send AJAX request to add item to cart
                $.ajax({
                    url: 'add_to_cart.php',
                    type: 'POST',
                    data: {
                        productId: productId,
                        quantity: quantity,
                        color: color,
                        size: size
                    },
                    success: function(response) {
                        $('#cart-count').text(response.cartCount);
                        alert('Item added to cart!');
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>
</html>
