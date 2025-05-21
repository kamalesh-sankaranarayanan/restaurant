<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Party Hall Dishes | XYZ Restaurant</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f5fa;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    
    h1 {
      color: #6a1b9a;
      text-align: center;
      margin: 30px 0;
    }
    
    .dishes-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
      gap: 25px;
      padding: 20px;
    }
    
    .dish-card {
      background: white;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }
    
    .dish-card:hover {
      transform: translateY(-5px);
    }
    
    .dish-image {
      height: 200px;
      overflow: hidden;
    }
    
    .dish-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }
    
    .dish-card:hover .dish-image img {
      transform: scale(1.05);
    }
    
    .dish-name {
      padding: 15px;
      text-align: center;
      font-size: 1.3rem;
      color: #4a148c;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Party Hall Dishes</h1>
    
    <div class="dishes-grid">
      <div class="dish-card">
        <div class="dish-image">
          <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836" alt="Buffet Meals">
        </div>
        <div class="dish-name">Buffet Meals</div>
      </div>
      
      <div class="dish-card">
        <div class="dish-image">
          <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b" alt="Starters">
        </div>
        <div class="dish-name">Starters</div>
      </div>
      
      <div class="dish-card">
        <div class="dish-image">
          <img src="mocktails.jpeg" alt="Mocktails">
        </div>
        <div class="dish-name">Mocktails</div>
      </div>
      
      <div class="dish-card">
        <div class="dish-image">
          <img src="dessert counter.jpeg" alt="Live Dessert Counter">
        </div>
        <div class="dish-name">Live Dessert Counter</div>
      </div>
      
      <div class="dish-card">
        <div class="dish-image">
          <img src="cakes.jpg" alt="Custom Cakes">
        </div>
        <div class="dish-name">Custom Cakes</div>
      </div>
    </div>
  </div>
</body>
</html>