<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us | XYZ Restaurant</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #6a1b9a;
      --primary-light: #9c4dcc;
      --primary-dark: #4a0f6d;
      --secondary: #ff8f00;
      --light: #f4f4f4;
      --dark: #333;
      --gray: #777;
      --light-gray: #e0e0e0;
      --white: #ffffff;
      --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
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
      color: var(--white);
      text-align: center;
      padding: 2.5rem 1rem;
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
      opacity: 0.3;
    }

    h1 {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
      position: relative;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 2rem;
      background-color: var(--white);
      border-radius: 12px;
      box-shadow: var(--shadow);
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
    }

    section {
      margin-bottom: 2rem;
    }

    h2 {
      color: var(--primary);
      margin-bottom: 1.5rem;
      position: relative;
      padding-bottom: 0.5rem;
    }

    h2::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      width: 60px;
      height: 3px;
      background: var(--secondary);
    }

    .contact-info {
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    .info-card {
      display: flex;
      align-items: flex-start;
      gap: 1rem;
      padding: 1.5rem;
      background-color: var(--light);
      border-radius: 8px;
      transition: var(--transition);
    }

    .info-card:hover {
      transform: translateY(-5px);
      box-shadow: var(--shadow);
    }

    .info-icon {
      font-size: 1.5rem;
      color: var(--primary);
      min-width: 40px;
      text-align: center;
      padding-top: 0.3rem;
    }

    .info-content h3 {
      margin-bottom: 0.5rem;
      color: var(--primary-dark);
    }

    .info-content p {
      color: var(--gray);
    }

    .contact-form {
      grid-column: span 2;
    }

    .form-group {
      margin-bottom: 1.5rem;
      position: relative;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.5rem;
      font-weight: 500;
      color: var(--dark);
    }

    .form-control {
      width: 100%;
      padding: 1rem;
      border: 1px solid var(--light-gray);
      border-radius: 8px;
      font-family: inherit;
      font-size: 1rem;
      transition: var(--transition);
    }

    .form-control:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(106, 27, 154, 0.1);
    }

    textarea.form-control {
      min-height: 150px;
      resize: vertical;
    }

    .btn {
      display: inline-block;
      padding: 1rem 2rem;
      background-color: var(--primary);
      color: var(--white);
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      text-align: center;
    }

    .btn:hover {
      background-color: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn i {
      margin-left: 0.5rem;
    }

    .map-container {
      grid-column: span 2;
      position: relative;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: var(--shadow);
    }

    iframe {
      width: 100%;
      height: 400px;
      border: none;
      display: block;
    }

    .map-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to bottom, rgba(0,0,0,0.1), transparent 20%);
      pointer-events: none;
    }

    .social-links {
      display: flex;
      gap: 1rem;
      margin-top: 1rem;
    }

    .social-link {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 40px;
      height: 40px;
      background-color: var(--primary);
      color: var(--white);
      border-radius: 50%;
      transition: var(--transition);
    }

    .social-link:hover {
      background-color: var(--primary-dark);
      transform: translateY(-3px);
    }

    footer {
      text-align: center;
      padding: 2rem;
      background-color: var(--dark);
      color: var(--white);
    }

    .footer-content {
      max-width: 800px;
      margin: 0 auto;
    }

    .footer-links {
      display: flex;
      justify-content: center;
      gap: 1.5rem;
      margin: 1rem 0;
    }

    .footer-link {
      color: var(--white);
      text-decoration: none;
      transition: var(--transition);
    }

    .footer-link:hover {
      color: var(--secondary);
    }

    .copyright {
      margin-top: 1rem;
      color: var(--light-gray);
      font-size: 0.9rem;
    }

    /* Form validation styles */
    .form-group.success .form-control {
      border-color: #28a745;
    }

    .form-group.error .form-control {
      border-color: #dc3545;
    }

    .error-message {
      color: #dc3545;
      font-size: 0.85rem;
      margin-top: 0.3rem;
      display: none;
    }

    .form-group.error .error-message {
      display: block;
    }

    /* Loading state */
    .btn.loading {
      position: relative;
      pointer-events: none;
    }

    .btn.loading::after {
      content: '';
      position: absolute;
      top: 50%;
      left: 50%;
      width: 20px;
      height: 20px;
      margin: -10px 0 0 -10px;
      border: 2px solid rgba(255, 255, 255, 0.3);
      border-top-color: var(--white);
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
    }

    @keyframes spin {
      to { transform: rotate(360deg); }
    }

    .confirmation {
      display: none;
      padding: 1.5rem;
      background-color: #d4edda;
      color: #155724;
      border-radius: 8px;
      margin-top: 1.5rem;
      text-align: center;
    }

  
    @media (max-width: 992px) {
      .container {
        grid-template-columns: 1fr;
      }
      
      .contact-form, .map-container {
        grid-column: span 1;
      }
    }

    @media (max-width: 576px) {
      header {
        padding: 2rem 1rem;
      }
      
      h1 {
        font-size: 2rem;
      }
      
      .container {
        padding: 1.5rem;
        margin: 1rem;
      }
      
      .info-card {
        flex-direction: column;
        text-align: center;
      }
      
      .info-icon {
        margin-bottom: 0.5rem;
      }
    }
  </style>
</head>
<body>

  <header>
    <h1>Contact Us</h1>
    <p>We'd love to hear from you!</p>
  </header>

  <div class="container">
    <section class="contact-info">
      <h2>Get In Touch</h2>
      
      <div class="info-card">
        <div class="info-icon">
          <i class="fas fa-phone-alt"></i>
        </div>
        <div class="info-content">
          <h3>Phone</h3>
          <p>+91 98765 43210</p>
          <p>+91 87654 32109 (Reservations)</p>
        </div>
      </div>
      
      <div class="info-card">
        <div class="info-icon">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="info-content">
          <h3>Email</h3>
          <p>contact@xyzrestaurant.com</p>
          <p>reservations@xyzrestaurant.com</p>
        </div>
      </div>
      
      <div class="info-card">
        <div class="info-icon">
          <i class="fas fa-map-marker-alt"></i>
        </div>
        <div class="info-content">
          <h3>Address</h3>
          <p>123 Food Street, Coimbatore</p>
          <p>Tamil Nadu, India - 641001</p>
        </div>
      </div>
      
      <div class="info-card">
        <div class="info-icon">
          <i class="fas fa-clock"></i>
        </div>
        <div class="info-content">
          <h3>Opening Hours</h3>
          <p>Monday - Friday: 11:00 AM - 11:00 PM</p>
          <p>Weekends: 10:00 AM - 11:30 PM</p>
        </div>
      </div>
      
      <div class="social-links">
        <a href="#" class="social-link" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-link" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="social-link" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="social-link" aria-label="TripAdvisor"><i class="fab fa-tripadvisor"></i></a>
      </div>
    </section>

    <section class="contact-form">
      <h2>Send Us a Message</h2>
      <form id="contactForm" novalidate>
        <div class="form-group">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" class="form-control" required>
          <div class="error-message">Please enter your name</div>
        </div>
        
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" class="form-control" required>
          <div class="error-message">Please enter a valid email address</div>
        </div>
        
        <div class="form-group">
          <label for="phone">Phone Number (Optional)</label>
          <input type="tel" id="phone" name="phone" class="form-control">
        </div>
        
        <div class="form-group">
          <label for="subject">Subject</label>
          <select id="subject" name="subject" class="form-control" required>
            <option value="" disabled selected>Select a subject</option>
            <option value="reservation">Reservation Inquiry</option>
            <option value="feedback">Feedback/Suggestion</option>
            <option value="event">Event Inquiry</option>
            <option value="other">Other</option>
          </select>
          <div class="error-message">Please select a subject</div>
        </div>
        
        <div class="form-group">
          <label for="message">Your Message</label>
          <textarea id="message" name="message" class="form-control" required></textarea>
          <div class="error-message">Please enter your message</div>
        </div>
        
        <button type="submit" class="btn">Send Message <i class="fas fa-paper-plane"></i></button>
        
        <div id="confirmation" class="confirmation">
          <i class="fas fa-check-circle"></i>
          <p>Thank you for your message! We'll get back to you soon.</p>
        </div>
      </form>
    </section>

    <div class="map-container">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.073905296422!2d76.9608573148044!3d11.02884499214314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba858526f8e89e5%3A0x3a1e5a4e6b7e8b2f!2sCoimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1620415893216!5m2!1sen!2sin"
        allowfullscreen="" 
        loading="lazy"
        aria-label="Restaurant Location Map"></iframe>
      <div class="map-overlay"></div>
    </div>
  </div>

  <footer>
    <div class="footer-content">
      <div class="footer-links">
        <a href="#" class="footer-link">Home</a>
        <a href="#" class="footer-link">Menu</a>
        <a href="#" class="footer-link">Gallery</a>
        <a href="#" class="footer-link">About Us</a>
        <a href="#" class="footer-link">Contact</a>
      </div>
      <p class="copyright">&copy; 2025 XYZ Restaurant. All rights reserved.</p>
      <p class="copyright">Contact us for reservations or feedback.</p>
    </div>
  </footer>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const contactForm = document.getElementById('contactForm');
      const confirmation = document.getElementById('confirmation');
      
      // Form validation
      contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Reset form states
        const formGroups = contactForm.querySelectorAll('.form-group');
        formGroups.forEach(group => {
          group.classList.remove('success', 'error');
        });
        
        // Validate form
        let isValid = true;
        
        // Name validation
        const nameInput = document.getElementById('name');
        if (!nameInput.value.trim()) {
          nameInput.closest('.form-group').classList.add('error');
          isValid = false;
        } else {
          nameInput.closest('.form-group').classList.add('success');
        }
        
        // Email validation
        const emailInput = document.getElementById('email');
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(emailInput.value)) {
          emailInput.closest('.form-group').classList.add('error');
          isValid = false;
        } else {
          emailInput.closest('.form-group').classList.add('success');
        }
        
        // Subject validation
        const subjectInput = document.getElementById('subject');
        if (!subjectInput.value) {
          subjectInput.closest('.form-group').classList.add('error');
          isValid = false;
        } else {
          subjectInput.closest('.form-group').classList.add('success');
        }
        
      
        const messageInput = document.getElementById('message');
        if (!messageInput.value.trim()) {
          messageInput.closest('.form-group').classList.add('error');
          isValid = false;
        } else {
          messageInput.closest('.form-group').classList.add('success');
        }
        
        if (isValid) {
          const submitBtn = contactForm.querySelector('button[type="submit"]');
          submitBtn.classList.add('loading');
          
          setTimeout(() => {
            submitBtn.classList.remove('loading');
            contactForm.reset();
            confirmation.style.display = 'block';
            setTimeout(() => {
              formGroups.forEach(group => {
                group.classList.remove('success', 'error');
              });
            }, 100);
            setTimeout(() => {
              confirmation.style.display = 'none';
            }, 5000);
          }, 1500);
        }
      });
      contactForm.querySelectorAll('input, textarea, select').forEach(input => {
        input.addEventListener('input', function() {
          const formGroup = this.closest('.form-group');
          if (this.checkValidity()) {
            formGroup.classList.remove('error');
            formGroup.classList.add('success');
          } else {
            formGroup.classList.remove('success');
          }
        });
      });
    });
  </script>

</body>
</html>