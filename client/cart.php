<?php
session_start();

// Handle AJAX request to update quantity
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'update_quantity') {
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['quantity'];

    // Ensure the new quantity is valid
    if ($new_quantity > 0) {
        $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
    }

    // Calculate the updated total price and total items
    $total_price = 0;
    $total_items = 0;
    foreach ($_SESSION['cart'] as $product) {
        $total_price += $product['price'] * $product['quantity'];
        $total_items += $product['quantity'];
    }

    // Return updated totals as JSON
    echo json_encode([
        'total_price' => number_format($total_price, 2),
        'total_items' => $total_items
    ]);
    exit;
}

// Handle deletion request
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action']) && $_POST['action'] == 'delete_item') {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);

    // Recalculate the totals after item deletion
    $total_price = 0;
    $total_items = 0;
    foreach ($_SESSION['cart'] as $product) {
        $total_price += $product['price'] * $product['quantity'];
        $total_items += $product['quantity'];
    }

    // Return updated totals as JSON
    echo json_encode([
        'total_price' => number_format($total_price, 2),
        'total_items' => $total_items
    ]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Footprints</title>
    <link rel="stylesheet" href="cart.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="background-image: url(../assets/download2.jfif);">
    <header>
        <div id="navbar">
            <div class="logo">
                <img src="../assets/logo.png" alt="Logo" style="max-width: 100px;">
            </div>
            <nav>
                <ul>
                    <li><a href="main.php">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div class="profile-icon">
                <img src="../assets/samplepfp.jfif" alt="Profile" class="profile-img" id="profileIcon">
                <div class="dropdown" id="profileDropdown">
                    <a href="my-account.php">My Account</a>
                    <a href="cart.php">My Cart</a>
                    <a href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="cart">
            <h3>Your Cart</h3>
            <div class="cart-container">
                <form id="cart-form">
                    <table>
                        <thead>
                            <tr>
                                <th>PRODUCT</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            <?php
                            $total_price = 0;
                            $total_items = 0;
                            foreach ($_SESSION['cart'] as $product_id => $product) {
                                $total_price += $product['price'] * $product['quantity'];
                                $total_items += $product['quantity'];
                                echo "<tr id='product-{$product_id}'>
                                    <td>" . htmlspecialchars($product['name']) . "</td>
                                    <td>$" . htmlspecialchars($product['price']) . "</td>
                                    <td>
                                        <input type='number' class='quantity' data-id='{$product_id}' value='" . htmlspecialchars($product['quantity']) . "' min='1'>
                                    </td>
                                    <td>
                                        <button type='button' class='delete' data-id='{$product_id}'>Delete</button>
                                    </td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </form>
            </div>

            
            <div class="cart-summary-table">
    <table>
        <thead>
            <tr>
                <th>Summary</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Total Items</td>
                <td id="total-items"><?php echo $total_items; ?></td>
            </tr>
            <tr>
                <td>Total Price</td>
                <td id="total-price">$<?php echo number_format($total_price, 2); ?></td>
            </tr>
        </tbody>
    </table>
</div>

            <!-- Checkout Button -->
            <div class="checkout-container">
                <a href="checkout.php">
                    <button class="procheckout-btn">Proceed to Checkout</button>
                </a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Footprints Printing Services</p>
    </footer>

    <script>
        // Update quantity and totals dynamically
        $(document).on('input', '.quantity', function() {
            var productId = $(this).data('id');
            var quantity = $(this).val();

            $.ajax({
                type: 'POST',
                url: '', // Current page
                data: {
                    action: 'update_quantity',
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#total-price').text(data.total_price);
                    $('#total-items').text(data.total_items);
                }
            });
        });

        // Delete product from cart
        $(document).on('click', '.delete', function() {
            var productId = $(this).data('id');

            $.ajax({
                type: 'POST',
                url: '', // Current page
                data: {
                    action: 'delete_item',
                    product_id: productId
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#total-price').text(data.total_price);
                    $('#total-items').text(data.total_items);
                    $('#product-' + productId).remove();
                }
            });
        });
    </script>
</body>
</html>