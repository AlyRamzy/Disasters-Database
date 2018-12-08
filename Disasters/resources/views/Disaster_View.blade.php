@extends('Base')

@section('content')

      <div class="input-group" >
       <input type="text" class="form-control" style="padding:20px" placeholder="Year..">
     </div>
     <div class="input-group" style="margin-top:20px">
      <input type="text" class="form-control" style="padding:20px" placeholder="Month..">
    </div>
    <div class="input-group" style="margin-top:20px">
     <input type="text" class="form-control" style="padding:20px" placeholder="Day..">
   </div>
   <div class="input-group" style="margin-top:20px">
    <button type="submit" class="btn btn-success" style="padding:10px">Search</button>
  </div>
    </div>
    <div class="col-sm-8 text-left">
    </div>
    <div class="col-sm-2 sidenav">
      <div class="input-group" style="margin-top:20px">
         <p>Causlty Search</p>
      </div>
      <div class="input-group">
       <input type="text" class="form-control" style="padding:20px" placeholder="Name..">
     </div>
     <div class="input-group" style="margin-top:15px">
      <button type="submit" class="btn btn-success" style="padding:10px">Search</button>
    </div>
    </div>
  </div>
</div>

</body>

</html>

@endsection
