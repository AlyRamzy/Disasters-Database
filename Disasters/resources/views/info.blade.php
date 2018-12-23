@extends('Base')

@section('img')
style="background-image:url('{{asset('img/casualty.jpg')}}');



  background-position: left;
  background-repeat: no-repeat;
  background-size: cover;"
@endsection
@section('content')
<style>

.effect{
  border-radius: 20px 0px;
    background: transparent;
    border: 0px;
    border-bottom: 12px;
    border-color: #ddd;
    border-color: #B1B1B9;
    box-shadow: 6px 10px 28px 11px;
    box-shadow: 8px;
    border-color: eee;
    color:white;
    padding:20px;
    margin-top: 40px;

}
</style>


      <div class="input-group" >

        <form method="post" action="/info_cause">
        {{ csrf_field() }}

<input class="effect" type="text" name = "D_name" style="margin-left:5px; margin-bottom:40px; color:black"  placeholder="Disaster Name.."><br>

        <br>
        <button type="submit" class="btn btn-success" style="margin-bottom:10px; padding:12px">Causes</button>
      </form>

     </div>

    </div>
    <div class="col-sm-8 text-left">

    @yield('content4')

    </div>
    <div class="col-sm-2 sidenav">

      <div class="input-group" >

        <form method="post" action="/info_precautions">
        {{ csrf_field() }}

        <input class="effect" type="text" name = "Di_name" style="margin-left:5px; margin-bottom:40px; color:black"  placeholder="Disaster Name.."><br>
        <br>
        <button type="submit" class="btn btn-success" style="margin-bottom:10px; padding:12px">Precautions</button>
      </form>

     </div>

    </div>
  </div>
</div>

@endsection
