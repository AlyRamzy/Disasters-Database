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



<div>
<h3 style="text-align:center; color:black; border-radius:50px 0px" >Casualty Search</h3>


  <form method="post" action="/View_Casaulty">
  {{ csrf_field() }}

<input class="effect" type="text" name = "CasaulName" style="margin-left:5px; margin-bottom:50px; color:black"  placeholder="Casualty Name.."><br>
<br>
<div class="input-group">
<button type="submit" class="btn btn-success" style="margin-top:15px; padding:10px">Search</button>
</div>

</form>

    @yield('content7')
</div>

</div>
</div>

</body>

</html>

@endsection
