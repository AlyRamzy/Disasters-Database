@extends('info')

@section('content4')

<h3>All Possible Causes of the Disaster </h3>
<br>

<div class="form-group" style="margin-top:17px">

   <h4> Disaster Name : </h4>
   <h5>{{  $Dname }} </h5>
    <p> {{ $DCauses }} </p>

  </div>

@endsection
