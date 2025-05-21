<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery | XYZ Restaurant</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #6a1b9a;
      --primary-light: #9c4dcc;
      --secondary: #ff8f00;
      --light: #fff8f0;
      --dark: #333;
      --gray: #777;
      --shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s ease;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
      background-color: var(--light);
      color: var(--dark);
      line-height: 1.6;
    }

    header {
      background: linear-gradient(135deg, var(--primary), var(--primary-light));
      color: white;
      text-align: center;
      padding: 2rem 1rem;
      position: relative;
      overflow: hidden;
    }

    header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiPjxkZWZzPjxwYXR0ZXJuIGlkPSJwYXR0ZXJuIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiIHBhdHRlcm5Vbml0cz0idXNlclNwYWNlT25Vc2UiIHBhdHRlcm5UcmFuc2Zvcm09InJvdGF0ZSg0NSkiPjxyZWN0IHdpZHRoPSIyMCIgaGVpZ2h0PSIyMCIgZmlsbD0icmdiYSgyNTUsMjU1LDI1NSwwLjA1KSIvPjwvcGF0dGVybj48L2RlZnM+PHJlY3Qgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNwYXR0ZXJuKSIvPjwvc3ZnPg==');
      opacity: 0.5;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
      position: relative;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .subtitle {
      font-weight: 300;
      opacity: 0.9;
      max-width: 600px;
      margin: 0 auto;
    }

    .gallery-container {
      padding: 2rem 1rem;
      max-width: 1400px;
      margin: 0 auto;
    }

    .filter-controls {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-bottom: 2rem;
    }

    .filter-btn {
      padding: 0.5rem 1.2rem;
      background: white;
      border: 1px solid #ddd;
      border-radius: 50px;
      cursor: pointer;
      transition: var(--transition);
      font-weight: 500;
    }

    .filter-btn:hover, .filter-btn.active {
      background: var(--primary);
      color: white;
      border-color: var(--primary);
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 1.5rem;
    }

    .gallery-item {
      position: relative;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: var(--shadow);
      transition: var(--transition);
      aspect-ratio: 4/3;
    }

    .gallery-item:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }

    .gallery-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
      transition: var(--transition);
    }

    .gallery-item:hover .gallery-img {
      transform: scale(1.05);
    }

    .gallery-caption {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(to top, rgba(0, 0, 0, 0.8), transparent);
      color: white;
      padding: 1.5rem 1rem 1rem;
      opacity: 0;
      transition: var(--transition);
    }

    .gallery-item:hover .gallery-caption {
      opacity: 1;
    }

    .gallery-caption h3 {
      margin-bottom: 0.3rem;
      font-size: 1.1rem;
    }

    .gallery-caption p {
      font-size: 0.9rem;
      opacity: 0.9;
    }

    /* Lightbox */
    .lightbox {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.9);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
      opacity: 0;
      pointer-events: none;
      transition: var(--transition);
    }

    .lightbox.active {
      opacity: 1;
      pointer-events: all;
    }

    .lightbox-content {
      position: relative;
      max-width: 90%;
      max-height: 90vh;
    }

    .lightbox-img {
      max-width: 100%;
      max-height: 80vh;
      border-radius: 8px;
      box-shadow: 0 5px 25px rgba(0, 0, 0, 0.5);
    }

    .lightbox-caption {
      color: white;
      text-align: center;
      margin-top: 1rem;
    }

    .close-btn {
      position: absolute;
      top: -40px;
      right: 0;
      color: white;
      font-size: 2rem;
      cursor: pointer;
      transition: var(--transition);
    }

    .close-btn:hover {
      color: var(--secondary);
    }

    .nav-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      color: white;
      font-size: 2rem;
      cursor: pointer;
      background: rgba(0, 0, 0, 0.5);
      width: 50px;
      height: 50px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: var(--transition);
    }

    .nav-btn:hover {
      background: var(--primary);
    }

    .prev-btn {
      left: 20px;
    }

    .next-btn {
      right: 20px;
    }


    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .gallery-item {
      animation: fadeIn 0.5s ease forwards;
      opacity: 0;
    }

    .gallery-item:nth-child(1) { animation-delay: 0.1s; }
    .gallery-item:nth-child(2) { animation-delay: 0.2s; }
    .gallery-item:nth-child(3) { animation-delay: 0.3s; }
    .gallery-item:nth-child(4) { animation-delay: 0.4s; }
    .gallery-item:nth-child(5) { animation-delay: 0.5s; }
    .gallery-item:nth-child(6) { animation-delay: 0.6s; }

   
    @media (max-width: 768px) {
      .gallery {
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
      }
      
      h1 {
        font-size: 2rem;
      }
    }

    @media (max-width: 480px) {
      .gallery {
        grid-template-columns: 1fr;
      }
      
      .filter-btn {
        padding: 0.4rem 0.8rem;
        font-size: 0.9rem;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>Our Gallery</h1>
    <p class="subtitle">Experience the vibrant flavors and ambiance of XYZ Restaurant through our visual journey</p>
  </header>

  <div class="gallery-container">
    <div class="filter-controls">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="food">Food</button>
      <button class="filter-btn" data-filter="ambiance">Ambiance</button>
      <button class="filter-btn" data-filter="events">Events</button>
    </div>

    <div class="gallery">
      <div class="gallery-item" data-category="food">
        <img src="img1.jpeg" alt="Spicy South Indian Dosa" class="gallery-img">
        <div class="gallery-caption">
          <h3>Spicy South Indian Dosa</h3>
          <p>Served with authentic chutney and sambar</p>
        </div>
      </div>

      <div class="gallery-item" data-category="food">
        <img src="img2.jpeg" alt="North Indian Thali" class="gallery-img">
        <div class="gallery-caption">
          <h3>North Indian Thali</h3>
          <p>Complete meal with variety of flavors</p>
        </div>
      </div>

      <div class="gallery-item" data-category="events">
        <img src="img3.jpg" alt="Party Hall" class="gallery-img">
        <div class="gallery-caption">
          <h3>Elegant Party Hall</h3>
          <p>Perfect setup for your special occasions</p>
        </div>
      </div>

      <div class="gallery-item" data-category="ambiance">
        <img src="img4.jpeg" alt="Dining Area" class="gallery-img">
        <div class="gallery-caption">
          <h3>Cozy Dining Area</h3>
          <p>Comfortable setting for family gatherings</p>
        </div>
      </div>

      <div class="gallery-item" data-category="food">
        <img src="img5.jpeg" alt="Desserts" class="gallery-img">
        <div class="gallery-caption">
          <h3>Delicious Desserts</h3>
          <p>From traditional sweets to modern pastries</p>
        </div>
      </div>

      <div class="gallery-item" data-category="events">
        <img src="img6.jpeg" alt="Buffet Setup" class="gallery-img">
        <div class="gallery-caption">
          <h3>Grand Buffet</h3>
          <p>Live counters with chef specialties</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Lightbox -->
  <div class="lightbox" id="lightbox">
    <button class="close-btn">&times;</button>
    <button class="nav-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
    <button class="nav-btn next-btn"><i class="fas fa-chevron-right"></i></button>
    <div class="lightbox-content">
      <img src="" alt="" class="lightbox-img">
      <div class="lightbox-caption"></div>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
     
      const filterBtns = document.querySelectorAll('.filter-btn');
      const galleryItems = document.querySelectorAll('.gallery-item');
      
      filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
         
          filterBtns.forEach(b => b.classList.remove('active'));
          btn.classList.add('active');
          
          const filter = btn.dataset.filter;
          
       
          galleryItems.forEach(item => {
            if (filter === 'all' || item.dataset.category === filter) {
              item.style.display = 'block';
            } else {
              item.style.display = 'none';
            }
          });
        });
      });

     
      const lightbox = document.getElementById('lightbox');
      const lightboxImg = document.querySelector('.lightbox-img');
      const lightboxCaption = document.querySelector('.lightbox-caption');
      const closeBtn = document.querySelector('.close-btn');
      const prevBtn = document.querySelector('.prev-btn');
      const nextBtn = document.querySelector('.next-btn');
      
      const galleryImages = Array.from(document.querySelectorAll('.gallery-img'));
      let currentIndex = 0;
      
      galleryImages.forEach((img, index) => {
        img.addEventListener('click', () => {
          currentIndex = index;
          updateLightbox();
          lightbox.classList.add('active');
          document.body.style.overflow = 'hidden';
        });
      });
   
      closeBtn.addEventListener('click', () => {
        lightbox.classList.remove('active');
        document.body.style.overflow = 'auto';
      });
      
   
      lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) {
          lightbox.classList.remove('active');
          document.body.style.overflow = 'auto';
        }
      });
      
      
      prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
        updateLightbox();
      });
      
      nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex + 1) % galleryImages.length;
        updateLightbox();
      });
      
      
      document.addEventListener('keydown', (e) => {
        if (!lightbox.classList.contains('active')) return;
        
        if (e.key === 'Escape') {
          lightbox.classList.remove('active');
          document.body.style.overflow = 'auto';
        } else if (e.key === 'ArrowLeft') {
          currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
          updateLightbox();
        } else if (e.key === 'ArrowRight') {
          currentIndex = (currentIndex + 1) % galleryImages.length;
          updateLightbox();
        }
      });
      
      function updateLightbox() {
        const currentImg = galleryImages[currentIndex];
        lightboxImg.src = currentImg.src;
        lightboxImg.alt = currentImg.alt;
        const caption = currentImg.parentElement.querySelector('.gallery-caption');
        if (caption) {
          lightboxCaption.innerHTML = `<h3>${caption.querySelector('h3').textContent}</h3><p>${caption.querySelector('p').textContent}</p>`;
        } else {
          lightboxCaption.textContent = currentImg.alt;
        }
      }
    });
  </script>

</body>
</html>