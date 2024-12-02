<?php
session_start();

// Hardcoded admin credentials
$adminEmail = "admin@footprints.com";
$adminPassword = "admin123";

// Include database connection
include('db_connection.php');

// Initialize error message
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Check for admin login
    if ($email === $adminEmail && $password === $adminPassword) {
        $_SESSION['role'] = 'admin';
        header('Location: admin/adminuser.php');
        exit();
    }

    // Check for user login in database
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $row['password'])) 
        {
            $_SESSION['role'] = 'client';
            $_SESSION['user_id'] = $row['id']; // Optional: store user ID for further use
            header('Location: client/main.php');
            exit();
        }
            else {
                $error = "Invalid email or password.";
                }
        } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body style="background-image: url(assets/download.gif);">

    <header>
        <div class="logo">
            <img src="assets/logo.png" alt="Logo" style="max-width: 100px;">
        </div>
    </header>

    <h3>Login</h3>
    <div class="loginForm">
        <!-- Display error message if exists -->
        <?php if (!empty($error)): ?>
            <p style="color: red;"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <form id="login" method="POST" action="">
            <label for="email">EMAIL</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">PASSWORD</label>
            <input type="password" id="password" name="password" required>
            
            <button type="submit" id="loginButton">Login</button>
        </form>
    </div>

    <h4><a href="forgotPassword.php">Forgot Password?</a></h4>
    <h4><a href="createAcc.php">Create New Account</a></h4>

    <footer>
        <p>&copy; 2024 Footprints Printing Services</p>
    </footer>

    <script src="script.js"></script>

</body>
</html>