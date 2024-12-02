<?php
session_start();

// Include database connection
include('../db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login if the user is not logged in
    header('Location: ../login.php');
    exit();
}

// Fetch user ID from the session
$user_id = $_SESSION['user_id'];

// Initialize variables to store user details
$username = "";
$email = "";
$phone = "";
$address = "";

// Query to fetch user details from the database
$query = "SELECT username, email, phoneNumber, address FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Fetch the user details
    $row = $result->fetch_assoc();
    $username = $row['username'];
    $email = $row['email'];
    $phone = $row['phoneNumber'];
    $address = $row['address'];
} else {
    // If user not found, destroy session and redirect to login
    session_destroy();
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account - Footprints</title>
    <link rel="stylesheet" href="account.css">
</head>
<body>
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
        <section id="my-account">
            <!-- Account Container Box -->
            <div class="account-box">
                <h2>Welcome, <span id="username"><?php echo htmlspecialchars($username); ?></span>!</h2>
                
                <!-- Personal Details Box -->
                <div class="personal-details-box">
                    <h3>Your Personal Details</h3>
                    <p><strong>Email:</strong> <span id="userEmail"><?php echo htmlspecialchars($email); ?></span></p>
                    <p><strong>Phone:</strong> <span id="phoneNumber"><?php echo htmlspecialchars($phone); ?></span></p>
                    <p><strong>Address:</strong> <span id="userAddress"><?php echo htmlspecialchars($address); ?></span></p>
                </div>
            </div>

            <div class="orders">
                <h3>Your Orders</h3>
                <div id="ordersList-box">
                    <!-- Orders will be displayed here -->
                    <p>No orders yet.</p>
                </div>
            </div>
        
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Footprints Printing Services</p>
    </footer>

    <script src="my-account.js"></script>
</body>
</html>
