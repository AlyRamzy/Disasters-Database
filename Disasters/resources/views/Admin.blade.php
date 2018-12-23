@extends('Base')

@section('content')
       <br>
      <h4><a href="Remove_Users">Remove Person</a></h4>
      <br>
      <h4><a href="Add_Admin">Add Admin</a></h4>
      <br>
      <h4><a href="Main">View Previous Events</a></h4>
      <br>
      <h4><a href="Visibility">Control Information Visibility</a></h4>
      <br>
    </div>
    <div class="col-sm-8 text-left">

    @yield('content1')

    </div>
    <div class="col-sm-2 sidenav">

      </div>
    </div>


@endsection
