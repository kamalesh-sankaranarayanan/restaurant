<?php
include 'db.php';
session_start();

// Fetch menu items
$result = $conn->query("SELECT item_id, item_name, cost FROM items");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #ffecd2 0%, #fcb69f 100%);
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
            padding: 30px 0 10px;
            font-size: 32px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        th, td {
            padding: 14px 20px;
            background: #fff;
            box-shadow: 0 3px 6px rgba(0,0,0,0.1);
            border: none;
            text-align: center;
        }

        th {
            background-color: #ff9800;
            color: white;
            font-size: 18px;
            border-radius: 8px 8px 0 0;
        }

        tr td:first-child {
            border-radius: 8px 0 0 8px;
        }

        tr td:last-child {
            border-radius: 0 8px 8px 0;
        }

        input[type="number"] {
            width: 60px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            text-align: center;
        }

        button {
            background-color: #4CAF50;
            border: none;
            padding: 10px 18px;
            color: white;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #388e3c;
        }

        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #555;
        }

    </style>
</head>
<body>

<h2>🍽️ Our Delicious Menu</h2>

<table>
    <tr>
        <th>Item ID</th>
        <th>Item Name</th>
        <th>Cost (₹)</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <form action="add_to_cart.php" method="POST">
                <td><?php echo htmlspecialchars($row['item_id']); ?></td>
                <td><?php echo htmlspecialchars($row['item_name']); ?></td>
                <td>₹<?php echo number_format($row['cost'], 2); ?></td>
                <td>
                    <input type="number" name="quantity" value="1" min="1" required>
                    <input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
                    <input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>">
                    <input type="hidden" name="item_price" value="<?php echo $row['cost']; ?>">
                </td>
                <td>
                    <button type="submit">Add to Cart 🛒</button>
                </td>
            </form>
        </tr>
    <?php endwhile; ?>
</table>

<div class="footer">
    &copy; <?php echo date("Y"); ?> Your Restaurant Name. All rights reserved.
</div>

</body>
</html>
