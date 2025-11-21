@extends('layout.master2')
@section('tittle', 'Emoodji - Game Puzzle')
@section('header', 'header1')
@section('page', 'Permainan')
@section('nav_fitur', 'active')

@section('css')
    <link rel="stylesheet" href="{{ asset('permainan/Puzzle.css') }}">
    <script src="{{ asset('permainan/Puzzle.js') }}" defer></script>
@endsection

@section('content')
<div class="py-5 container-xxl">
    <div class="container">
        <div class="cover-screen">
            <p id="result"></p>
            {{-- <button id="start-button" class="btn btn-primary">Mulai Permainan</button> --}}
            <button id="start-button" type="button" class="btn btn-primary">Mulai Permainan</button>

        </div>

        <h1 id="moves"></h1>

        <div class="slider-game">
            <div class="kotak"></div>
            <div class="original-image">
                <img src="/permainan/original_image.png" alt="" />
            </div>
        </div>

        <div class="mt-3">
            <strong>Reward kamu: </strong><span id="userReward">{{ Auth::user()->reward }}</span>
        </div>
    </div>
</div>

<script>
    // Reward user
    function rewardUser(points) {
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
</script>
@endsection
