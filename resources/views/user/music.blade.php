@extends('layout.master2')
@section('tittle', 'Emoodji - Masukan')
@section('header', 'header4')
@section('page', 'Masukan')
@section('nav_fitur', 'active')

@section('css')
    <link rel="stylesheet" href=" {{ asset('/music/style.css ') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@endsection

@section('content')
<div class="mb-3">
    <span class="badge bg-success">
        Reward: <span id="reward-badge">{{ Auth::user()->reward }}</span> Points
    </span>
</div>

<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Musik</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasRightLabel">Musik</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="main">
        <div class="wrapper">
            <div class="top-bar">
              <i class="material-icons">expand_more</i>
              <span>Now Playing</span>
              <i class="material-icons">more_horiz</i>
            </div>
            <div class="img-area">
              <img src="" alt="">
            </div>
            <div class="song-details">
              <p class="name"></p>
              <p class="artist"></p>
            </div>
            <div class="progress-area">
              <div class="progress-bar">
                <audio id="main-audio" src=""></audio>
              </div>
              <div class="song-timer">
                <span class="current-time">0:00</span>
                <span class="max-duration">0:00</span>
              </div>
            </div>
            <div class="controls">
              <i id="repeat-plist" class="material-icons" title="Playlist looped">repeat</i>
              <i id="prev" class="material-icons">skip_previous</i>
              <div class="play-pause">
                <i class="material-icons play">play_arrow</i>
              </div>
              <i id="next" class="material-icons">skip_next</i>
              <i id="more-music" class="material-icons">queue_music</i>
            </div>
            <div class="music-list">
              <div class="header">
                <div class="row">
                  <i class= "list material-icons">queue_music</i>
                  <span>Music list</span>
                </div>
                <i id="close" class="material-icons">close</i>
              </div>
              <ul>
                <!-- here li list are coming from js -->
              </ul>
            </div>
          </div>
    </div>
  </div>
</div>



<script src=" {{ asset('/music/js/music-list.js ') }}"></script>
<script src="{{ asset('/music/js/script.js ') }}"></script>


@endsection