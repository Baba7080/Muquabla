<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Alphabet Game</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
      background: conic-gradient(red 0, red 40deg, blue 40deg, blue 80deg, green 80deg, green 120deg, yellow 120deg, yellow 160deg, orange 160deg, purple 160deg, purple 240deg, teal 240deg, teal 280deg, pink 280deg, pink 320deg, brown 320deg, brown 360deg);
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
    .alphabet {
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
    .alphabet-representation {
      margin-top: 20px;
      border: 2px solid #007bff;
      border-radius: 10px;
      padding: 20px;
    }
    .alphabet-representation h4 {
      color: #007bff;
      margin-bottom: 10px;
    }
    .alphabet-representation strong {
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
      flex-direction: column; /* Adjust flex direction for responsiveness */
      align-items: center; /* Align items to the center */
      margin-top: 20px;
    }
    .alphabet-select,
    .input-amount {
      width: 100%; /* Set width to 100% for responsiveness */
      max-width: 400px; /* Limit maximum width */
      margin: 0 auto; /* Center horizontally */
    }
    .alphabet-btn {
      width: calc(33.33% - 10px); /* Adjust button width for responsiveness */
    }
    .input-amount {
      padding: 20px;
    }
    .amount-buttons {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(100px, 1fr)); /* Use auto-fill for responsiveness */
      gap: 10px;
    }
    #amountInput {
      width: 100%;
      max-width: 300px; /* Limit maximum width */
    }
    .action-buttons {
      display: flex;
      flex-direction: column; /* Adjust flex direction for responsiveness */
      gap: 10px;
    }
    .action-buttons button {
      width: 100%; /* Set width to 100% for responsiveness */
    }
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark custom-bg-dark">
    <div class="container">
        <div class="elementor-widget-container  mr-auto navbar-brand">
            <img width="200px" height="50" style="height: 155px;" alt="Alphabet Game" src="{{ asset('logonumber.png') }}"/>
        </div>
        <p class="text-white" style="position: absolute; top: 0; right: 0; margin: 10px; padding: 5px;">
        Amount : {{ $user->amount }}
        </p>
        <p class="text-white" id = "exposure-p" style="position: absolute; top: 60px; right: 0; margin: 10px; padding: 5px;">
        Exposure :{{ $user->exposure }}
        </p>
        <p class="text-white" style="position: absolute; top: 30px; right: 1px; margin: 10px; padding: 5px;">
        Round Id : <span id="round_id"></span>
        </p>
    </div>
  </nav>

  <div class="mt-4">
    <h3 class="text-center">Time Remaining: <span id="counter"></span></h3>

      <div class="result text-center" id="result">
        <h4>Result</h4>
      </div>

    <div class="container-wrapper">
       <div class = "alphabet-select">
          <h2>Select an Alphabet</h2>
            <button class="alphabet-btn btn btn-primary mt-1" onclick="openAmountPopup('A')">A</button>
            <button class="alphabet-btn btn btn-primary mt-1" onclick="openAmountPopup('B')">B</button>
            <button class="alphabet-btn btn btn-primary mt-1" onclick="openAmountPopup('C')">C</button>
            <button class="alphabet-btn btn btn-primary mt-1" onclick="openAmountPopup('D')">D</button>
            <button class="alphabet-btn btn btn-primary mt-1" onclick="openAmountPopup('E')">E</button>
            <button class="alphabet-btn btn btn-primary mt-1" onclick="openAmountPopup('F')">F</button>
            <button class="alphabet-btn btn btn-primary mt-1" onclick="openAmountPopup('G')">G</button>
            <button class="alphabet-btn btn btn-primary mt-1" onclick="openAmountPopup('H')">H</button>
            <button class="alphabet-btn btn btn-primary mt-1" onclick="openAmountPopup('I')">I</button>
            <p class="text-danger" id="noBet"><b>No more bets</b></p>
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
            <input type="text" id="alphabetSelect" class="d-none">
            <div class="action-buttons">
                <button onclick="submitAmount()" style="background-color: green; color: white;">Submit</button>
                <button onclick="closeAmountPopup()" style="background-color: red; color: white;">Cancel</button>
           </div>
        </div>
    </div>
    <div class="alphabet-representation">
      <h4>Alphabet Representation</h4>
      <strong>E</strong>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      updateTimer(); // Initial call to update timer
      setInterval(updateTimer, 10000); // Update timer every 10 seconds
    });

    function generateUniqueTimestamp() {
        return new Date().getTime(); // Returns current timestamp in milliseconds
    }

    function updateTimer() {
      const roundIdElement = document.getElementById('round_id');
      const counterElement = document.getElementById('counter');
      const alphabetButtons = document.querySelectorAll('.alphabet-btn');
      const noBetElement = document.getElementById('noBet');

      let existingBetId = false;

      if (!existingBetId) {
          existingBetId = generateUniqueTimestamp();
          sessionStorage.setItem('betid', existingBetId);
      }

      roundIdElement.textContent = existingBetId;

      let seconds = 10; // Countdown duration in seconds

      function countdown() {
          counterElement.textContent = seconds;

          if (seconds < 4) {
            alphabetButtons.forEach(button => {
                button.disabled = true;
            });
            noBetElement.style.display = 'block';
          } else {
            noBetElement.style.display = 'none';
          }
          seconds--;

          if (seconds <= 4) {
            $.ajax({
                type: 'POST',
                url: '/fetchAlphabetBetResult',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    betId: existingBetId
                },
                success: function(response) {
                  toastr.options = {
                      closeButton: true,  // Show close button
                      positionClass: 'toast-center',  // Use custom CSS class for positioning
                      timeOut: 5000  // Auto-hide after 5 seconds
                  };

                  toastr.success('Bet placed successfully');
                },
                error: function(xhr, status, error) {
                    console.error('Error submitting data:', error);
                }
            });
          }

          if (seconds < 0) {
              clearInterval(countdownInterval); // Stop the countdown interval
              updateTimer();
              window.location.reload(); 
          }
      }

      countdown();
      const countdownInterval = setInterval(countdown, 1000);
    }

    function openAmountPopup(alphabet) {
        const inputAmountDiv = document.querySelector('.input-amount');

        inputAmountDiv.classList.remove('hidden');

        const amountInput = document.getElementById('alphabetSelect');
        amountInput.value = alphabet;
    }

    function setSelectedAmount(amount) {
      let amountInput = document.getElementById('amountInput');
      let currentAmount = parseFloat(amountInput.value); // Get current amount as a number

      if (isNaN(currentAmount) || currentAmount === undefined) {
          currentAmount = 0;
      }

      let updatedAmount = currentAmount + amount;
      amountInput.value = updatedAmount;
    }

    function submitAmount() {
      const amountInput = document.getElementById('amountInput');
      const amountValue = amountInput.value;
      const alphabetSelect = document.getElementById('alphabetSelect');
      let alphabetValue = null;
      if (alphabetSelect) {
          alphabetValue = alphabetSelect.value;
      }
      const existingBetId = sessionStorage.getItem('betid');
      $.ajax({
        type: 'POST',
        url: '/submitAmount',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            alphabetValue: alphabetValue,
            amountValue: amountValue,
            name: "alphabetGame",
            betId: existingBetId,
            outputValue: amountValue
        },
        success: function(response) {
          toastr.options = {
              closeButton: true,  // Show close button
              positionClass: 'toast-bottom-center',  // Use custom CSS class for positioning
              timeOut: 5000  // Auto-hide after 5 seconds
          };

          toastr.success('Bet placed successfully');
        },
        error: function(xhr, status, error) {
            console.error('Error submitting data:', error);
        }
      });
      setTimeout(function() {
                location.reload();
            }, 1500);
    }

    function closeAmountPopup() {
      // Hide the input-amount div
      const inputAmountDiv = document.querySelector('.input-amount');
      inputAmountDiv.classList.add('hidden');
    }

    function saveToFile(betId, userId, alphabet) {
    // Define the file path where you want to save the JSON file
      const directoryPath = path.join(__dirname, 'files', 'alphabetgame');
      const filePath = path.join(directoryPath, `${betId}.json`);

      // Create the directory if it does not exist
      if (!fs.existsSync(directoryPath)) {
          fs.mkdirSync(directoryPath, { recursive: true });
      }

      // Prepare the data object to be saved in the JSON file
      const data = {
          alphabet: alphabet,
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

    function selectAlphabet(alphabet) {

    var userData = @json(session('user')); // Implement this function to fetch userId from session
    var userid = userData.id;
    const betId = process.hrtime.bigint();

    saveToFile(betId.toString(), userId, alphabet);
    }
  </script>
</body>
</html>
