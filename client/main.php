<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footprints - Printing Services</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <div id="navbar">
            <div class="logo">
                <img src="../assets/logo.png" alt="Logo" style="max-width: 100px;">
            </div>
            <nav>
                <ul>
                    <li><a href="main.php"><b>Home</b></a></li>
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
                    <a href="../landing.php">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <main>
        <section id="hero">
            <div class="hero-content">
                <h2>Welcome to<br>Footprints Printing!</h2>
                <p>Explore our high-quality printing services for all your business and personal needs.</p>
                <a href="products.php" class="cta-button">Browse Products</a>
            </div>
        </section>

        <section id="services">
            <h2>Our Services</h2>
            <div class="services-container">
                <div class="service-item">
                    <h3>Custom Printing</h3>
                    <p>We offer a wide variety of custom printing options to fit your needs, from banners to business cards.</p>
                </div>
                <div class="service-item">
                    <h3>Custom Invitations</h3>
                    <p>Create the perfect wedding invitations with a personal touch. We offer a variety of designs and custom options.</p>
                </div>
                <div class="service-item">
                    <h3>Customize Layout</h3>
                    <p>Enhance your professional image with custom stationery, including letterheads, envelopes, and more.</p>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Footprints Printing Services</p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
