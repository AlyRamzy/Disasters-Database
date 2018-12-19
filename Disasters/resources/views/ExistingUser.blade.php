@extends('Admin')

@section('content1')

<br>
<br>
<form method="post" action="/citizen_Admin">
{{ csrf_field() }}

<input type="submit" name= "Cname" value="Citizen User" >

</form>
<br>

<form method="post" action="/Govn_Admin">
{{ csrf_field() }}

<input type="submit" name= "Gname" value="Government Representative User" >

</form>
<br>


@endsection
