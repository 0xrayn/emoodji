// Initial References
const moves = document.getElementById("moves");
const container = document.querySelector(".kotak");
const startButton = document.getElementById("start-button");
const coverScreen = document.querySelector(".cover-screen");
const result = document.getElementById("result");

let currentElement = null;
let movesCount = 0;
let gameFinished = false;
let imagesArr = [];

// Random number for image
const randomNumber = () => Math.floor(Math.random() * 8) + 1;

// Fill array with random value for images
const randomImages = () => {
    imagesArr = [];
    while (imagesArr.length < 8) {
        let randomVal = randomNumber();
        if (!imagesArr.includes(randomVal)) imagesArr.push(randomVal);
    }
    imagesArr.push(9); // 9 = blank
};

// Get row and column value from data-position
const getCoords = (element) => {
    const [row, col] = element.getAttribute("data-position").split("_");
    return [parseInt(row), parseInt(col)];
};

// Check adjacency
const checkAdjacent = (row1, row2, col1, col2) => {
    return (row1 === row2 && (col2 === col1 - 1 || col2 === col1 + 1)) ||
        (col1 === col2 && (row2 === row1 - 1 || row2 === row1 + 1));
};

// Generate grid
const gridGenerator = () => {
    container.innerHTML = "";
    let count = 0;
    for (let i = 0; i < 3; i++) {
        for (let j = 0; j < 3; j++) {
            let div = document.createElement("div");
            div.setAttribute("data-position", `${i}_${j}`);
            div.addEventListener("click", selectImage);
            div.classList.add("image-container");
            div.innerHTML = `<img src="/permainan/image_part_00${imagesArr[count]}.png"
                              class="image ${imagesArr[count] == 9 ? "target" : ""}"
                              data-index="${imagesArr[count]}"/>`;
            container.appendChild(div);
            count++;
        }
    }
    movesCount = 0;
    moves.innerText = `Gerakan ke-${movesCount}`;
    gameFinished = false;
};

// Handle image click
const selectImage = (e) => {
    if (gameFinished) return;

    const currentElement = e.target;
    const targetElement = document.querySelector(".target");
    const currentParent = currentElement.parentElement;
    const targetParent = targetElement.parentElement;

    const [row1, col1] = getCoords(currentParent);
    const [row2, col2] = getCoords(targetParent);

    if (checkAdjacent(row1, row2, col1, col2)) {
        // Swap DOM
        currentParent.appendChild(targetElement);
        targetParent.appendChild(currentElement);

        // Swap array values
        const currentIndex = parseInt(currentElement.getAttribute("data-index"));
        const targetIndex = parseInt(targetElement.getAttribute("data-index"));
        const idxCurrent = imagesArr.indexOf(currentIndex);
        const idxTarget = imagesArr.indexOf(targetIndex);
        [imagesArr[idxCurrent], imagesArr[idxTarget]] = [imagesArr[idxTarget], imagesArr[idxCurrent]];

        // Increment moves
        movesCount++;
        moves.innerText = `Gerakan ke-${movesCount}`;

        // Check win
        if (imagesArr.join("") === "123456789") {
            gameFinished = true;
            setTimeout(() => {
                coverScreen.classList.remove("hide");
                container.classList.add("hide");
                result.innerText = `Total Gerakan: ${movesCount}`;
                startButton.innerText = "Ulangi Permainan";

                if (typeof rewardUser === "function") rewardUser(10); // reward menang
            }, 300);
        }
    }
};

// Start button click
startButton.addEventListener("click", (e) => {
    e.preventDefault(); // cegah reload
    container.classList.remove("hide");
    coverScreen.classList.add("hide");
    container.innerHTML = "";
    imagesArr = [];
    randomImages();
    gridGenerator();
    movesCount = 0;
    moves.innerText = `Gerakan ke-${movesCount}`;

    // Reward main game
    if(typeof rewardUser === "function"){
        rewardUser(5);
    }
});


// Display start screen first
window.onload = () => {
    coverScreen.classList.remove("hide");
    container.classList.add("hide");
};
