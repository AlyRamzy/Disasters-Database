@extends('Admin')

@section('img')
style="background-image:url('{{asset('img/wallpaper-1506954.jpg')}}');

  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;


  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;"
@endsection
@section('content1')
<style>
.profile-card {
  background: #FFB300;
  width: 56px;
  height: 56px;
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 2;
  overflow: hidden;
  opacity: 0;
  margin-top: 70px;
  margin-left:110px;


  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-border-radius: 50%;
  border-radius: 50%;
  box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.16), 0px 3px 6px rgba(0, 0, 0, 0.23);
  animation: init 0.5s 0.2s cubic-bezier(0.55, 0.055, 0.675, 0.19) forwards,
             moveDown 1s 0.8s cubic-bezier(0.6, -0.28, 0.735, 0.045) forwards,
             moveUp 1s 1.8s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards,
             materia 0.5s 2.7s cubic-bezier(0.86, 0, 0.07, 1) forwards;
}


@keyframes init {
  0% {
    width: 0px;
    height: 0px;
  }
  100% {
    width: 56px;
    height: 56px;
    margin-top: 0px;
    opacity: 1;
  }
}

@keyframes moveDown {
  0% {
    top: 10%;
  }
  50% {
    top: 25%;
  }
  100% {
    top: 50%;
  }
}

@keyframes moveUp {
  0% {
    background: #FFB300;
    top: 100%;
  }
  50% {
    top: 40%;
  }
  100% {
    top: 30%;
    background: #E0E0E0;
  }
}

@keyframes materia {
  0% {
    background: #E0E0E0;
  }
  50% {
    border-radius: 4px;
  }
  100% {
    width: 1000px;
    height: 600px;
    background: #000000;
    border-radius: 4px;
    padding-bottom:1100px;
    border-radius: 50px 0px;
    background: transparent;
    border: 0px;
    border-bottom: 12px;
    border-color: #ddd;
    border-color: #B1B1B9;
    box-shadow: 6px 10px 16px 11px;
    box-shadow: 10px;
    border-color: eee;

    padding:10px;
  }
}
</style>
<div>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<aside class="profile-card" >
<h1 style="text-align:center; color:white;">Website Admin Information</h1>
<hr><br>
<h3 style="color:white;">SSN: {{$admin['ssn']}}</h3>
<hr style="display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;"><br>
<h3 style="color:white;">Name: {{$admin['name']}} </h3>
<hr style="display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;"><br>
<h3 style="color:white;">Age: {{$admin['age']}}</h3>
<hr style="display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;"><br>
<h3 style="color:white;">Gender: {{$admin['gender']}}</h3>
<hr style="display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;"><br>
<h3 style="color:white;">Address: {{$admin['address']}}</h3>
<hr style="display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;"><br>
<h3 style="color:white;">User Name: {{$admin['username']}}</h3>
<hr style="display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;"><br>
<h3 style="color:white;">Password: <a href="/change_password"> Change Password</h3>
<hr style="display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;"><br>
<h3 style="color:white;">Number Of Banned User: {{$admin['no_banned_users']}}</h3>
<hr style="display: block;
    height: 1px;
    border: 0;
    border-top: 1px solid #ccc;
    margin: 1em 0;
    padding: 0;"><br>
<h3 style="color:white;">Number Of Added Admin: {{$admin['no_added_admins']}}</h3>


</aside>
</div>
@endsection
