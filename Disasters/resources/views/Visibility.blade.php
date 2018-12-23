@extends('Admin')

@section('content1')
<h1>Visibility Controller</h1>
<div class="col-sm-6 text-left">

</div>
  <hr>
  <h3>Check The Field You Want To Toggle Its Visibility From Incident Display</h3>
  <div class="custom-control custom-checkbox" style="margin-top:25px">
    <form method="post" action="/toggle_visible">
    {{ csrf_field() }}
    <div class="checkbox">
      <label><input type="checkbox" name="eco_loss" value = "eco_loss"> Economical Loss</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="year" value = "year"> Year</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="month" value = "month"> Month</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="day" value = "day"> Day</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="description" value = "description"> Description</label>
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="location" value = "location"> Location</label>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top:15px">Toggle Visibility</button>
    </form>
</div>


@endsection
