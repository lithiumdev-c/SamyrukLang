document.addEventListener("DOMContentLoaded", () => {
  const inputText = document.getElementById("input-text");
  const checkButton = document.querySelector(".btn-next");
  const progressBar = document.querySelector(".progress-bar-line"); // ссылка на линию прогресс-бара
  const levels = [
    { question: "Доброе утро!", answer: "Қайырлы таң!" },
    { question: "Спасибо!", answer: "Рахмет!" },
    { question: "Как дела?", answer: "Қалайсың?" },
    { question: "До свидания!", answer: "Сау бол!" },
    { question: "Привет!", answer: "Сәлем!" }
  ];
  let currentLevel = 0;
  
  const subtitle = document.querySelector(".subtitle");
  
  function updateProgress() {
    // Вычисляем процент выполнения (для 5 уровней каждый уровень = 20%)
    const progressPercentage = (currentLevel / levels.length) * 100;
    progressBar.style.setProperty("--progress", `${progressPercentage}%`);
    progressBar.style.setProperty("--progress-width", `${progressPercentage}%`);
  }
  
  function loadLevel() {
    subtitle.textContent = levels[currentLevel].question;
    inputText.value = "";
    checkButton.textContent = "Проверить";
    checkButton.classList.add("disable");
    updateProgress();
  }
  
  inputText.addEventListener("input", () => {
    if (inputText.value.trim().length > 0) {
      checkButton.classList.remove("disable");
    } else {
      checkButton.classList.add("disable");
    }
  });
  
  checkButton.addEventListener("click", () => {
    if (inputText.value.trim() === levels[currentLevel].answer) {
      checkButton.textContent = "Верно!";
      checkButton.classList.add("correct");
      setTimeout(() => {
        checkButton.classList.remove("correct");
        currentLevel++;
        updateProgress();
        if (currentLevel < levels.length) {
          loadLevel();
        } else {
          subtitle.textContent = "Поздравляем! Вы прошли все уровни!";
          checkButton.style.display = "none";
          inputText.style.display = "none";
        }
      }, 500);
    } else {
      checkButton.textContent = "Ошибка! Попробуй ещё раз";
      checkButton.classList.add("incorrect");
      setTimeout(() => {
        checkButton.textContent = "Проверить";
        checkButton.classList.remove("incorrect");
      }, 500);
    }
  });
  
  loadLevel();
});
