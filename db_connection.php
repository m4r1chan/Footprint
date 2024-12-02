<?php
// Database connection settings
$servername = "localhost";
$username = "root";        // Update with your database username
$password = "";     // Update with your database password
$dbname = "footprints";     // Your database name

// Create connection using the variables directly
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, assign the same connection to $link variable
$link = $conn;  // $link now refers to the same connection object


?>
