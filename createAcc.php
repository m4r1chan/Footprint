<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=League+Gothic&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cherry+Bomb+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bubblegum+Sans&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="createAcc.css">
</head>
<body style="background-image: url(assets/download.gif);">
    <!-- Header -->
    <header class="py-3 bg-light">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="assets/logo.png" alt="Logo" style="max-width: 80px;">
            </div>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="landing.php" class="nav-link text-dark" style="font-family: 'Bebas Neue', sans-serif;">BACK</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container my-5">
        <!-- Title -->
        <div class="text-center">
            <h1 class="mb-4" style="font-family: 'Cherry Bomb One', cursive;">CREATE NEW ACCOUNT</h1>
        </div>

        <!-- Form -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <form action="createAcc.php" method="POST" class="p-4 border rounded bg-white shadow">
                    <div class="mb-3">
                        <label for="username" class="form-label" style="font-family: 'League Gothic', serif;">USERNAME</label>
                        <input type="text" id="username" name="username" class="form-control" placeholder="Enter your username" required>
                    </div>

                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label" style="font-family: 'League Gothic', serif;">PHONE NUMBER</label>
                        <input type="tel" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Enter your phone number" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label" style="font-family: 'League Gothic', serif;">ADDRESS</label>
                        <input type="text" id="address" name="address" class="form-control" placeholder="Enter your address" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label" style="font-family: 'League Gothic', serif;">EMAIL</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label" style="font-family: 'League Gothic', serif;">PASSWORD</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>

                    <div class="mb-3">
                        <label for="confirm-password" class="form-label" style="font-family: 'League Gothic', serif;">CONFIRM PASSWORD</label>
                        <input type="password" id="confirm-password" name="confirm-password" class="form-control" placeholder="Confirm your password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100" style="font-family: 'Cherry Bomb One', cursive;">Sign Up</button>

                    <div class="text-center mt-3">
                        <h3 style="font-family: 'League Gothic', serif;">
                            Already Registered? 
                            <a href="login.php" class="text-primary">Login</a>
                        </h3>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3">
        <p style="font-family: 'Bubblegum Sans', sans-serif;">&copy; 2024 Footprints Printing Services</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
include('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // Ensure passwords match
    if ($password !== $confirmPassword) {
        echo '<div class="message error-message">Passwords do not match!</div>';
        exit();
    }

    // Prevent using reserved usernames
    if ($username === "admin") {
        echo '<div class="message error-message">This username is reserved. Please choose another.</div>';
        exit();
    }

    // Check if username exists
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<div class="message error-message">Username already exists. Please choose another.</div>';
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $insertQuery = "INSERT INTO users (username, email, phoneNumber, address, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sssss", $username, $email, $phoneNumber, $address, $hashedPassword);
        if ($stmt->execute()) {
            echo '<div class="message success-message">Account created successfully!</div>';
        } else {
            echo '<div class="message error-message">Error creating account. Please try again.</div>';
        }
    }
}
?>