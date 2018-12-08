@extends('Base')

@section('content')
       <br>
      <h4><a href="Review_Reports">Review Reports</a></h4>
      <br>
      <h4><a href="Add_Incident">Add Incident</a></h4>
      <br>
      <h4><a href="/Main">View Previous Events</a></h4>
      <br>
      <h4><a href="#">Current Reports</a></h4>
      <br>
      <h4><a href="/info">Disasters_info</a></h4>
      <br>
    </div>
    <div class="col-sm-8 text-left">

    @yield('content1')

    </div>
    <div class="col-sm-2 sidenav">

      </div>
    </div>


@endsection
