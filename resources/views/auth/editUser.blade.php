@extends('layouts.app_w_footer')

@section('content')


<div class="row mt-5">
  <div class="col-3"></div>
  <!-- Username ----------------------------------------------->
  <div class=col-2>
    <div class="card text-center">
      <div class="card-header">
        Username
      </div>
      <div class="card-body">
        <p class="card-text">Your current Username is:</p>
        <h5 class="card-title">{{ Auth::user()->name }}</h5>
        <label class="mt-3" for="newUsername">new Username</label>
        <input type="text" class="form-control" id="newUsername" placeholder="new Username" required>
      </div>
    </div>
  </div>
  <!-- Email ----------------------------------------------->
  <div class=col-2>
    <div class="card text-center">
      <div class="card-header">
        Email
      </div>
      <div class="card-body">
          <p class="card-text">Your current Email is:</p>
          <h5 class="card-title"> {{ Auth::user()->email }}</h5>
          <label class="mt-3" for="newEmail">new Email</label>
        <input type="email" class="form-control" id="newEmail" placeholder="new Email" required>
      </div>
    </div>
  </div>
  <!-- Password ----------------------------------------------->
  <div class=col-2>
    <div class="card text-center">
      <div class="card-header">
        Password
      </div>
      <div class="card-body">
          <p class="card-text">Your current Password is:</p>
          <h5 class="card-title">*****************</h5>
          <label class="mt-3" for="newPassword">new Password</label>
          <input type="password" class="form-control" id="newPassword" placeholder="new Password" required>
      </div>
      <div class="card-footer text-muted">
        That looks wired? Tbh we dont know your password. But you can reset it here.
      </div>
    </div>
  </div>
</div>
<div class="row mt-5">
  <div class="col-3"></div>
  <div class="col-6">
    <button id="updateUser"  type="button"  class="btn btn-success">Submit</button>
  </div>
</div>
<div class="text-right" id="result">
<script>

//---------------AJAX--------------------
//--------------Start Request-----------------
$('#updateUser').on('click',function(){



name = document.getElementById('newUsername').value;
email = document.getElementById('newEmail').value;
password = document.getElementById('newPassword').value;



if(name == null){
  name = "{{ Auth::user()->name }}";
};
if(email == null){
  email = "{{ Auth::user()->email }}";
};
if(password == null){
  password = "{{ Auth::user()->password }}";
};




id = {{ Auth::user()->id }};

console.log("success");
  $.ajax({
url : '{{ route('edit-user-ajax') }}',
type : 'GET',
data:{
  "name": name,
  "email": email,
  "password": password,
  "id": id


},
success : function(data) {
    $('#result').html(data);
},
error : function(request,error)
{
    alert("Error Versuchter Name" + name +" versuchtes Password " +password +" versuchte Email " + email);
}
});
})
</script>


@endsection
