@extends('Citizen')

@section('img')
style="background-image:url('{{asset('img/report.jpg')}}');



  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;"
@endsection

<style>

.effect{
  border-radius: 50px 0px;
    background: transparent;
    border: 0px;
    border-bottom: 12px;
    border-color: #ddd;
    border-color: #B1B1B9;
    box-shadow: 6px 10px 16px 11px;
    box-shadow: 10px;
    border-color: eee;
    color:white;
    padding:10px;
    padding-left:20px;
}
</style>


@section('content3')

      <h1>Submit a Report</h1>
      <div class="col-sm-6 text-left">

      </div>
        <hr>
        <h3>Write your Report</h3>
      <div class="form-group" style="margin-top:17px">
          <form method="post" action="/Add_Report">
          {{ csrf_field() }}

          <textarea  type="text" name="rep_txt" rows="13"  cols="150"  style="color:white;" required  class="effect">Enter your text here...</textarea>

          <input type="submit" value="Report " class="btn btn-success" style = "margin-top:10px; "></input>

          </form>
        </div>

        @endsection
