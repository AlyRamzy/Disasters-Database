@extends ('Govn_Rep')

@section('content1')
<div >
<h1 style="text-align:center;">Insert Incident</h1>
<div class="row">
  <div class="col-sm-1"><h3>Type</h3></div>
  <div class="col-sm-4">
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn-lg " type="button " data-toggle="dropdown">Disaster 
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">Volcano</a></li>
    <li><a href="#">Earth Quake</a></li>
    <li><a href="#">Fire</a></li>
  </ul>
</div>
</div>
</div>

<br>


 <form action="welcome.php" method="post">
 <h3>Description: <textarea name=" Description" rows="5" cols="40" style="margin-left:86px"></textarea></h3>
  <br><br>
<h3>Location:<input type="text" name="Location" style="margin-left:119px"><br></h3>
<br><br>
<h3>Economical Losses: <input type="number" name="Economical"><span class="glyphicon glyphicon-euro"></span><br></h3>
<!-- input date  !--><br><br>
<h3>Date: <input type="date" name="Date" style="margin-left:150px"><br></h3>
<br><br>
@yield('Incident')
<br>
<input class="btn-lg btn-danger"  type="submit" style="text-align:center; margin-left:350px"  >
</form> 
  


</div>


@endsection