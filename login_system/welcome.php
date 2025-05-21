<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>XYZ Restaurant</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      color: white;
      height: 100vh;
      background-image: url('background.jpg'); 
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    header {
      background-color: rgba(0, 0, 0, 0.6);
      padding: 20px 0;
      text-align: center;
    }

    header h1 {
      color: #fff;
      font-size: 2em;
    }

    nav {
      margin-top: 10px;
    }

    nav a {
      color: #ffd700;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
      font-size: 1em;
    }

    .welcome {
      display: flex;
      justify-content: center;
      align-items: center;
      height: calc(100vh - 120px); 
      text-align: center;
    }

    .welcome p {
      background-color: rgba(0, 0, 0, 0.5);
      padding: 30px;
      border-radius: 10px;
      font-size: 1.5em;
      max-width: 700px;
    }
  </style>
</head>
<body>

  <header>
    <h1>Welcome to XYZ Restaurant</h1>
    <nav>
      <a href="about.php">About Us</a>
      <a href="categories.php">Categories</a>
      <a href="contact.php">Contact Us</a>
      <a href="Gallery/gallery.php">Gallery</a>
    </nav>
  </header>

  <section class="welcome">
    <p>Discover the taste of tradition and celebration.</p>
  </section>

</body>
</html>