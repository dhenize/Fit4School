<?php
$servername = "localhost";
$username = "root";  // Default XAMPP user
$password = "";  // Default XAMPP password is empty
$dbname = "db_fit4school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>