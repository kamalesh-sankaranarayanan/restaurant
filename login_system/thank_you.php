<!DOCTYPE html>
<html>
<head>
    <title>Order Successful</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: url('https://images.unsplash.com/photo-1543353071-873f17a7a088?auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }

        .card {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
            max-width: 500px;
            text-align: center;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color:  #28a745;
        }

        p {
            font-size: 1.2em;
            color: #e0f8e0;
        }

        .btn {
            margin-top: 30px;
            padding: 10px 25px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Thank You!</h1>
        <p>Your order has been successfully placed.</p>
        <a href="index.php" class="btn">Return Home</a>
    </div>
</body>
</html>
