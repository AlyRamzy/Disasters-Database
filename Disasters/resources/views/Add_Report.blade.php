@extends('Citizen')


@section('content3')

      <h1>Submit a Report</h1>
      <div class="col-sm-6 text-left">

      </div>
        <hr>
        <h3>Write your Report</h3>
      <div class="form-group" style="margin-top:17px">
          <form method="post" action="/Add_Report">
          {{ csrf_field() }}

          <textarea class="form-control" type="text" name="rep_txt" rows="13" required>Enter your text here...</textarea>

          <input type="submit" class="btn btn-success"></input>

          </form>
        </div>

        @endsection
