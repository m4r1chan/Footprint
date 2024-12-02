<?php
session_start();

// Check if the cart is empty
if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

// Initialize total price and items
$total_price = 0;
$total_items = 0;
foreach ($_SESSION['cart'] as $product) {
    $total_price += $product['price'] * $product['quantity'];
    $total_items += $product['quantity'];
}

// Handle form submission (e.g., process payment or store order)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Here you would typically handle the payment processing and save the order details
    // For demonstration purposes, we'll just clear the cart
    $_SESSION['cart'] = [];
    header("Location: order_confirmation.php"); // Redirect to an order confirmation page
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Footprints</title>
    <link rel="stylesheet" href="checkout.css">
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
    <section id="checkout">
        <h3>Checkout</h3>
        <div class="checkout-container">
            <h4>Order Summary</h4>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['name']); ?></td>
                            <td>$<?php echo number_format($product['price'], 2); ?></td>
                            <td><?php echo $product['quantity']; ?></td>
                            <td>$<?php echo number_format($product['price'] * $product['quantity'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="cart-summary-container">
    <table class="cart-summary-table">
        <tr>
            <td>Total Items:</td>
            <td><?php echo $total_items; ?></td>
        </tr>
        <tr>
            <td>Total Price:</td>
            <td>$<?php echo number_format($total_price, 2); ?></td>
        </tr>
    </table>
</div>


            <!-- Checkout Form inside Billing Box -->
            <div class="billing-box">
                <h4>Billing Information</h4>
                <form method="POST">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required>

                    <label for="address">Shipping Address</label>
                    <textarea id="address" name="address" required></textarea>

                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" name="phone" required>

                    <label for="payment">Payment Method</label>
                    <select id="payment" name="payment" required>
                        <option value="credit_card">Credit Card</option>
                        <option value="gcash">Gcash</option>
                        <option value="cash_on_delivery">Cash on Delivery</option>
                    </select>

                    <button type="submit" class="checkout-btn">Place Order</button>
                </form>
            </div>
        </div>
    </section>
</main>

    <footer>
        <p>&copy; 2024 Footprints Printing Services</p>
    </footer>
</body>
</html>
