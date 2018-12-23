@extends('Add_Incident_Base')
@section('img')
style="background-image:url('{{asset('img/wallpaper-1506954.jpg')}}'); 
  
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  
  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;"
@endsection
@section('action')
action="/Natural"
@endsection


@section('Incident')
<h3 style="color:white;" >Frequency:<input class="effect"  type="number" name="Frequency" style="margin-left:95px; "><br></h3><br><br>
<h3 style="color:white;">Physical Parameters:<input class="effect" type="text" name="Physical Parameters"><br></h3>
<br><br>

@endsection