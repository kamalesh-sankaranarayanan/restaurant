<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $table_id = $_POST['table_id'];
    $_SESSION['table_id'] = $table_id;
    header("Location: cart.php");
    exit();
}
?>
