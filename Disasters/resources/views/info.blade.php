@extends('Base')

@section('content')

      <div class="input-group" >

        <form method="post" action="/info_cause">
        {{ csrf_field() }}

        <input type="text" name = "D_name" style="padding:16px"  placeholder="Disaster Name.."><br>
        <br>
        <button type="submit" class="btn btn-success" style="margin-bottom:10px">Causes</button>
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

        <input type="text" name = "Di_name" style="padding:16px"  placeholder="Disaster Name.."><br>
        <br>
        <button type="submit" class="btn btn-success" style="margin-bottom:10px">Precautions</button>
      </form>

     </div>

    </div>
  </div>
</div>

@endsection
