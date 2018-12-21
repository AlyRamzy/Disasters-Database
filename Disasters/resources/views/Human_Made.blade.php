@extends('Add_Incident_Base')
@section('action')
action="/Human_Made"
@endsection
@section('img')
style="background-image:url('{{asset('img/judgementday_1280.jpg')}}'); 
   
  
  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;"
@endsection

@section('Incident')
<div>
<h3 style="color:white;">Causes: <textarea class="effect" name="Causes" rows="5" cols="40" style="margin-left:120px;"></textarea></h3>
  <br><br>
  </div>
@endsection