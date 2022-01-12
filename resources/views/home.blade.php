@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{{ URL::asset('css/home.css') }}" />
<!-- Content -->
<div class="row align-items-center">
<div class="col-lg" align="center">
@guest
@if (Route::has('login'))
<h1>Welcome to Twittero</h1>
<h6>Your Simple Twitter Monitoring Software</h6>
@endif
@else
<h1>Hello  {{ Auth::user()->name }}</h1>
<h6>Welcome to Twittero - Your Simple Twitter Monitoring Software</h6>
@endguest
</div>
<div class="col-lg" align="center">
<img src="{{ asset('img/twitter_gif.gif') }}" alt="Twittero Logo">
</div>
</div>
<div class="row">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#00ACEE" fill-opacity="1" d="M0,128L80,117.3C160,107,320,85,480,90.7C640,96,800,128,960,144C1120,160,1280,160,1360,160L1440,160L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
</svg>
</div>
<div class="row blue text-light justify-content-center text-center ">
<div class="col-4">
 <img src="{{ asset('img/live-news.png') }}" alt="Twittero Logo"  width="220">
<h3 class="mt-5">Livestream </h3>
<p>Stream live Tweets and <br>
decide how much and what you <br>
want to see.</p>
</div>
<div class="col-4">
<img src="{{ asset('img/insurance.png') }}" alt="Twittero Logo"  width="220">
<h3 class="mt-5">Secure</h3>
<p>Use Twitter without any <br>
personal informations.</p>
</div>
<div class="col-4">
<img src="{{ asset('img/tap.png') }}" alt="Icon Easy to Use"  width="220">
<h3 class="my-5">Easy</h3>
<p>Twittero is the easiest tool <br>
on the Web to Stream Tweets.</p>
</div>
</div>
<!-- This Divider gives the Page some White- (blue) space -->
<div class="row divider-100 blue"></div>
<div class="row blue text-light justify-content-center text-center">
<div class="col">
<a type="button" class="btn btn-outline-light btn-lg" role="button" href="http://localhost/twittero">Lets Go!</a>
<p class="my-5">That sounds like a good Idea? Let`s try it out. It´s totally free, <br>
 we wont save your data and you´re free to leave whenever you want</p>
</div>
</div>
<!-- This Divider gives the Page some White- (blue) space -->
<div class="row divider-250 blue"></div>
<div class="row blue text-light justify-content-center text-center">
<div class="col">
<p>DHBW-Mosbach</p>
</div>
<div class="col">
<p>©Moriz Bühler 2021</p>
</div>
<div class="col">
<p>T4:Webdevelopement</p>
</div>
</div>
@endsection
