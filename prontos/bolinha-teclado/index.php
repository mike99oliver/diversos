<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bolinhas Pretas com Teclado Virtual</title>
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    #inputContainer {
      display: flex;
      align-items: center;
    }

    #keyboard {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin-top: 20px;
    }

    .key {
      width: 40px;
      height: 40px;
      border: 1px solid #ccc;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }

    .dot {
      width: 20px;
      height: 20px;
      background-color: black;
      border-radius: 50%;
      margin: 0 5px;
    }
  </style>
</head>
<body>
  <div id="inputContainer">
    <input type="text" id="textInput" maxlength="6" readonly>
    <div id="dotsContainer"></div>
  </div>

  <div id="keyboard">
    <div class="key" onclick="handleKey('1')">1</div>
    <div class="key" onclick="handleKey('2')">2</div>
    <div class="key" onclick="handleKey('3')">3</div>
    <div class="key" onclick="handleKey('4')">4</div>
    <div class="key" onclick="handleKey('5')">5</div>
    <div class="key" onclick="handleKey('6')">6</div>
    <div class="key" onclick="handleKey('7')">7</div>
    <div class="key" onclick="handleKey('8')">8</div>
    <div class="key" onclick="handleKey('9')">9</div>
    <div class="key" onclick="handleKey('0')">0</div>
  </div>

  <script>
    function handleKey(key) {
      const input = document.getElementById('textInput');
      const dotsContainer = document.getElementById('dotsContainer');

      if (input.value.length < 6) {
        input.value += key;

        dotsContainer.innerHTML = '';
        for (let i = 0; i < input.value.length; i++) {
          const dot = document.createElement('div');
          dot.classList.add('dot');
          dotsContainer.appendChild(dot);
        }
      }
    }
  </script>
</body>
</html>