<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Footprints</title>
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
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="contact.php"><b>Contact</b></a></li>
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
        <section id="contact">
            <div class="contact-container">
                <h2>Contact Us</h2>
                <h4>We'd love to hear from you! Whether you have a question, feedback, or need support, feel free to reach out to us.</h4>

                <div class="contact-details">
                    <p><strong>Email:</strong> footprintsetc4@gmail.com</p>
                    <p><strong>Phone:</strong> 0956 476 9478</p>
                    <p><strong>Visit Us:</strong> Brgy. San Lorenzo San Pablo City, Laguna</p>
                </div>

                <div class="contact-form">
                    <h3>Send Us a Message</h3>
                    <form action="#" method="POST">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required />

                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required />

                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" placeholder="Write your message here..." required></textarea>

                        <button type="submit">Send Message</button>
                    </form>
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
