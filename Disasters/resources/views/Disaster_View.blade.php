@extends('Base')

@section('content')

<div class="input-group" style="margin-top:20px">
 <form method="post" action="/Disaster_View">
  {{ csrf_field() }}
      <div class="input-group" >

       <input type="text" class="form-control" name= "Iyear" style="padding:20px" placeholder="Year..">
     </div>
     <div class="input-group" style="margin-top:20px">
      <input type="text" class="form-control" name= "Imonth" style="padding:20px" placeholder="Month..">
    </div>
    <div class="input-group" style="margin-top:20px">
     <input type="text" class="form-control" name= "Iday" style="padding:20px" placeholder="Day..">
   </div>
   <div class="input-group" style="margin-top:20px">
    <button type="submit" class="btn btn-success" style="padding:10px">Search</button>
  </div>
    </form>
    </div>
    </div>
    <div class="col-sm-8 text-left">
        @yield('content6')
    </div>
    <div class="col-sm-2 sidenav">

    </div>

  </div>
</div>

</body>

</html>

@endsection
