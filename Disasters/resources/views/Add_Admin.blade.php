@extends('Admin')

@section('img')
style="background-image:url('{{asset('img/new.jpg')}}');



  background-position: center;

  background-repeat: no-repeat;
  background-size: cover;"
@endsection
@section('content1')
<style>

.effect{
  border-radius: 50px 0px;
    background: transparent;
    border: 0px;
    border-bottom: 12px;
    border-color: #ddd;
    border-color: #B1B1B9;
    box-shadow: 6px 10px 16px 11px;
    box-shadow: 10px;
    border-color: eee;
    color:white;
    padding:10px;

}
</style>

<div class="container">

<h2 class="alert alert-danger">Add Admin To The Data Base  </h2>
 <h3 style="color:white; ">required field: <style="margin-left:169px; color:white;"  ></h3>

<br>
<form method="post" action="Add_Admin">
{{ csrf_field() }}
  <h3 style="color:white;">Name: <input type="text" name="name"  required style="margin-left:100px" class="effect"><br></h3>
  <span class="error" style="color:red"> </span>
  <br><br>
  <h3 style="color:white;">Username: <input type="text" name="username" required  required style="margin-left:40px" class="effect"><br></h3>
  <span class="error" style="color:red"> </span>
  <br><br>
  <h3 style="color:white;">Password: <input type="password" name="passWord"  required style="margin-left:40px" class="effect"><br></h3>
  <span class="error" style="color:red"> </span>
  <br><br>
  <h3 style="color:white;">SSN: <input type="number" name="ssn" required style="margin-left:80px" class="effect"><br></h3>
  <span class="error" style="color:red"> </span>
  <br><br>
  <h3 style="color:white;">Address: <input type="text" name="address" style="margin-left:30px" class="effect"><br></h3>
  <span class="error" style="color:red"></span>
  <br><br>
  <h3 style="color:white;">Age: <input type="number" name="age" style="margin-left:60px" class="effect"><br></h3>
  <span class="error" style="color:red"></span>
  <br><br>

  <h3 style="color:white;">Gender:
  <input type="radio" name="gender" style="margin-left:25px" value="female"> Female
  <input type="radio" name="gender" style="margin-left:6px" value="male"> Male
  <span class="error" style="color:red"></span>
  <br><br>
  <button type="submit" class="btn btn-success btn-primary" name="submit"  style="margin-top:10px; pading:15px; color:black">ِAdd</button>
</form>
</div>


@endsection
