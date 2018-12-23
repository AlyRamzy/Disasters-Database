@extends('Admin')
@section('img')
style="background-image:url('{{asset('img/admin.jpg')}}');



  background-position: right;
  background-repeat: no-repeat;
  background-size:cover"
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


<br>
<br>
<h3 style="color:white; margin-left:20px;">Add New Admin <a href="Add_Admin"><button type="button" class="btn btn-outline-primary" style = "margin-bottom:15px; margin-left:15px"> Click here</button></a></h3>

<br>

<form method="post" action="/ExistingUser">
{{ csrf_field() }}

<h3 style="color:white; margin-left:20px;">Add existing user<button type="submit" class="btn btn-outline-primary" style = "margin-bottom:15px; margin-left:15px; color:black"> Click here</button></h3>


</form>

<br>


@endsection
