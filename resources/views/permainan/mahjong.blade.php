@extends('layout.master2')
@section('tittle', 'Emoodji - Permainan Mahjong')
@section('header', 'header4')
@section('page', 'Permainan')
@section('nav_fitur', 'active')

@section('css')
<link rel="stylesheet" href="{{ asset('permainan/mystyle.css') }}">
<link rel="stylesheet" href="{{ asset('permainan/animations.css') }}">
<script src="{{ asset('permainan/myscript.js') }}" defer></script>
@endsection

@section('content')
<div class="container-xxl py-5">
    <div class="container">

        <!-- Tombol unlock game -->
        <button id="unlockGame" class="btn btn-primary mb-3 text-center" data-id="1">
            Unlock Game
        </button>

        <!-- Container game -->
        <div id="gameContainer" style="display:none;">
            <h1 id="title">Mahjong</h1>
            <div id="startscreenDiv">
                <p>Pilih pengaturan dan tekan tombol MAIN untuk mulai bermain!</p>
                <div id="textContainer">
                    <div id="textLeft">
                        Ukuran Papan: 1
                        <input type="range" id="sizeSlider" min="2" max="6" style="width:128px;" onchange="gimmeTitle();" /> 5
                        <br>
                        Kesulitan: MUDAH
                        <input type="range" id="difficultySlider" min="1" max="3" style="width:128px;" onchange="gimmeTitle();" /> SULIT
                    </div>
                </div>
                <br>
                <input type="button" class="btn btn-primary" value="MAIN" onclick="startGame();" />
            </div>

            <div id="divTable"></div>
            <div id="container">
                <div id="bottomBar" class="bottomBarHidden">
                    <span id="nGButton"></span>
                    <span id="correctMovesCounter"></span>
                    <span id="wrongMovesCounter"></span>
                    <span id="timeCounter"></span>
                </div>
            </div>
        </div>

        <!-- Tampilkan reward user -->
        <div class="mt-3 text-center">
            <strong>Reward kamu: </strong><span id="userReward">{{ Auth::user()->reward }}</span>
        </div>
    </div>
</div>

<script>
    // Unlock game: cuma buka game, tidak kurangi reward
    document.getElementById('unlockGame').addEventListener('click', () => {
        document.getElementById('gameContainer').style.display = 'block';
        document.getElementById('unlockGame').style.display = 'none';
    });

    // Reward saat main game
    function rewardPlay(points) {
        fetch('/reward/' + points, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                alert(`Kamu mendapatkan ${points} reward karena bermain!`);
                document.getElementById('userReward').textContent = data.new_reward;
            }
        })
        .catch(err => console.error(err));
    }

    // Reward saat menang
    function rewardWin(points) {
        fetch('/reward/' + points, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(res => res.json())
        .then(data => {
            if(data.success){
                alert(`Selamat! Kamu mendapatkan tambahan ${points} reward karena menang!`);
                document.getElementById('userReward').textContent = data.new_reward;
            }
        })
        .catch(err => console.error(err));
    }
</script>
@endsection
