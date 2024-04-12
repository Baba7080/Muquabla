<!DOCTYPE html>
{% load static %}
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Number Game</title>
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
    #spinner {
      width: 300px;
      height: 300px;
      border-radius: 50%;
      position: relative;
      margin: 0 auto; /* Center the spinner horizontally */
      cursor: pointer;
      background: conic-gradient(red 0, red 40deg, blue 40deg, blue 80deg, green 80deg, green 120deg, yellow 120deg, yellow 160deg, orange 160deg, orange 200deg, purple 200deg, purple 240deg, teal 240deg, teal 280deg, pink 280deg, pink 320deg, brown 320deg, brown 360deg);
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      animation: spin 3s linear infinite;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }
      100% {
        transform: rotate(360deg);
      }
    }

    .number {
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 18px;
      font-weight: bold;
      color: white;
      transform-origin: 50% 100%;
    }
    #counter {
      font-weight: bold;
      color: #007bff;
      font-size: 24px; /* Add font size */
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
      font-size: 20px;
      margin-top: 10px;
    }
    .footer-btn:hover {
      transform: scale(1.1);
    }
    .custom-bg-dark {
      background-color: #121212; /* Darker black color */
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


    h1 {
        color: #007bff;
    }

    .container {
        margin-top: 50px;
    }

    .number-btn {
        display: inline-block;
        width: 50px; /* Adjust as needed */
        height: 50px; /* Adjust as needed */
        margin: 10px;
        font-size: 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px; /* Adjust to make the corners rounded */
        cursor: pointer;
    }

    .number-btn:hover {
        background-color: #0056b3;
    }
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
    <h3 class="text-center">Time Remaining: <span id="counter"></span></h3>

    <div class="result text-center" id="result">
      <h4>Result</h4>
      <div class="loading">
        <i class="fas fa-spinner fa-spin fa-3x"></i>
      </div>
    </div>
    <h1>Select a Number</h1>
    <div class="container">
        <button class="number-btn" onclick="selectNumber(1)">1</button>
        <button class="number-btn" onclick="selectNumber(2)">2</button>
        <button class="number-btn" onclick="selectNumber(3)">3</button>
        <br>
        <button class="number-btn" onclick="selectNumber(4)">4</button>
        <button class="number-btn" onclick="selectNumber(5)">5</button>
        <button class="number-btn" onclick="selectNumber(6)">6</button>
        <br>
        <button class="number-btn" onclick="selectNumber(7)">7</button>
        <button class="number-btn" onclick="selectNumber(8)">8</button>
        <button class="number-btn" onclick="selectNumber(9)">9</button>
    </div>
    <div class="number-representation">
      <h4>Number Representation</h4>
      <strong>5</strong>
    </div>
      <div class="history">
        <h4>History</h4>
        <div>+100</div>
        <div>+50</div>
        <div class="text-danger">-25</div>
      </div>
    </div>
  </div>
  <footer class="footer mt-4">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center mb-2">
          <button class="btn btn-primary footer-btn">Alphabet Game</button>
          <button class="btn btn-secondary footer-btn">Color Game</button>
          <button class="btn btn-info footer-btn">Spinner Game</button>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // Optional: Add animation class to the element using JavaScript
    document.querySelector(".highlight").classList.add("animated");
  </script>
  <script>
    var numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9]; // Define numbers on the spinner
    var currentIndex = 0; // Current index of the spinner
    var animationPaused = false; // Flag to control animation pause

    function spin() {
      if (!animationPaused) { // Proceed only if animation is not paused
        var spinDuration = 3000; // Duration of spinning in milliseconds

        var spinInterval = setInterval(function() {
          currentIndex++; // Move to the next number
          if (currentIndex >= numbers.length) {
            currentIndex = 0; // Reset index if it exceeds array length
          }
        }, 100); // The ball rotates smoothly, hence we update its position more frequently

        // Stop spinning after spinDuration
        setTimeout(function() {
          clearInterval(spinInterval);
          document.getElementById("result").innerHTML = "<h1>" + numbers[currentIndex] + "</h1>"; // Display the result
          animationPaused = true; // Pause animation
          setTimeout(function() {
            animationPaused = false; // Resume animation after 5 seconds
            document.getElementById("result").innerHTML = ""; // Clear the result after 5 seconds
            currentIndex = 0; // Reset currentIndex for the next spin
            spin(); // Restart the animation
          }, Math.floor(Math.random() * 6000) + 5000); 
        }, spinDuration);
      }
    }

    // Countdown timer
    var counter = 10; // Initial counter value
    var counterInterval = setInterval(function() {
      counter--;
      document.getElementById("counter").innerHTML = counter;
      if (counter === 0) {
        clearInterval(counterInterval); // Stop the counter
        counter = 10; // Reset counter to 10 after reaching 0
        animationPaused = true; // Pause animation
        var randomNumber = getRandomNumber(1, 9);
        document.getElementById("result").innerHTML = "<h1>" + randomNumber + "</h1>"; // Display the result
        var spinnerElement = document.getElementById("spinner");
        spinnerElement.style.display = "none";
        var textElement = document.createElement("div");
        textElement.textContent = "Wait for 5 To 10 sec .....";
        // Replace the spinner with the text element
        spinnerElement.parentNode.insertBefore(textElement, spinnerElement.nextSibling);
        pauseForFiveSeconds();
        setTimeout(function() {
          animationPaused = false; // Resume animation after 5 seconds
          spin(); // Restart the animation
        }, Math.floor(Math.random() * 6000) + 5000); // Random pause between 5 to 10 seconds
      }
    }, 1000); // Update every second
    function getRandomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
    function pauseForFiveSeconds() {
        console.log("Pausing for 5 seconds...");
        setTimeout(function() {
            console.log("Resuming after 5 seconds!");
            location.reload();
        }, 5000); // 5000 milliseconds = 5 seconds
    }
  </script>
</body>
</html>
