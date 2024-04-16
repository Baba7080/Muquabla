<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      max-width: 400px;
      margin-top: 150px; /* Adjusted margin top */
      margin-bottom: 100px;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      animation: fadeInUp 0.5s ease-out; /* Fade in animation */
    }
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    .btn-login {
      background-color: #007bff;
      border-color: #007bff;
      color: #fff;
    }
    .btn-login:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="elementor-widget-container navbar-brand">
        <img width="200px" height="50" style="height: 155px;" alt="Muqabla " src="{{ asset('logonumber.png') }}"/>
    </div>
</nav>
<br>
<br>
<br>
<br>

  <div class="container">
    <h2 class="text-center mb-4">Login</h2>
    <form method="GET" action="login">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="user_name" placeholder="Enter username">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
      </div>
      <button type="submit" class="btn btn-primary btn-block btn-login">Login</button>
    </form>
    <div class="text-center mt-3">
      <p>Don't have an account? <a href="#">Register now</a></p>
    </div>
    <a  class="btn btn-primary btn-block btn-login" href="{% url 'home' %}">For Demo</a>
    <div>
      <?php
        if(isset($message)) {
      ?>
      <p class="text-center text-danger">
      {{ $message }}
      </p>
      <?php } ?>    
    </div>
  </div>

  <!-- Bootstrap JS and dependencies (jQuery, Popper.js) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
