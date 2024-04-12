<!DOCTYPE html>
{% load static %}
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Color Game</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar {
      background-color: #007bff;
    }
    .navbar-brand {
      color: #fff !important;
    }
    .wallet-icon {
      color: #28a745;
    }
    .countdown {
      font-size: 36px;
      font-weight: bold;
      color: #007bff;
    }
    .result {
      margin-top: 20px;
      border: 2px solid #007bff;
      border-radius: 10px;
      padding: 20px;
      position: relative;
    }
    .result h4 {
      color: #007bff;
      margin-bottom: 10px;
    }
    .loading {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .number-representation {
      margin-top: 20px;
      border: 2px solid #007bff;
      border-radius: 10px;
      padding: 20px;
    }
    .number-representation h4 {
      color: #007bff;
      margin-bottom: 10px;
    }
    .number-representation strong {
      font-size: 48px;
      color: #28a745;
    }
    .history {
      margin-top: 20px;
      border: 2px solid #28a745;
      border-radius: 10px;
      padding: 20px;
    }
    .history h4 {
      color: #28a745;
      margin-bottom: 10px;
    }
    .history div {
      font-size: 24px;
      margin-bottom: 5px;
    }
    .footer-btn {
      width: 33.33%;
      font-size: 20px;
      margin-top: 10px;
    }
    .footer-btn:hover {
      transform: scale(1.1);
    }
    .highlight {
        color: blue;
        animation: highlight 1s infinite alternate;
    }
    @keyframes highlight {
        from {
            color: blue; /* Initial color */
        }
        to {
            color: red; /* Highlight color */
        }
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
      .color-btn {
        margin-bottom: 10px;
      }
    }
    .custom-bg-dark {
        background-color: #121212; /* Darker black color */
    }
    

    /* Assign background colors to color buttons */
    .btn-red { background-color: red; }
    .btn-orange { background-color: orange; }
    .btn-green { background-color: green; }
    .btn-blue { background-color: blue; }
    .btn-cyan { background-color: cyan; }
    .btn-purple { background-color: purple; }
    .btn-pink { background-color: pink; }
    .btn-gray { background-color: gray; }
    .btn-brown { background-color: brown; }
    .btn-teal { background-color: teal; }
    .btn-yellow { background-color: yellow; }
    .btn-indigo { background-color: indigo; }

  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark custom-bg-dark">
        <div class="container">
            <div class="elementor-widget-container ml-5 navbar-brand">
                <a href="#">
                    <img width="250" height="50" style="height: 155px;" alt="" data-srcset="{% static 'images/Logo.png' %}" data-src="{% static 'images/Logo.png' %}" data-sizes="(max-width: 365px) 100vw, 365px" class="attachment-large size-large wp-image-1273 lazyload" src="{% static 'images/Logo.png' %}"/>
                </a>
            </div>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fas fa-wallet wallet-icon"></i> ₹125
              </a>
            </li>
          </ul>
        </div>
    </nav>
    
    

  <div class="container mt-4">
    <h3>Time Remaining: <span class="countdown">10:00</span></h3>
    <div class="result">
      <h4>Result</h4>
      <div class="loading">
        <i class="fas fa-spinner fa-spin fa-3x"></i>
      </div>
    </div>
    <div class="number-representation">
        <footer class="footer mt-4">
            <!-- Color selection buttons -->
            <div class="row mt-4">
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-red btn-block color-btn">Red</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-orange btn-block color-btn">Orange</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-green btn-block color-btn">Green</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-blue btn-block color-btn">Blue</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-cyan btn-block color-btn">Cyan</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-purple btn-block color-btn">Purple</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-pink btn-block color-btn">Pink</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-gray btn-block color-btn">Gray</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-brown btn-block color-btn">Brown</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-teal btn-block color-btn">Teal</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-yellow btn-block color-btn">Yellow</button>
              </div>
              <div class="col-md-3 col-6 mb-2">
                <button class="btn btn-indigo btn-block color-btn">Indigo</button>
              </div>
            </div>
          
        </footer> 
    </div>
    <div class="history">
      <h4>History</h4>
      <div>+100</div>
      <div>+50</div>
      <div class="text-danger">-25</div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-4 col-12 mb-2">
        <button class="btn btn-primary btn-block footer-btn">Alphabet Game</button>
      </div>
      <div class="col-md-4 col-12 mb-2">
        <button class="btn btn-secondary btn-block footer-btn">Color Game</button>
      </div>
      <div class="col-md-4 col-12 mb-2">
        <button class="btn btn-info btn-block footer-btn">Spinner Game</button>
      </div>
    </div>

  <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // Optional: Add animation class to the element using JavaScript
    document.querySelector(".highlight").classList.add("animated");

    // Color selection logic
    const colorButtons = document.querySelectorAll(".color-btn");
    colorButtons.forEach(button => {
      button.addEventListener("click", () => {
        const color = button.textContent.trim().toLowerCase();
        document.body.style.backgroundColor = color;
      });
    });
  </script>
</body>
</html>
