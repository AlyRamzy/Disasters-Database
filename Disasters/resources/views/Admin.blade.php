@extends('Base')

@section('img')
style="background-image:url('{{asset('img/ad.jpg')}}');



  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;"
@endsection

@section('content')
       <br>
      <h4><a href="Remove_Users">Remove Person</a></h4>
      <br>
      <h4><a href="Base_Admin">Add Admin</a></h4>
      <br>
      <h4><a href="Disaster_View">View Previous Events</a></h4>
      <br>
      <h4><a href="Visibility">Control Information Visibility</a></h4>
      <br>
      <h4><a href="admin_reports">Reporting Tool</a></h4>
      <br>
      <h4><a href="View_Casaulty">View Casualty</a></h4>
      <br>
    </div>
    <div class="col-sm-8 text-left">

    @yield('content1')

    </div>
    </div>


@endsection
