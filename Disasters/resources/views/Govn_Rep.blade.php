@extends('Base')

@section('content')
       <br>
      <h4><a href="Review_Reports">Review Reports</a></h4>
      <br>

      <h4><a href="Add_Incident">Add Incident</a></h4>
      <br>

      <form method="post" action="/Id_Names">
      {{ csrf_field() }}
      <h4><button type="submit" class="btn-link" >Add Casuality</button></h4>
      </form>

      <br>

      <form method="post" action="/CId_Names">
      {{ csrf_field() }}
      <h4><button type="submit" class="btn-link" >Add Criminal</button></h4>
      </form>

      <br>
      <h4><a href="/Main">View Previous Events</a></h4>
      <br>
      <h4><a href="#">Current Reports</a></h4>
      <br>
      <h4><a href="/info">Disasters_info</a></h4>
      <br>
      <h4><a href="/Profile_Govn_Rep">Personal Info</a></h4>
      <br>

    <div class="col-sm-8 text-left">
    @yield('content1')

  </div>




@endsection
