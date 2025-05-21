<?php
include 'db.php';
session_start();

$username = $_SESSION['username']; // from login
$table_id = $_POST['table_id'];
$total_amount = $_SESSION['cart_total']; // set during cart calculation

// Insert into Orders table
$order_stmt = $conn->prepare("INSERT INTO orders (username, table_id, order_date, total_amount) VALUES (?, ?, NOW(), ?)");
$order_stmt->bind_param("sid", $username, $table_id, $total_amount);
$order_stmt->execute();
$order_id = $conn->insert_id;

// Insert each cart item into order_details
foreach ($_SESSION['cart'] as $item_id => $item) {
    $quantity = $item['quantity'];
    $price = $item['price'];

    $detail_stmt = $conn->prepare("INSERT INTO order_details (order_id, item_id, quantity, item_price) VALUES (?, ?, ?, ?)");
    $detail_stmt->bind_param("iiid", $order_id, $item_id, $quantity, $price);
    $detail_stmt->execute();
}

// Mark the selected table as occupied
$update_stmt = $conn->prepare("UPDATE tables SET status = 'occupied' WHERE table_id = ?");
$update_stmt->bind_param("i", $table_id);
$update_stmt->execute();

echo "Order placed successfully! Table $table_id is now occupied.";
?>
