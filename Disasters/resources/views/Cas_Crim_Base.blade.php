@extends ('Govn_Rep')

@section('content1')
<div  >
<form method="post" action="">
<br><br>
<div class="row">
  <div class="col-sm-4"><h3>Please Choose Incident: </h3></div>
  <div class="col-sm-4">
  <div class="dropdown">
  <button class="btn btn-primary dropdown-toggle btn-lg " type="button " data-toggle="dropdown">Incident 
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#">Unknown</a></li>
    <li><a href="#">Unknown</a></li>
    <li><a href="#">Unknown</a></li>
  </ul>
</div>
</div>
</div>

<br>

<h3>Name: <input type="text" name="name" style="margin-left:28px" ></h3>
  <br><br>
 
  <h3>SSN: <input type="number" name="ssn" style="margin-left:39px" ></h3>

  <br><br>
  <h3>Address: <input type="text" name="address" style="margin-left:0px" >
  
  <br><br>
  <h3>Age: <input type="number" name="age" style="margin-left:44px" ></h3>
  
  <br><br>

 <h3> Gender:
  <input type="radio" name="gender" style="margin-left:25px" value="Female"  >Female
  <input type="radio" name="gender" style="margin-left:6px"   value="male">Male</h3>
 
  <br><br>
  @yield('Cas_Crim')
  <input class="btn-lg btn-danger"  type="submit" style="text-align:center; margin-left:350px"  >
</form>

</div>


@endsection