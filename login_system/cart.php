<?php
session_start();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$username = $_SESSION['username'] ?? '';
$table_id = $_SESSION['table_id'] ?? '';
$total = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff8f0;
            padding: 20px;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 20px;
            border-bottom: 1px solid #ccc;
            text-align: center;
        }

        th {
            background-color: #ffcc66;
        }

        .btn {
            display: block;
            margin: 30px auto;
            padding: 10px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #218838;
        }

        .empty {
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>
<body>

<h2>Your Cart</h2>

<?php if (count($cart) === 0): ?>
    <p class="empty">Your cart is empty.</p>
<?php else: ?>
    <form action="thank_you.php" method="POST">
        <table>
            <tr>
                <th>Item ID</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['item_id']); ?></td>
                    <td><?php echo (int)$item['quantity']; ?></td>
                    <td>₹<?php echo number_format($item['item_price'], 2); ?></td>
                </tr>
                <input type="hidden" name="item_id[]" value="<?php echo htmlspecialchars($item['item_id']); ?>">
                <input type="hidden" name="quantity[]" value="<?php echo (int)$item['quantity']; ?>">
                <input type="hidden" name="item_price[]" value="<?php echo $item['item_price']; ?>">
                <?php $total += $item['item_price'] * $item['quantity']; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="2"><strong>Total</strong></td>
                <td><strong>₹<?php echo number_format($total, 2); ?></strong></td>
            </tr>
        </table>

        <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <input type="hidden" name="table_id" value="<?php echo htmlspecialchars($table_id); ?>">
        <input type="hidden" name="total_amount" value="<?php echo $total; ?>">

        <button class="btn" type="submit">Confirm Order</button>
    </form>
<?php endif; ?>

</body>
</html>

