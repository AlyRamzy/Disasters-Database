
@extends('Base')

@section('content')

<div class="input-group" style="margin-top:20px">
   <p>Causlty Search</p>
</div>
<div class="input-group">
  <form method="post" action="/View_Casaulty">
  {{ csrf_field() }}

 <input type="text" class="form-control" name = "CasaulName" style="padding:20px" placeholder="Name..">

<br>
<div class="input-group" style="margin-top:15px">
<button type="submit" class="btn btn-success" style="margin-top:15px">Search</button>
</div>

</form>
</div>
</div>
<div class="col-sm-8 text-left">
    @yield('content7')
</div>
<div class="col-sm-2 sidenav">

</div>
</div>
</div>

</body>

</html>

@endsection
