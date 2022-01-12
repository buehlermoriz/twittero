@extends('layouts.app_w_footer')

@section('content')

<div class="row mt-5">
<div class="col-3"></div>
<div class=col-3>
<p>
    Hello {{ Auth::user()->name }} here are your current User data. <br>
    Something wrong? Here you`ve got the chance to view, edit and delete your user.
</p>
</div>
<div class="col-3">
  <a  type="button" href="http://localhost/edituser" class="btn btn-secondary float-left">Edit</a>
<form method="POST" action="{{ route('delete-user', Auth::user()->id)}}" class="float-left">
    @csrf
    {{method_field('DELETE')}}
    <button  type="submit"  class="btn btn-danger float-right mt-3">Delete</button>
</form>

</div>
<div class="col-3"></div>
</div>
<div class="row mt-5">
    <div class="col-3"></div>
    <div class=col-2>
    <div class="card text-center">
  <div class="card-header">
    Username
  </div>
  <div class="card-body">
      <p class="card-text">Your current Username is:</p>
      <h5 class="card-title">{{ Auth::user()->name }}</h5>

  </div>
</div>
    </div>
    <div class=col-2>
    <div class="card text-center">
  <div class="card-header">
    Email
  </div>
  <div class="card-body">
      <p class="card-text">Your current Email is:</p>
      <h5 class="card-title"> {{ Auth::user()->email }}</h5>
  </div>
</div>
    </div>
    <div class=col-2>
    <div class="card text-center">
  <div class="card-header">
    Password
  </div>
  <div class="card-body">
      <p class="card-text">Your current Password is:</p>
      <h5 class="card-title">*****************</h5>
  </div>
  <div class="card-footer text-muted">
That looks wired? Tbh we dont know your password. But you can reset it here.
  </div>
</div>
    </div>
    <div class="col-3"></div>
</div>





@endsection
