<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "customers"; // use your actual database name

$conn = new mysqli($servername, $username, $password, $database,7894);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
