@extends('info')

@section('content4')

<h4>All Possible Causes of the Disaster </h4>

<div class="form-group" style="margin-top:17px">

    <textarea class="form-control" type="text" name="rep_txt" required> {{ $DCauses }}</textarea>

  </div>



@endsection
