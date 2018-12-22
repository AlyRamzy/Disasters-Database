<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

@extends('Base')

@section('content')

<div class="container text-center">
<div class="row">
<div class="col-sm-12">
<h1></h1>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-sm-offset-3">
<p class="text-center">Use the form below to change your password.</p>
<form method="post" action="/change_password">
  {{ csrf_field() }}
<input type="password" class="input-lg form-control" name="password1" id="password1" placeholder="Old Password" autocomplete="off">
<input type="password" class="input-lg form-control" name="password2" id="password2" style="margin-top:19px" placeholder="New Password" autocomplete="off">
<input type="password" class="input-lg form-control" name="password3" id="password2" style="margin-top:19px" placeholder="Repeat Password" autocomplete="off">
<div class="row">
<div class="col-sm-12">
</div>
</div>
<input type="submit" class="btn btn-success" data-loading-text="Changing Password..." style="margin-top:19px" value="Change Password">
</form>
</div><!--/col-sm-6-->
</div><!--/row-->
</div>

@endsection
