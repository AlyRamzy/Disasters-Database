@extends('Base')

@section('img')
style="background-image:url('{{asset('img/Causes.jpg')}}');



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
    margin-top: 10px;

}
</style>



<div class="input-group" style="margin-top:20px">
 <form method="post" action="/Disaster_View">
  {{ csrf_field() }}
      <div class="input-group" >
<input class="effect" type="text" name = "Iyear" style="margin-left:5px; margin-bottom:5px; color:black"  placeholder="Year.. "><br>

     </div>
     <div class="input-group" style="margin-top:20px">
       <input class="effect" type="text" name = "Imonth" style="margin-left:5px; margin-bottom:4px; color:black"  placeholder="Month.. "><br>

    </div>
    <div class="input-group" style="margin-top:20px">
      <input class="effect" type="text" name = "Iday" style="margin-left:5px; margin-bottom:30px; color:black"  placeholder="Day.. "><br>

   </div>
   <div class="input-group" style="margin-top:20px">
    <button type="submit" class="btn btn-success" style="padding:10px">Search</button>
  </div>
    </form>

    </div>

    </div>
    <div class="col-sm-8 text-left">
      <h1 style="text-align:center; color:blue; border-radius:50px 0px;">Search for a specific incident  </h1>

        @yield('content6')
    </div>

    <div class="col-sm-2 sidenav">

    </div>

  </div>
</div>

</body>

</html>

@endsection
