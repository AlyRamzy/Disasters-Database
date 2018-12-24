@extends('Base')

@section('img')
style="background-image:url('{{asset('img/gov.jpg')}}');



  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;"
@endsection

@section('content')
       <br>
      <h4>
        <form action="/Review_Reports" method="post">
          {{ csrf_field() }}
          <button type="submit" name="review_report" value="review_report" class="btn-link" style="margin-top:12px"> Review Report</button>
        </form>
      </h4>
      <br>

      <h4>
        <form action="/Add_Incident" method="get">
          {{ csrf_field() }}
          <button type="submit" name="add_incident" value="add_incident" class="btn-link" style="margin-top:12px"> Add Incident</button>
        </form>
      </h4>
      <br>
      <h4>
        <form action="/Id_Names" method="post">
          {{ csrf_field() }}
          <button type="submit" name="add_casualty" value="add_casualty" class="btn-link" style="margin-top:12px"> Add Casualty</button>
        </form>
      </h4>
      <br>
      <h4>
        <form action="/CId_Names" method="post">
          {{ csrf_field() }}
          <button type="submit" name="add_criminal" value="add_criminal" class="btn-link" style="margin-top:12px"> Add Criminal</button>
        </form>
      </h4>
      <br>
      <h4>
        <form action="/Disaster_View" method="get">
          {{ csrf_field() }}
          <button type="submit" name="view_report" value="view_report" class="btn-link" style="margin-top:12px"> View Previous Events</button>
        </form>
      </h4>
      <br>
      <h4><a href="govn_rep_reports"> Reporting Tool</a></h4>
      <br>
      <h4><a href="/Govn_View_Disc"> Discussions </a></h4>
      <br>
      <h4><a href="View_Casaulty">View Casualty</a></h4>
      <br>
</div>

    <div class="col-sm-8 text-left">
    @yield('content1')

    </div>


@endsection
