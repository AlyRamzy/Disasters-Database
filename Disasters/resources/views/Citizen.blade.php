@extends('Base')

@section('img')
style="background-image:url('{{asset('img/citizen.jpg')}}');



  background-position: up;
  background-repeat: no-repeat;
  background-size: cover;"
@endsection

@section('content')
<br>
<h4><a href="Asking">Ask a question</a></h4>
<br>
<h4><a href="Add_Report">Reporting</a></h4>
<br>
<h4><a href="Disaster_View">View Previous Events</a></h4>
<br>
<h4><a href="View_Casaulty">View Casualty</a></h4>
<br>
</div>
<div class="col-sm-8 text-left">


@yield('content3')


</div>



@endsection
