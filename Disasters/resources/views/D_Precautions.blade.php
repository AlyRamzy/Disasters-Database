@extends('info')

@section('content4')

<h4>All Possible Precautions of the Disaster </h4>

<div class="form-group" style="margin-top:17px">

    <textarea class="form-control" type="text" name="rep_txt" required> {{ $DPrecautions }}</textarea>

  </div>


@endsection
