@extends('Cas_Crim_Base')

@section('Cas_Crim')
<h3>Number OF Victims: <input type="number" name="Degree" style="margin-left:39px" ></h3>
<br><br>
<h3>Number OF Crimes: <input type="number" name="Degree" style="margin-left:39px" ></h3>
<br><br>
<h3> Current State:
  <input type="radio" name="gender" style="margin-left:25px" value="Female"  >In Jail
  <input type="radio" name="gender" style="margin-left:25px"   value="male">Free </h3>
 
  <br><br>

@endsection
