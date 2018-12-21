@extends('Admin')

@section('content1')

<div class="container">

<h2 class="alert alert-danger">Add Admin To The Data Base  </h2>

<h3><span class="error"> required field</span></h3>
<br>
<form method="post" action="Add_Admin">
{{ csrf_field() }}
  Name: <input type="text" name="name" style="margin-left:28px" required>
  <span class="error" style="color:red"> *</span>
  <br><br>
  Username: <input type="text" name="username" required>
  <span class="error" style="color:red"> *</span>
  <br><br>
  Password: <input type="password" name="passWord" style="margin-left:6px" required>
  <span class="error" style="color:red"> *</span>
  <br><br>
  SSN: <input type="number" name="ssn" style="margin-left:39px" required>
  <span class="error" style="color:red"> *</span>
  <br><br>
  Address: <input type="text" name="address" style="margin-left:18px">
  <span class="error" style="color:red"></span>
  <br><br>
  Age: <input type="number" name="age" style="margin-left:44px">
  <span class="error" style="color:red"></span>
  <br><br>

  Gender:
  <input type="radio" name="gender" style="margin-left:25px" value="female">Female
  <input type="radio" name="gender" style="margin-left:6px" value="male">Male
  <span class="error" style="color:red"></span>
  <br><br>
  <input type="submit" name="submit"  style="margin-top:10px" value="Submit">
</form>
</div>


@endsection
