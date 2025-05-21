<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Classical Dishes | XYZ Restaurant</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f5fa;
      margin: 0;
      padding: 0;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #6a1b9a;
      color: #fff;
      padding: 10px 20px;
    }
    .header h1 {
      margin: 0;
      font-size: 1.5rem;
    }
    .cart {
      cursor: pointer;
      position: relative;
    }
    .cart-count {
      position: absolute;
      top: -5px;
      right: -10px;
      background: #ff5252;
      color: #fff;
      border-radius: 50%;
      padding: 2px 6px;
      font-size: 0.8rem;
    }
    .checkout-btn {
      background: #ffb300;
      color: #000;
      border: none;
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
      margin-left: 10px;
      display: none;
      transition: background 0.3s;
    }
    .checkout-btn:hover {
      background: #ffa000;
    }
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }
    h2 {
      color: #4a148c;
      text-align: center;
      margin: 20px 0;
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
      display: flex;
      flex-direction: column;
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
    .dish-info {
      padding: 15px;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .dish-name {
      font-size: 1.3rem;
      color: #4a148c;
      font-weight: 600;
      margin-bottom: 10px;
      text-align: center;
    }
    .dish-price {
      font-size: 1.1rem;
      color: #333;
      margin-bottom: 15px;
      text-align: center;
    }
    .add-btn {
      background: #6a1b9a;
      color: #fff;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
      width: 100%;
    }
    .add-btn:hover {
      background: #4a148c;
    }
    /* Cart Modal Styles */
    #cart-modal {
      display: none;
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      background: rgba(0,0,0,0.6);
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }
    #cart-modal.active {
      display: flex;
    }
    .cart-content {
      background: white;
      border-radius: 10px;
      width: 90%;
      max-width: 400px;
      max-height: 80vh;
      overflow-y: auto;
      padding: 20px;
      box-shadow: 0 8px 16px rgba(0,0,0,0.3);
      display: flex;
      flex-direction: column;
    }
    .cart-header {
      font-size: 1.5rem;
      font-weight: 700;
      color: #4a148c;
      margin-bottom: 15px;
      text-align: center;
    }
    .cart-items {
      flex-grow: 1;
      margin-bottom: 15px;
    }
    .cart-item {
      display: flex;
      justify-content: space-between;
      padding: 8px 0;
      border-bottom: 1px solid #ddd;
    }
    .cart-item-name {
      font-weight: 600;
      color: #333;
    }
    .cart-item-price {
      color: #666;
      margin-left: 10px;
    }
    .remove-btn {
      background: #ff5252;
      border: none;
      color: white;
      padding: 4px 8px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 0.8rem;
    }
    .cart-footer {
      font-weight: 700;
      font-size: 1.2rem;
      text-align: right;
      margin-bottom: 15px;
      color: #4a148c;
    }
    .close-btn {
      background: #6a1b9a;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      cursor: pointer;
      transition: background 0.3s;
      width: 100%;
    }
    .close-btn:hover {
      background: #4a148c;
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>Classical Dishes</h1>
    <div>
      <button class="checkout-btn" id="checkout-btn" onclick="proceedToPayment()">Proceed to Payment</button>
      <span class="cart" onclick="toggleCart()">🛒<span class="cart-count" id="cart-count">0</span></span>
    </div>
  </div>

  <div class="container">
    <h2>Our Menu</h2>
    <div class="dishes-grid">
      <div class="dish-card" data-name="Idli" data-price="50">
        <div class="dish-image"><img src="idli.jpeg" alt="Idli" onerror="this.src='placeholder.jpg'"></div>
        <div class="dish-info">
          <div>
            <div class="dish-name">Idli</div>
            <div class="dish-price">₹50</div>
          </div>
          <button class="add-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
      </div>
      <div class="dish-card" data-name="Dosa" data-price="80">
        <div class="dish-image"><img src="dosa.jpeg" alt="Dosa" onerror="this.src='placeholder.jpg'"></div>
        <div class="dish-info">
          <div>
            <div class="dish-name">Dosa</div>
            <div class="dish-price">₹80</div>
          </div>
          <button class="add-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
      </div>
      <div class="dish-card" data-name="Pongal" data-price="70">
        <div class="dish-image"><img src="pongal.jpeg" alt="Pongal" onerror="this.src='placeholder.jpg'"></div>
        <div class="dish-info">
          <div>
            <div class="dish-name">Pongal</div>
            <div class="dish-price">₹70</div>
          </div>
          <button class="add-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
      </div>
      <div class="dish-card" data-name="Chapathi" data-price="60">
        <div class="dish-image"><img src="chapathi.jpeg" alt="Chapathi" onerror="this.src='placeholder.jpg'"></div>
        <div class="dish-info">
          <div>
            <div class="dish-name">Chapathi</div>
            <div class="dish-price">₹60</div>
          </div>
          <button class="add-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
      </div>
      <div class="dish-card" data-name="Poori" data-price="65">
        <div class="dish-image"><img src="poori.jpeg" alt="Poori" onerror="this.src='placeholder.jpg'"></div>
        <div class="dish-info">
          <div>
            <div class="dish-name">Poori</div>
            <div class="dish-price">₹65</div>
          </div>
          <button class="add-btn" onclick="addToCart(this)">Add to Cart</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Cart Modal -->
  <div id="cart-modal">
    <div class="cart-content">
      <div class="cart-header">Your Cart</div>
      <div class="cart-items" id="cart-items"></div>
      <div class="cart-footer" id="cart-total"></div>
      <button class="close-btn" onclick="toggleCart()">Close</button>
    </div>
  </div>

  <script>
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartCountEl = document.getElementById('cart-count');
    const checkoutBtn = document.getElementById('checkout-btn');
    const cartModal = document.getElementById('cart-modal');
    const cartItemsEl = document.getElementById('cart-items');
    const cartTotalEl = document.getElementById('cart-total');

  
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('paid') === 'true') {
      cart = [];
      localStorage.removeItem('cart');
    }

    function updateCartUI() {
      cartCountEl.textContent = cart.length;
      checkoutBtn.style.display = cart.length > 0 ? 'inline-block' : 'none';
      localStorage.setItem('cart', JSON.stringify(cart));
    }

    function addToCart(btn) {
      const card = btn.closest('.dish-card');
      cart.push({ name: card.dataset.name, price: +card.dataset.price });
      updateCartUI();
    }

    function toggleCart() {
      if (cartModal.classList.contains('active')) {
        cartModal.classList.remove('active');
      } else {
        renderCart();
        cartModal.classList.add('active');
      }
    }

    function renderCart() {
      if (cart.length === 0) {
        cartItemsEl.innerHTML = '<p>Your cart is empty.</p>';
        cartTotalEl.textContent = '';
        checkoutBtn.style.display = 'none';
        return;
      }
      let total = 0;
      cartItemsEl.innerHTML = '';
      cart.forEach((item, index) => {
        total += item.price;
        const itemDiv = document.createElement('div');
        itemDiv.className = 'cart-item';
        itemDiv.innerHTML = `
          <span class="cart-item-name">${item.name}</span>
          <span class="cart-item-price">₹${item.price}</span>
          <button class="remove-btn" onclick="removeFromCart(${index})">Remove</button>
        `;
        cartItemsEl.appendChild(itemDiv);
      });
      cartTotalEl.textContent = `Total: ₹${total}`;
      checkoutBtn.style.display = 'inline-block';
    }

    function removeFromCart(index) {
      cart.splice(index, 1);
      updateCartUI();
      renderCart();
    }

    function proceedToPayment() {
      if (cart.length === 0) {
        alert('Your cart is empty.');
        return;
      }
      localStorage.setItem('cartForPayment', JSON.stringify(cart));
      
     
      window.location.href = 'payment_success.php';
    }

    updateCartUI();
  </script>
</body>
</html>
