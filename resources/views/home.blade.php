<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Games Menu</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 600px;
      margin: 100px auto;
    }
    .btn-game {
      width: 100%;
      margin-bottom: 20px;
      font-size: 20px;
    }
    .btn-game:hover {
      transform: translateY(-2px);
    }
    .highlight {
        color: blue;
        animation: highlight 1s infinite alternate; /* Animation */
    }
    @keyframes highlight {
        from {
            color: blue; /* Initial color */
        }
        to {
            color: red; /* Highlight color */
        }
    }
  </style>
</head>
<body>
  <div class="container text-center">
    <h1 id="muqabla">Welcome to <span class="highlight">Muqabla</span>  Games Collection</h1>
    <div class="row mt-5">
      <div class="col-md-6">
        <a class="btn btn-primary btn-lg btn-game" href="{% url "number" %}">Number Game</a>
      </div>
      <div class="col-md-6">
        <a class="btn btn-info btn-lg btn-game" href="{% url "rashi" %}">Rashi Game</a>
      </div>
        
    </div>
    <div class="row">
      <div class="col-md-6">
        <button class="btn btn-warning btn-lg btn-game">Alphabet Game</button>
      </div>
      <div class="col-md-6">
        <a class="btn btn-info btn-lg btn-game" href="{% url "color" %}">Color Game</a>
      </div>
    </div>

  </div>

  <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    // Optional: Add animation class to the element using JavaScript
    document.querySelector(".highlight").classList.add("animated");

  </script>
</body>
</html>
