<<?php 
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['item_id'])) {
    // Add item to cart
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];
    $item_price = $_POST['item_price'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = [
    'item_id' => $item_id,
    'quantity' => $quantity,
    'item_price' => $item_price
    ];


    // Fetch available tables
    $tables = [];
    $result = $conn->query("SELECT table_id FROM tables WHERE status = 1");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tables[] = $row['table_id'];
        }
    }
} elseif (isset($_POST['table_id'])) {
    // Table selected, save to session and redirect to cart
    $_SESSION['table_id'] = $_POST['table_id'];
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Table</title>
</head>
<body>
    <h2>Item Added to Cart</h2>

    <?php if (!empty($tables)): ?>
        <form action="add_to_cart.php" method="POST">
            <label for="table_id">Select a Table:</label><br><br>
            <select name="table_id" required>
                <?php foreach ($tables as $table_id): ?>
                    <option value="<?php echo $table_id; ?>">Table <?php echo $table_id; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <button type="submit">Continue to Cart</button>
        </form>
    <?php else: ?>
        <p>No tables available right now. Please try again later.</p>
    <?php endif; ?>
</body>
</html>
