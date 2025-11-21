const hint = document.getElementById("hint");
const noOfGuessesRef = document.getElementById("no-of-guesses");
const guessedNumsRef = document.getElementById("guessed-nums");
const restartButton = document.getElementById("restart");
const game = document.getElementById("game");
const guessInput = document.getElementById("guess");
const checkButton = document.getElementById("check-btn");

let answer, noOfGuesses, guessedNumsArr;

// ✨ Reward main game
function rewardPlay(points) {
    fetch('/reward/' + points, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(res => res.json())
      .then(data => {
        if(data.success){
            document.getElementById('userReward').textContent = data.new_reward;
        }
      });
}

// ✨ Reward menang
function rewardWin(points) {
    fetch('/reward/' + points, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    }).then(res => res.json())
      .then(data => {
        if(data.success){
            alert(`Kamu mendapatkan ${points} reward karena menang!`);
            document.getElementById('userReward').textContent = data.new_reward;
        }
      });
}

const play = () => {
    const userGuess = guessInput.value;
    if (userGuess < 1 || userGuess > 100 || isNaN(userGuess)) {
        alert("Masukkan nomor yang valid antara 1 dan 100.");
        return;
    }

    guessedNumsArr.push(userGuess);
    noOfGuesses += 1;

    if (noOfGuesses === 1) {
        // beri reward main saat pertama kali menebak
        rewardPlay(5);
    }

    if (userGuess != answer) {
        hint.innerHTML = userGuess < answer ? "Terlalu rendah. Coba lagi!" : "Terlalu tinggi. Coba lagi!";
        noOfGuessesRef.innerHTML = `<span>Jumlah Tebakan:</span> ${noOfGuesses}`;
        guessedNumsRef.innerHTML = `<span>Angka yang Ditebak adalah: </span>${guessedNumsArr.join(",")}`;
        hint.classList.remove("error");
        setTimeout(() => { hint.classList.add("error"); }, 10);
    } else {
        hint.innerHTML = `Selamat!<br>Angkanya adalah <span>${answer}</span>.<br>Anda menebak angkanya dalam <span>${noOfGuesses} </span>percobaan.`;
        hint.classList.add("success");
        game.style.display = "none";
        restartButton.style.display = "block";

        // beri reward menang
        rewardWin(10);
    }
};

const init = () => {
    answer = Math.floor(Math.random() * 100) + 1;
    noOfGuesses = 0;
    guessedNumsArr = [];
    noOfGuessesRef.innerHTML = "Jumlah Tebakan: 0";
    guessedNumsRef.innerHTML = "Angka yang Ditebak adalah: Tidak ada";
    guessInput.value = "";
    hint.classList.remove("success", "error");
};

guessInput.addEventListener("keydown", (event) => {
    if (event.keyCode === 13) { event.preventDefault(); play(); }
});

restartButton.addEventListener("click", () => {
    game.style.display = "grid";
    restartButton.style.display = "none";
    hint.innerHTML = "";
    hint.classList.remove("success");
    init();
});

checkButton.addEventListener("click", play);
window.addEventListener("load", init);
