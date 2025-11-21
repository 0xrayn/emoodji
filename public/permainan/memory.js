// Constant Variables
const blocksList = document.querySelector(".blocks")
const colorArray = ["red", "orange", "yellow", "green", "blue", "indigo", "violet", "pink"]
const colorList = [...colorArray, ...colorArray];
const blockCount = colorList.length;

// Conditional Varriables
let showCount = 0;
let activeBlock = null;
let awaitingMove = false;

// Start Button
const startButton = document.querySelector("#startButton");
const blockPadding = document.querySelector(".blocks");
const timerVisible = document.querySelector(".timer");
const resetButton = document.querySelector("#resetButton");
timerVisible.style.display = "none";
resetButton.style.display = "none";
blockPadding.style.padding = "0px";

// Timer
let timer;
let timeLeft = 60;
let timeLeftElement = document.querySelector("#time");

// Function to start the timer
function startTimer() {
    clearInterval(time);
    timeLeft = 60;
    updateTimeDisplay();

    timer = setInterval(updateTime, 1000);
}

// Function for updating the time
function updateTime() {
    if (timeLeft == 0) {
        clearInterval(timer);
        alert("Time is Up! Reset to play again.");
        timeLeftElement.innerHTML = `Time is Up! Reset to Play Again.`;
        timeLeftElement.style.margin = "";
        revealAllTiles();
    } else {
        timeLeft--;
        updateTimeDisplay();
    }
}

// Function to reveal all tiles
function revealAllTiles() {
    const tileElements = document.querySelectorAll(".block");

    tileElements.forEach((element) => {
        const isRevealed = element.getAttribute("data-revealed");

        if (isRevealed === "false") {
            const color = element.getAttribute("data-color");
            element.style.backgroundColor = color;
            element.setAttribute("data-revealed", "true");
        }
    });
}


// Function to update the time display
function updateTimeDisplay() {
    timeLeftElement.innerHTML = `Time Left: ${timeLeft} sec`;
}

// Start button function to display the blocks
function startGame() {
    // reward saat mulai main
    if (typeof rewardPlay === "function") rewardPlay(5);

    startTimer();
    timerVisible.style.display = "";
    resetButton.style.display = "";
    startButton.style.display = "none";
    blockPadding.style.padding = "20px";

    // Build up Blocks
    for (let i = 0; i < blockCount; i++) {
        const randomcolorIndex = Math.floor(Math.random() * colorList.length);
        const colors = colorList[randomcolorIndex];
        const block = buildBlock(colors);

        colorList.splice(randomcolorIndex, 1);
        blocksList.appendChild(block);
    }
}


// Function to generate blocks
function buildBlock(colors) {
    const element = document.createElement("div");

    element.classList.add('block');
    element.setAttribute("data-color", colors);
    element.setAttribute("data-revealed", "false");

    element.addEventListener("click", () => {

        const revealed = element.getAttribute("data-revealed");

        if (awaitingMove || revealed === 'true' || element === activeBlock) {
            return;
        }

        element.style.backgroundColor = colors;

        if (!activeBlock) {
            activeBlock = element;
            return;
        }

        const matchColor = activeBlock.getAttribute("data-color");

        // Jika warna cocok
        if (matchColor === colors) {
            activeBlock.setAttribute("data-revealed", "true");
            element.setAttribute("data-revealed", "true");
            awaitingMove = false;
            activeBlock = null;
            showCount += 2;

            // Check kemenangan
            if (showCount === blockCount) {
                alert("You Win!");
                clearInterval(timer);
                timeLeftElement.innerHTML = `You Won! Reset to Play Again.`;

                // <=== INI TEMPAT REWARD MENANG
                if (typeof rewardWin === "function") rewardWin(10);
            }
            return;
        }

        awaitingMove = true;

        setTimeout(() => {
            element.style.backgroundColor = null;
            activeBlock.style.backgroundColor = null;

            awaitingMove = false;
            activeBlock = null;
        }, 1000);

    });

    return element;
}


function resetGame() {
    location.reload();
}
