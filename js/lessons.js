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

  window.addEventListener('load', function() {
    const sentContainer = this.document.querySelector('.sent-container')
    const randomWordsField = this.document.querySelector('.random-words-field')
    const answerField = this.document.querySelector('.answer-field')
    const footer = this.document.querySelector('footer')
    const continueButton = this.document.querySelector('.continue-button')
    const continueButtonFail = this.document.querySelector('.continue-button-fail')

    const progress = this.document.querySelector('.progress')
    const winFooter = this.document.querySelector(".win-footer")
    winFooter.style.display = "none"

    
    const loseFooter = this.document.querySelector('.lose-footer')
    loseFooter.style.display= "none"


    if(checkButton.disabled) {
        checkButton.classList.add('.disabledCheckButton')
    }

    let incr = 0
    let randomWordsArr = []
    let answerFileArrDom = []
    let answerFieldWordsArr = []
    let answerArr = []
    let progressStart = 0;
    let progressRand = 100 / data.length;
    const widthHeightArr = []
    let index = 0
    let sound = null

    const randomWordsCreator = () => {
        data.forEach((obj) => {
            splittedStr = obj.ruPhrase.split(" ");
            return randomWordsArr.push(...splittedStr);
        })

        shufflewords(randomWordsArr).map((randWord) => {
                  //placeholder
      const parent_button = document.createElement('div');
      parent_button.className = 'placeholder';
      parent_button.id = index;


      //random word
      randomWordsField.appendChild(parent_button);
      const button_element = document.createElement('button');

      button_element.textContent = randWord;
      button_element.className = 'word';
      button_element.id = index;
      button_element.setAttribute('value', randWord);

      var current_placeholder = document.getElementById(index);
      current_placeholder.appendChild(button_element);

      //setting height and width of parent element equal to child element
      var childHeight = button_element.offsetHeight * 1.5;
      var childWidth = button_element.offsetWidth * 1.5;
      parent_button.style.height = childHeight + "px";
      parent_button.style.width = childWidth + "px";
      widthHeightArr[index] = [childHeight, childWidth];
      index++;
    });
}
    randomWordsCreator()

    function shufflewords(array) {
        let currentIndex = array.length, temporaryValue, randomIndex

        while(0 !== currentIndex) {
            randomIndex = Math.floor(Math.random() * currentIndex)
            currentIndex -= 1

            temporaryValue = array[currentIndex]
            array[currentIndex] = array[randomIndex]
            array[randomIndex] = temporaryValue
        }

        return array
    }
    
  })

  const destination = document.querySelector(".destination"); // container where selected words go
const origin = document.querySelector(".origin"); // container where words initially start
const words = origin.querySelectorAll(".word"); // nodeList of all the words in the origin

let isAnimating = false; // bool to prevent competing animations (clicking a word before the previous word has finished moving)

// FLIP technique animation (First Last Invert Play)
const flip = (word, settings) => {
	// calculate the difference in position between where the word started and where it ended (First - Last = Invert)
	const invert = {
		x: settings.first.left - settings.last.left,
		y: settings.first.top - settings.last.top
	};

	// do the animation (Play) from the original (Invert) position to the final current position
	let animation = word.animate(
		[
			{ transform: `scale(1,1) translate(${invert.x}px, ${invert.y}px)` },
			{ transform: `scale(1,1) translate(0, 0)` }
		],
		{
			duration: 300,
			easing: "ease"
		}
	);

	// signify that animation has completed
	animation.onfinish = () => (isAnimating = false);
};

// move the word from the origin to the destination
const move = (word) => {
	const id = Math.random(); // random number used to link the word to its container (used in the putback function)
	const container = word.closest(".container"); // the selected word's container element
	let rect = word.getBoundingClientRect(); // selected word's DOM rect
	let first, last; // containers for the initial and final (First and Last) positions of the element

	isAnimating = true; //signify an animation has started (or is about to)

	// give both the container and the word a data-id (used in the putback function) (using data-id and not a var because you can query for a data-attribute)
	container.dataset.id = id;
	word.dataset.id = id;

	// set the container to the heighth width of the word (so it stays visible when empty)
	container.style.height = `${word.offsetHeight}px`;
	container.style.width = `${word.offsetWidth}px`;

	// assign the initial top/left px values of the word -> move the word to the destination -> recaculate the the word's DOM rect in new position -> assign the final top/left values
	first = { top: rect.top, left: rect.left };
	destination.insertAdjacentElement("beforeend", word);
	rect = word.getBoundingClientRect();
	last = { top: rect.top, left: rect.left };

	// send word, and its caculated vales to the flip funciton
	flip(word, { first, last });
};

const putback = (word) => {
	const id = word.dataset.id; // get the ID of the current word
	const container = origin.querySelector(`[data-id="${id}"]`); // query for the container w/ the matching ID
	const siblings = [...destination.querySelectorAll(".word")].filter(
		(sib) => sib !== word
	); // find the other word elements in the destination so we can animate them when the selected word is put back

	let rect = word.getBoundingClientRect(); // selected word's DOM rect
	let first, last; // containers for the initial and final (First and Last) positions of the element

	isAnimating = true; //signify an animation has started (or is about to)

	first = { top: rect.top, left: rect.left }; // assign the initial top/left px values

	// get the initial top/left px values for each sibling
	siblings.forEach((sib) => {
		let rect = sib.getBoundingClientRect();
		// I am assigning this value as a property of the element object because trying to keep a
		// variable linked to this element inside a loop that we can use later in a different loop
		// would be a real big pain. Best practice is not to modify objects/classes you don't own,
		// so to be safe and avoid overwriting an existing property value (ele.first or ele.last)
		// I am prefixing the property name with __
		sib.__first = { top: rect.top, left: rect.left };
	});

	container.insertAdjacentElement("beforeend", word); //move the word from the destination back to its original container

	rect = word.getBoundingClientRect(); // selected word's new DOM rect
	last = { top: rect.top, left: rect.left }; // assign the final top/left px values

	// get the final top/left px values for each sibling
	siblings.forEach((sib) => {
		let rect = sib.getBoundingClientRect();
		sib.__last = { top: rect.top, left: rect.left };
	});

	flip(word, { first, last }); // animate the word

	siblings.forEach((sib) => flip(sib, { first: sib.__first, last: sib.__last })); // animate the siblings

	// clean up the junk we added during the move function()
	container.style.height = "";
	container.style.width = "";
	container.removeAttribute("data-id");
	word.removeAttribute("data-id");
};

// add a conditional eventListener to each word
words.forEach((word) => {
	const event = () => {
		if (isAnimating) return; // if we already have an animation playing, don't let the user start a new one
		word.closest(".container") ? move(word) : putback(word); // decide if we should use the move() or putback() functions based on the word's current location
	};

	word.addEventListener("click", event);
});



// Add this after your existing JavaScript code

document.addEventListener("DOMContentLoaded", function () {
  const checkButton = document.getElementById("check-button");
  
  const correctSequence = ["I", "speak", "American"]; // Add your correct sequence here

  checkButton.addEventListener("click", function () {
    const enteredWords = Array.from(destination.querySelectorAll(".word")).map(word => word.textContent);
    
    if (JSON.stringify(enteredWords) === JSON.stringify(correctSequence)) {
      alert("Correct!");
    } else {
      alert("Incorrect! Try again.");
    }
  });
});

