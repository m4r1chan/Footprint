<?php
// Start a session
session_start();

// Include the database configuration file
require_once "../db_connection.php";

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

// Fetch all users (explicitly selecting columns)
$sql = "SELECT id, username, phoneNumber, address, email FROM users";
$result = mysqli_query($link, $sql);

// Check for errors in the query execution
if (!$result) {
    die('Error executing query: ' . mysqli_error($link));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <header>
        <div id="navbar">
            <div class="logo">
                <img src="../assets/logo.png" alt="Logo" style="max-width: 100px;">
            </div>
            <nav>
                <ul>
                    <li><a href="../client/main.php"><b>Home</b></a></li>
                    <li><a href="../client/products.php">Products</a></li>
                    <li><a href="../client/aboutus.php">Messages</a></li>
                </ul>
            </nav>
            <div class="profile-icon">
                <img src="../assets/samplepfp.jfif" alt="Profile" class="profile-img" id="profileIcon">
                <div class="dropdown" id="profileDropdown">
                    <a href="../my-account.php">My Account</a>
                    <a href="../landing.php">Logout</a>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Admin User Dashboard</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . (isset($row['username']) ? htmlspecialchars($row['username']) : 'N/A') . "</td>";
                        echo "<td>" . (isset($row['phoneNumber']) ? htmlspecialchars($row['phoneNumber']) : 'N/A') . "</td>";
                        echo "<td>" . (isset($row['address']) ? htmlspecialchars($row['address']) : 'N/A') . "</td>";
                        echo "<td>" . (isset($row['email']) ? htmlspecialchars($row['email']) : 'N/A') . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No users found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
