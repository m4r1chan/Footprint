<?php
session_start();

// Check if the cart exists, if not create an empty cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Add product to the cart when the form is submitted
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];

    // Add product to the session cart array
    $_SESSION['cart'][] = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'quantity' => 1 // Default quantity is 1
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products - Footprints</title>
    <link rel="stylesheet" href="../style.css">
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
                    <li><a href="products.php"><b>Products</b></a></li>
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
        <section id="products">
            <h2>Our Products</h2>
            <div class="product-list" id="product-list">
                <!-- Product Item 1 -->
                <div class="product-item">
                    <div class="product-box">
                        <img src="../assets/Ref Magnets.jfif" alt="Business Cards" class="product-image" />
                        <h3>Souviner (Ref Magnets)</h3>
                        <p>"Create lasting memories with our high-quality personalized souvenirs."</p>
                        
                        <!-- Add to Cart Form -->
                        <form action="products.php" method="POST">
                            <input type="hidden" name="product_id" value="1">
                            <input type="hidden" name="product_name" value="Souviner (Ref Magnets)">
                            <input type="hidden" name="product_price" value="10.00">
                            <button type="submit" name="add_to_cart" class="add-to-cart">Add to Cart</button>
                        </form>
                        
                        <button class="buy-now">Buy Now</button>
                    </div>
                </div>
                
                <!-- Product Item 2 -->
                <div class="product-item">
                    <div class="product-box">
                        <img src="../assets/Invitation.jfif" alt="Posters" class="product-image" />
                        <h3>Invitation</h3>
                        <p>"Set the tone for your event with our beautifully designed custom invitations."</p>

                        <!-- Add to Cart Form -->
                        <form action="products.php" method="POST">
                            <input type="hidden" name="product_id" value="2">
                            <input type="hidden" name="product_name" value="Invitation">
                            <input type="hidden" name="product_price" value="5.00">
                            <button type="submit" name="add_to_cart" class="add-to-cart">Add to Cart</button>
                        </form>
                        
                        <button class="buy-now">Buy Now</button>
                    </div>
                </div>
                
                <!-- Product Item 3 -->
                <div class="product-item">
                    <div class="product-box">
                        <img src="../assets/Image.jfif" alt="Custom Gifts" class="product-image" />
                        <h3>Image Print</h3>
                        <p>"Turn your favorite memories into art with our high-quality image prints."</p>

                        <!-- Add to Cart Form -->
                        <form action="products.php" method="POST">
                            <input type="hidden" name="product_id" value="3">
                            <input type="hidden" name="product_name" value="Image Print">
                            <input type="hidden" name="product_price" value="15.00">
                            <button type="submit" name="add_to_cart" class="add-to-cart">Add to Cart</button>
                        </form>

                        <button class="buy-now">Buy Now</button>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Footprints Printing Services</p>
    </footer>

    <script src="app.js"></script>
</body>
</html>