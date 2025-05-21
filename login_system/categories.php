<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Categories | XYZ Restaurant</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('backaground.jpg'); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      padding: 40px;
      color: #ffffff;
      min-height: 100vh;
    }

    h1 {
      color: #fff;
      text-align: center;
      background-color: rgba(106, 27, 154, 0.7); 
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 40px;
    }

    .category-box {
      margin: 30px auto;
      padding: 20px;
      border: 2px solid #fff;
      border-radius: 10px;
      max-width: 500px;
      text-align: center;
      background-color: rgba(255, 255, 255, 0.2); 
      backdrop-filter: blur(5px);
    }

    .category-box a {
      text-decoration: none;
      color: #fff;
      font-size: 1.3em;
      font-weight: bold;
    }

    .category-box a:hover {
      color: #ffd700;
    }
  </style>
</head>
<body>
  <h1>Our Food Categories</h1>

  <div class="category-box">
    <a href="classical.php">Classical Dishes</a>
  </div>

  <div class="category-box">
    <a href="party.php">Party Hall Dishes</a>
  </div>
</body>
</html>
