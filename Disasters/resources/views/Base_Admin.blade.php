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
<h1><a href="Add_Admin" style="margin-left:30px;color:white;">Add New Admin</a></h1>

<br>

<form method="post" action="/ExistingUser">
{{ csrf_field() }}

<h1><button type="submit" class="btn-link" style="margin-left:20px;color:white;">Add Existing User</button></h1>


</form>

<br>


@endsection
