<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.5.0/fonts/remixicon.css"
    rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css?family=Rubik:regular,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/units/lessons.css">
</head>
<body>
  <header>
  <a class="close-btn" href="/learn.php"></a>
    <div class="progress-bar-line">
        <img src="/images/wrong.svg" fill="#000" alt="">
    </div>
  </header>
  <main>
    <secton class="level1">
      <h2 class="level-title">Выберите пару слов</h2>
      <div class="game-board">
        <div class="game-board-left">
          <div class="word">привет</div>
          <div class="word">земля</div>
          <div class="word">деньги</div>
          <div class="word">как ты?</div>
          <div class="word">привет</div>
          <div class="word">школа</div>
        </div>
        <div class="game-board-right">
          <div class="word">ақша</div>
          <div class="word">сәлем</div>
          <div class="word">жер</div>
          <div class="word">қалайсың?</div>
          <div class="word">мектеп</div>
          <div class="word">сәлем</div>

        </div>
      </div>
      <div class="btn-next disable">
        Далее
    </div>
    <svg class="connections"></svg>
    </secton>


    <script src="/js/lessons.js"></script>
    <script src="/js/script.js"></script>
  </main>
</body>
</html>