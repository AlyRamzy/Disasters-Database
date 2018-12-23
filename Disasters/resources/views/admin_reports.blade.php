@extends('Admin')

@section('content1')

<br>
<h4>
 <form action="/overall_report" method="post">
   {{ csrf_field() }}
   <button type="submit" name="overall_report" value="overall_report" class="btn-link" style="margin-top:12px"> Overall Report</button>
 </form>
</h4>
<h4>
 <form action="/user_report" method="post">
   {{ csrf_field() }}
   <button type="submit" name="user_report" value="user_report" class="btn-link" style="margin-top:12px"> User Report</button>
 </form>
</h4>
<h4>
 <form action="/incident_report" method="post">
   {{ csrf_field() }}
   <button type="submit" name="incident_report" value="incident_report" class="btn-link" style="margin-top:12px"> Incident Report</button>
 </form>
</h4>
<h4>
 <form action="/recent_report" method="post">
   {{ csrf_field() }}
   <button type="submit" name="recent_report" value="recent_report" class="btn-link" style="margin-top:12px"> Recent Report</button>
 </form>
</h4>
</div>
<div class="col-sm-8 text-left">

@endsection
