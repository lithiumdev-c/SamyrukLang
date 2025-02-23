document.addEventListener("DOMContentLoaded", () => {
  const leftBoard = document.querySelector(".game-board-left");
  const rightBoard = document.querySelector(".game-board-right");
  const nextButton = document.querySelector(".btn-next");
  const progressBar = document.querySelector(".progress-bar-line");
  let selectedLeft = null;
  let selectedRight = null;
  let currentLevel = 1;
  const totalLevels = 5;
  const levels = [
      { "привет": "сәлем", "земля": "жер", "деньги": "ақша", "как ты?": "қалайсың?", "школа": "мектеп" },
      { "кот": "мысық", "собака": "ит", "дом": "үй", "молоко": "сүт", "вода": "су" },
      { "яблоко": "алма", "груша": "алмұрт", "апельсин": "апельсин", "виноград": "жүзім", "банан": "банан" },
      { "машина": "көлік", "поезд": "пойыз", "самолет": "ұшақ", "автобус": "автобус", "велосипед": "велосипед" },
      { "стол": "үстел", "стул": "орындық", "дверь": "есік", "окно": "терезе", "книга": "кітап" }
  ];

  function shuffleArray(array) {
      return array.sort(() => Math.random() - 0.5);
  }

  function updateProgress() {
      const progressPercentage = currentLevel * 20;
      progressBar.style.setProperty("--progress", `${progressPercentage}%`);
      progressBar.style.setProperty("--progress-width", `${progressPercentage}%`);
  }

  function checkMatch() {
      if (selectedLeft && selectedRight) {
          if (levels[currentLevel - 1][selectedLeft.textContent] === selectedRight.textContent) {
              selectedLeft.classList.add("matched", "disable");
              selectedRight.classList.add("matched", "disable");
              selectedLeft.removeEventListener("click", handleLeftClick);
              selectedRight.removeEventListener("click", handleRightClick);
              checkCompletion();
          } else {
              alert("Неправильно! Попробуйте ещё раз.");
          }
          selectedLeft.classList.remove("selected", "active");
          selectedRight.classList.remove("selected", "active");
          selectedLeft = null;
          selectedRight = null;
      }
  }

  function checkCompletion() {
      if (document.querySelectorAll(".matched").length === Object.keys(levels[currentLevel - 1]).length * 2) {
          if (currentLevel === totalLevels) {
              alert("Поздравляем! Вы прошли все уровни!");
              nextButton.textContent = "Заново";
              nextButton.classList.remove("disable");
              nextButton.addEventListener("click", restartGame, { once: true });
          } else {
              nextButton.classList.remove("disable");
          }
      }
  }

  function handleLeftClick(event) {
      if (event.target.classList.contains("matched")) return;
      if (selectedLeft) selectedLeft.classList.remove("selected", "active");
      selectedLeft = event.target;
      selectedLeft.classList.add("selected", "active");
      checkMatch();
  }

  function handleRightClick(event) {
      if (event.target.classList.contains("matched")) return;
      if (selectedRight) selectedRight.classList.remove("selected", "active");
      selectedRight = event.target;
      selectedRight.classList.add("selected", "active");
      checkMatch();
  }

  nextButton.addEventListener("click", () => {
      if (!nextButton.classList.contains("disable")) {
          if (currentLevel < totalLevels) {
              currentLevel++;
              updateProgress();
              loadLevel();
          }
      }
  });

  function restartGame() {
      currentLevel = 1;
      updateProgress();
      loadLevel();
      nextButton.textContent = "Далее";
  }

  function loadLevel() {
      leftBoard.innerHTML = "";
      rightBoard.innerHTML = "";
      
      const words = Object.entries(levels[currentLevel - 1]);
      const shuffledRightWords = shuffleArray(words.map(([_, right]) => right));
      
      words.forEach(([left], index) => {
          const leftWord = document.createElement("div");
          leftWord.classList.add("word");
          leftWord.textContent = left;
          leftWord.addEventListener("click", handleLeftClick);
          leftBoard.appendChild(leftWord);
      });
      
      shuffledRightWords.forEach((right) => {
          const rightWord = document.createElement("div");
          rightWord.classList.add("word");
          rightWord.textContent = right;
          rightWord.addEventListener("click", handleRightClick);
          rightBoard.appendChild(rightWord);
      });
      
      nextButton.classList.add("disable");
  }

  updateProgress();
  loadLevel();
});