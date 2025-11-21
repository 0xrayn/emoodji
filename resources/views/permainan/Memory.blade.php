@extends('layout.master2')
@section('tittle', 'Emoodji - Memory Game')
@section('header', 'header1')
@section('page', 'Permainan')
@section('nav_fitur', 'active')

@section('css')
    <link rel="stylesheet" href="{{ asset('permainan/memory.css') }}">
    <script src="{{ asset('permainan/memory.js') }}" defer></script>
@endsection

@section('content')
<div class="main">
    <div class="title">
        <h1 class="tengah">Memory Game</h1>
    </div>
    <div class="timer center-timer">
        <button id="time" disabled></button>
    </div>
    <div class="content">
        <button id="startButton" onclick="startGameWithReward()" class="btn btn-primary">Click to Start!</button>
        <div class="blocks"></div>
        <button id="resetButton" onclick="resetGame()" class="btn btn-primary">Reset Game</button>
    </div>

    <!-- Tampilkan reward user -->
    <div class="mt-3">
        <strong>Reward kamu: </strong><span id="userReward">{{ Auth::user()->reward }}</span>
    </div>
</div>

<script>
    // Reward saat mulai main
    function rewardPlay(points){
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
                document.getElementById('userReward').textContent = data.new_reward;
            }
        })
        .catch(err => console.error(err));
    }

    // Reward saat menang
    function rewardWin(points){
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
                alert(`Kamu mendapatkan ${points} reward!`);
                document.getElementById('userReward').textContent = data.new_reward;
            }
        })
        .catch(err => console.error(err));
    }

    // Fungsi wrapper untuk start game + reward main
    function startGameWithReward(){
        rewardPlay(5); // misal reward main = 5
        startGame();   // panggil fungsi asli dari memory.js
    }
</script>
@endsection
