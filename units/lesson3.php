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
  <section class="level2">
    <div class="header">
      <div class="progress-bar-container">
          <a class="close-btn" href="/learn.php">
              <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
            </a>
            <div class="progress-bar-line">
              <div class="progress"></div>
            </div>
      </div>
  </div>
  <div class="board">
      <h1 class="board-header">Напишите на казахский текст</h1>
      <div class="target-lang-container">
          <div class="speech-bubble">
              <div class="sent-container">
                  <span class="word-item">Доброе</span>
                  <span>-</span>
                  <span class="space"></span>
                  <span class="word-item">Утро!</span>                
              </div>
          </div>
      </div>
      <div class="answer-field">
        <input type="text" id="input-text" placeholder="Введи на казахском">
      </div>
  </div>
  <div class="footer">
      <div class="footer-items-container">
          <div class="item left">
              <button>Пропустить</button>
          </div>
          <div class="item"></div>
          <div class="item"></div>
          <div class="item right">
              <button class="btn-next disable">Проверить</button>
          </div>
      </div>
      <div class="win-footer">
          <div class="footer-items-container">
              <div class="item left">
                  <div class="sign-container">
                      <img src="/images/check.svg" height="72px" alt="">
                  </div>
                  <div class="desc-container">
                      <span class="motivation-word">Тамаша! Правильно</span>
                  </div>
              </div>
              <div class="item"></div>
              <div class="item center"></div>
              <div class="item"></div>
              <div class="item right">
                  <button class="continue-btn">Продолжить</button>
              </div>
          </div>
      </div>
      <div class="lose-footer">
          <div class="footer-items-container">
              <div class="item left">
                  <div class="sign-container">
                      <img src="/images/wrong.svg" height="72px" fill="#cf700" alt="">
                  </div>
                  <div class="desc-container">
                      <span class="motivation-word">Қате! Ошибки - это учебник</span>
                  </div>
              </div>
              <div class="item"></div>
              <div class="item center"></div>
              <div class="item"></div>
              <div class="item right">
                  <button class="btn-next disable">Продолжить</button>
              </div>
          </div>
      </div>
  </div>
  </section>
  <script src="/js/script2.js"></script>
  <script src="/js/lessons.js"></script>
</body>
</html>