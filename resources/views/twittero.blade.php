@extends('layouts.app_w_footer')
@section('content')

    <script>
//-------------variables to safe Input----------------
var hashtag;
var post;
var refresh;

//-----------Check URL param --------------------------
//const paramsString = window.location.search;
//let searchParams = new URLSearchParams(paramsString);

window.onload = function(){
//-----------Random Word for first Search -------------
  var things = ["DHBW", "Mosbach", "Onlinemedien", "Hochschule", "Odenwald"];
  hashtag = things[Math.floor(Math.random()*things.length)];
  document.getElementById("inputHashtag").setAttribute('value',hashtag);
  post = 5;

  $.ajax({
url : '{{ route('twitter-controller') }}',
type : 'GET',
data:{
  "hashtagAjax": hashtag,
  "postsAjax": post
},
success : function(data) {
    $('#result').html(data);
},
error : function(request,error)
{
    alert("Das hat wohl nicht geklappt. Bitte laden sie die Seite neu. Achten sie darauf nur ein Wort zu verwenden");
}
});}

</script>
<!-- Inhalt -->
<!----------------- Formular --------------------------->

<form>
<div class="row justify-content-center">
<div class="col-6">
    <label for="hashtag">Hashtag</label>
    <div class="input-group">
      <div class="input-group-text">#</div>
      <input type="text" class="form-control" id="inputHashtag"  placeholder="Hashtag">
    </div>
</div>
<div class="row mt-4 justify-content-center">
  <div class="col-3">
  <label for="refreshtime" class="form-label">Refreshtime </label>
<input type="range" id="inputRefresh" class="form-range" min="5" max="45" step="5" >
  </div>
  <div class="col-3">
  <label for="posts" class="form-label">Posts</label>
<input type="range" id="inputPosts" class="form-range" min="1" max="15" step="1" >
  </div>
</div>
</form>

<div class="row mt-4 justify-content-center">
<div class="col-6">
<p class="btn btn-primary"  id="getTweetss">get Tweets</p>
<div  id="result">
</div>
</div>


<script>

//---------------AJAX--------------------
//--------------Start Request-----------------
$('#getTweetss').on('click',function(){

hashtag = document.getElementById('inputHashtag').value;
post = document.getElementById('inputPosts').value;
refresh = document.getElementById('inputRefresh').value;

  $.ajax({
url : '{{ route('twitter-controller') }}',
type : 'GET',
data:{
  "hashtagAjax": hashtag,
  "postsAjax": post
},
success : function(data) {
    $('#result').html(data);
},
error : function(request,error)
{
  if(confirm('GLÜCKWUNSCH - Sie haben den Fehler gefunden, welchen ich nicht lösen konnte. Manche Wörter gehen und manche nicht. Falls Sie eine Lösung finden melden Sie sich gerne bei mir.'))
  {
    window.location.reload();
}
}
});
let timeout = refresh+'000';
console.log(timeout);
setTimeout(arguments.callee, timeout);
})
</script>
@endsection
