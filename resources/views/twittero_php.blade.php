@extends('layouts.app_w_footer')
@section('content')

<?php

$setHashtag = isset($_GET['hashtag']) ? $_GET['hashtag'] : null;
$setPosts = isset($_GET['posts']) ? $_GET['posts'] : null;
$setRefresh = isset($_GET['refresh']) ? $_GET['refresh'] : null;

if ($setHashtag) {

} else {

    //----------------rnd word -------------------------
    $arr = array("a" => "DHBW", "b" => "Mosbach", "c" => "Onlinemedien", "d" => "Hochschule", "e" => "Odenwald");

// Use shuffle function to randomly assign numeric
// key to all elements of array.
    shuffle($arr);

// Display the first shuffle element of array
    $setHashtag = $arr[0];

    ?>
    <script>
window.onload = function(){
  document.forms['formOne'].submit();
}
</script>
    <?php
}
;

?>
<!-- Inhalt -->
<!----------------- Formular --------------------------->

<form action="twittero" method="get" name="formOne">
<div class="row justify-content-center">
<div class="col-6">
    <label for="hashtag">Hashtag</label>
    <div class="input-group">
      <div class="input-group-text">#</div>
      <input type="text" class="form-control" name="hashtag" placeholder="Hashtag" value="<?=$setHashtag?>">
    </div>
</div>
<div class="row mt-4 justify-content-center">
  <div class="col-3">
  <label for="refreshtime" class="form-label">Refreshtime:  <?php echo ($setRefresh); ?></label>
<input type="range" class="form-range" min="5" max="45" step="5" name="refresh" value="<?=$setRefresh?>">
  </div>
  <div class="col-3">
  <label for="posts" class="form-label">Posts:  <?php echo ($setPosts); ?></label>
<input type="range" class="form-range" min="1" max="15" step="1" name="posts" value="<?=$setPosts?>">
  </div>
</div>
</form>

<div class="row mt-4 justify-content-center">
<div class="col-6">
<p class="btn btn-primary"  id="getTweetss">get Tweets</p>
</div>
<div class="text-right" id="result">
</div>


<!---------------AJAX-------------------->
<script>

//-----Access GET Parameter -----------------
const paramsString = window.location.search;
let searchParams = new URLSearchParams(paramsString);

//-----Transform Refreshtime-----------------
let timeout = searchParams.get('refresh')+'000';
//--------------Start Request-----------------
$('#getTweetss').on('click',function(){
  $.ajax({
url : '{{ route('twitter-controller') }}',
type : 'GET',
data:{
  "hashtagAjax": searchParams.get('hashtag'),
  "postsAjax": searchParams.get('posts')
},
success : function(data) {
    $('#result').html(data);
},
error : function(request,error)
{
    alert("AJAX Error");
}
});
setTimeout(arguments.callee, timeout);
})
</script>
@endsection
