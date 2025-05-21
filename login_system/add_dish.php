<?php
session_start();
include 'db.php';

// Restrict access to employees
if (!isset($_SESSION['usertype']) || $_SESSION['usertype'] !== 'employee') {
    die("Access denied. Only employees can add or update items.");
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $item_id = $_POST['item_id'] ?? '';
    $item_name = trim($_POST['item_name'] ?? '');
    $price = $_POST['price'] ?? '';

    if (empty($item_id) || empty($item_name) || !is_numeric($price) || $price <= 0) {
        $message = "<p style='color: red;'>Please provide a valid item ID, item name, and a positive numeric price.</p>";
    } else {
        // Check if item exists by item_id
        $stmt = $conn->prepare("SELECT item_id FROM items WHERE item_id = ?");
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Item exists – update
            $stmt->close();
            $update = $conn->prepare("UPDATE items SET item_name = ?, cost = ? WHERE item_id = ?");
            $update->bind_param("sdi", $item_name, $price, $item_id);
            if ($update->execute()) {
                $message = "<p style='color: green;'>Item updated successfully.</p>";
            } else {
                $message = "<p style='color: red;'>Error updating item: " . htmlspecialchars($update->error) . "</p>";
            }
            $update->close();
        } else {
            // Insert new item
            $stmt->close();
            $insert = $conn->prepare("INSERT INTO items (item_id, item_name, cost) VALUES (?, ?, ?)");
            $insert->bind_param("isd", $item_id, $item_name, $price);
            if ($insert->execute()) {
                $message = "<p style='color: green;'>New item added successfully.</p>";
            } else {
                $message = "<p style='color: red;'>Error inserting item: " . htmlspecialchars($insert->error) . "</p>";
            }
            $insert->close();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add or Update Item</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f6f6;
            padding: 40px;
        }
        form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, label {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <form method="post" action="">
        <h2>Add or Update Item</h2>

        <label>Item ID:</label>
        <input type="number" name="item_id" required>

        <label>Item Name:</label>
        <input type="text" name="item_name" required>

        <label>Price (₹):</label>
        <input type="number" name="price" step="0.01" min="1" required>

        <input type="submit" value="Submit">
    </form>

    <div class="message">
        <?= $message ?>
    </div>
</body>
</html>
