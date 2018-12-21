@extends('Admin')

@section('content1')

<br>
<br>
<a href="Add_Admin"><button type="button" class="btn btn-primary btn-lg" style = "margin-bottom:15px">Add New Admin</button></a>

<br>

<form method="post" action="/ExistingUser">
{{ csrf_field() }}

<button type="submit" class="btn btn-primary btn-lg"> add existing user </button>

</form>

<br>


@endsection
