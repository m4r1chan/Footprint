<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Foot Prints</title>
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
                    <li><a href="products.php">Products</a></li>
                    <li><a href="aboutus.php"><b>About Us</b></a></li>
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

    <section id="about">
        <h2>ABOUT US</h2>
        <div class="about-content">
            <div class="about-text-box">
                <p>Welcome to <strong>Footprints Printing Services</strong>! We specialize in providing high-quality, affordable printing solutions for businesses and individuals alike. Whether you're looking for custom business cards, posters, banners, or personalized gifts, our team is dedicated to delivering exceptional prints that make a lasting impression.</p>
    
                <p>What sets us apart is our commitment to quality, attention to detail, and customer satisfaction. We use state-of-the-art technology and eco-friendly materials to create vibrant, durable prints that meet your unique needs. No job is too big or small – we handle every project with the same level of care and professionalism.</p>
    
                <p>We believe in building lasting relationships with our clients, and we strive to exceed your expectations every time. From concept to completion, we are here to bring your ideas to life with the perfect print!</p>
            </div>
        </div>
    </section>

    <section id="mission">
        <h2>MISSION</h2>
        <div class="mission-content">
            <div class="mission-text-box">
                <p>
                    To deliver high-quality, personalized printing solutions that capture memories, celebrate milestones, and bring creative ideas to life. We are committed to providing exceptional service, innovative designs, and sustainable practices to ensure customer satisfaction in every print.
                </p>
            </div>
        </div>
    </section>

    <section id="vision">
        <h2>VISION</h2>
        <div class="vision-content">
            <div class="vision-text-box">
                <p>
                    To be the leading provider of innovative and eco-friendly printing solutions in our community, inspiring creativity and making every moment unforgettable through our customized products and excellent service.
                </p>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
    
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Footprints Printing Services</p>
    </footer>
</body>
</html>
