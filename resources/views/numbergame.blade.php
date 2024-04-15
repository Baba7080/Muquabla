<!DOCTYPE html>
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
    .container-wrapper {
    display: flex;
    align-items: flex-start; /* Align items to the top */
    margin-top: 20px;
    margin-right: 30%;
    }

    .number-select {
        /* Ensure the number-select div stays fixed at the left corner */
        position: relative;
        padding : 50px;
        margin-left : 300px;
    }

    .input-amount {
        /* Keep the input-amount div hidden by default */
        display: none;
        /* Additional styling for the input-amount div */
        padding: 50px;
    }

    /* Show the input-amount div when it's not hidden */
    .input-amount:not(.hidden) {
        margin-top: 30px;
        display: block;
        margin-left: 150px;
    }
    .number-btn {
        display: inline-block;
        width: 50px;
        height: 50px;
        margin: 5px;
        font-size: 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .number-btn:hover {
        background-color: #0056b3;
    }

    .amount-select {
    border: 1px solid #ccc;
    border-radius: 5px;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    }
    .amount-buttons {
      grid-column: span 2;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 10px;
    }
  .amount-buttons button {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
  }
  .amount-buttons button:hover {
      background-color: #0056b3;
  }
  #amountInput {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
  }
  .action-buttons {
      grid-column: span 2;
      display: flex;
      justify-content: space-between;
  }
  .action-buttons button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
  }
  .hidden {
    display: none;
  }

  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark custom-bg-dark">
    <div class="container">
        <div class="elementor-widget-container ml-5 navbar-brand">
            <a href="#">
                <img width="250" height="50" style="height: 155px;" alt="" data-srcset="images/Logo.png" data-src="{% static 'images/Logo.png' %}" data-sizes="(max-width: 365px) 100vw, 365px" class="attachment-large size-large wp-image-1273 lazyload" src="../../images/logonumber.jpg"/>
            </a>
        </div>
    </div>
  </nav>

  <div class="mt-4">
    <h3 class="text-center">Time Remaining: <span id="counter"></span></h3>

    <div class="result text-center" id="result">
      <h4>Result</h4>
      <div class="loading">
        <i class="fas fa-spinner fa-spin fa-3x"></i>
      </div>
    </div>
    
    <div class="container-wrapper">
       <div class = "number-select">
          <h2>Select a Number</h2>
            <button class="number-btn" onclick="openAmountPopup(1)">1</button>
            <button class="number-btn" onclick="openAmountPopup(2)">2</button>
            <button class="number-btn" onclick="openAmountPopup(3)">3</button>
            <br>
            <button class="number-btn" onclick="openAmountPopup(4)">4</button>
            <button class="number-btn" onclick="openAmountPopup(5)">5</button>
            <button class="number-btn" onclick="openAmountPopup(6)">6</button>
            <br>
            <button class="number-btn" onclick="openAmountPopup(7)">7</button>
            <button class="number-btn" onclick="openAmountPopup(8)">8</button>
            <button class="number-btn" onclick="openAmountPopup(9)">9</button>
        </div>
        <div class="input-amount hidden">
          <h2> Select amount</h2>
            <div class="amount-buttons">
                <button onclick="setSelectedAmount(100)">₹100</button>
                <button onclick="setSelectedAmount(200)">₹200</button>
                <button onclick="setSelectedAmount(500)">₹500</button>
                <button onclick="setSelectedAmount(1000)">₹1000</button>
            </div>
            <input type="number" id="amountInput" placeholder="Enter custom amount (≥ 100)">
            <input type="number" id="numberSelect" class="d-none">
            <div class="action-buttons">
                <button onclick="submitAmount()" style="background-color: green; color: white;">Submit</button>
                <button onclick="closeAmountPopup()" style="background-color: red; color: white;">Cancel</button>
           </div>
        </div>
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
    const fs = require('fs');
    const path = require('path');
    var numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9]; // Define numbers on the spinner
    var currentIndex = 0; // Current index of the spinner
    var animationPaused = false; // Flag to control animation pause

    // function spin() {
    //   if (!animationPaused) { // Proceed only if animation is not paused
    //     var spinDuration = 3000; // Duration of spinning in milliseconds

    //     var spinInterval = setInterval(function() {
    //       currentIndex++; // Move to the next number
    //       if (currentIndex >= numbers.length) {
    //         currentIndex = 0; // Reset index if it exceeds array length
    //       }
    //     }, 100); // The ball rotates smoothly, hence we update its position more frequently

    //     // Stop spinning after spinDuration
    //     setTimeout(function() {
    //       clearInterval(spinInterval);
    //       document.getElementById("result").innerHTML = "<h1>" + numbers[currentIndex] + "</h1>"; // Display the result
    //       animationPaused = true; // Pause animation
    //       setTimeout(function() {
    //         animationPaused = false; // Resume animation after 5 seconds
    //         document.getElementById("result").innerHTML = ""; // Clear the result after 5 seconds
    //         currentIndex = 0; // Reset currentIndex for the next spin
    //         spin(); // Restart the animation
    //       }, Math.floor(Math.random() * 6000) + 5000); 
    //     }, spinDuration);
    //   }
    // }
    document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM content loaded'); // Debug: Check if DOM content is loaded
    updateTimer(); // Call the updateTimer() function after DOM content is loaded
    });

    function generateUniqueTimestamp() {
    return new Date().getTime(); // Returns current timestamp in milliseconds
    }

    // Function to update the timer and generate a new timestamp
    function updateTimer() {
      const counterElement = document.getElementById('counter');
      const resultElement = document.getElementById('result');
      console.log("hello i m here");
      // Update the timer display
      let seconds = 10; // Countdown duration in seconds

      const countdownInterval = setInterval(() => {
          counterElement.textContent = seconds; // Update timer display
          seconds--;

          if (seconds < 0) {
              // Countdown timer has completed
              clearInterval(countdownInterval); // Stop the countdown interval

              // Generate a new unique timestamp
              const uniqueTimestamp = generateUniqueTimestamp();
              console.log('New Unique Timestamp:', uniqueTimestamp);

              // Store the unique timestamp in session storage (or other storage method)
              sessionStorage.setItem('betid', uniqueTimestamp);

              // Update result display or perform other actions as needed
              resultElement.innerHTML = `<h4>Result</h4><p>New Bet ID: ${uniqueTimestamp}</p>`;
          }
      }, 1000); // Update timer every second (1000 milliseconds)
    }

    // Call the updateTimer function to start the countdown
    // Countdown timer
    // var counter = 10; // Initial counter value
    // var counterInterval = setInterval(function() {
    //   counter--;
    //   document.getElementById("counter").innerHTML = counter;
    //   if (counter === 0) {
    //     clearInterval(counterInterval); // Stop the counter
    //     counter = 10; // Reset counter to 10 after reaching 0
    //     animationPaused = true; // Pause animation
    //     var randomNumber = getRandomNumber(1, 9);
    //     document.getElementById("result").innerHTML = "<h1>" + randomNumber + "</h1>"; // Display the result
    //     var spinnerElement = document.getElementById("spinner");
    //     spinnerElement.style.display = "none";
    //     var textElement = document.createElement("div");
    //     textElement.textContent = "Wait for 5 To 10 sec .....";
    //     // Replace the spinner with the text element
    //     spinnerElement.parentNode.insertBefore(textElement, spinnerElement.nextSibling);
    //     pauseForFiveSeconds();
    //     setTimeout(function() {
    //       animationPaused = false; // Resume animation after 5 seconds
    //       spin(); // Restart the animation
    //     }, Math.floor(Math.random() * 6000) + 5000); // Random pause between 5 to 10 seconds
    //   }
    // }, 1000); // Update every second
    // function getRandomNumber(min, max) {
    //     return Math.floor(Math.random() * (max - min + 1)) + min;
    // }

    function openAmountPopup(number) {
        // Get the input-amount div
        const inputAmountDiv = document.querySelector('.input-amount');
        
        // Show the input-amount div
        inputAmountDiv.classList.remove('hidden');

        // Assuming each number corresponds to 100 (e.g., 1 -> 100, 2 -> 200, etc.)
        const amountInput = document.getElementById('numberSelect');
        amountInput.value = number; 
    }

    function setSelectedAmount(amount) {
    let amountInput = document.getElementById('amountInput');
    let currentAmount = parseFloat(amountInput.value); // Get current amount as a number

    if (isNaN(currentAmount) || currentAmount === undefined) {
        currentAmount = 0;
    }

    // Add the selected amount to the current amount
    let updatedAmount = currentAmount + amount;
    // Update the amountInput value with the updated amount
    amountInput.value = updatedAmount;
    }

    function submitAmount() {
      // Get the value from the amountInput
      const amountInput = document.getElementById('amountInput');
      const amountValue = amountInput.value;

      // Get the value from the numberSelect (if it's visible)
      const numberSelect = document.getElementById('numberSelect');
      let numberValue = null;
      if (numberSelect) {
          numberValue = numberSelect.value;
      }

      // Perform validation or further processing with the retrieved values
      console.log('Entered Amount:', amountValue);
      console.log('Selected Number:', numberValue);

      // Example: You can use these values to submit a form, make an API request, etc.
   }

    function closeAmountPopup() {
      // Hide the input-amount div
      const inputAmountDiv = document.querySelector('.input-amount');
      inputAmountDiv.classList.add('hidden');
    }

    function saveToFile(betId, userId, number) {
    // Define the file path where you want to save the JSON file
      const directoryPath = path.join(__dirname, 'files', 'numbergame');
      const filePath = path.join(directoryPath, `${betId}.json`);

      // Create the directory if it does not exist
      if (!fs.existsSync(directoryPath)) {
          fs.mkdirSync(directoryPath, { recursive: true });
      }

      // Prepare the data object to be saved in the JSON file
      const data = {
          number: number,
          user_id: userId
      };

      // Convert data to JSON format
      const jsonData = JSON.stringify(data, null, 2); // Using null and 2 for pretty formatting

      // Write data to the JSON file
      fs.writeFile(filePath, jsonData, (err) => {
          if (err) {
              console.error('Error saving file:', err);
          } else {
              console.log(`File saved successfully: ${filePath}`);
          }
      });
    }


    function selectNumber(number) {

    var userData = @json(session('user')); // Implement this function to fetch userId from session
    var userid = userData.id;
    // Generate betId (timestamp) for the file name
    const betId = process.hrtime.bigint();

    saveToFile(betId.toString(), userId, number);
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
