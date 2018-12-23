@extends ('Govn_Rep')

@section('content1')


<form method="post" action="/Add_Casualty">
  {{ csrf_field() }}

<h3 style="color:white; margin-left:200px;">Incident <select  name="I_name" class="effect"  style="margin-left:290px; color:white; padding-right:60px; padding-top:30px; padding-left:80px"></h3>

      @for ($i = 0; $i < $n ; $i++)

            <h3> <option style="background-color:darkred;" value=" {{ $IDs[$i] }} " >  {{ $Names[$i] }} </option></h3>

            @endfor

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

  <h3> Casualty State:
    <input type="radio" name="Degree" style="margin-left:25px" value="1" >stable
    <input type="radio" name="Degree" style="margin-left:25px" value="2">Critical
    <input type="radio" name="Degree" style="margin-left:25px" value="3"> Dead  </h3>

  <br><br>

  <input class="btn-lg btn-danger"  type="submit" style="text-align:center; margin-left:350px"  >
</form>
