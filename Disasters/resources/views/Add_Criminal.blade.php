
@extends ('Govn_Rep')

@section('content1')
<div>

<form method="post" action="/Add_Criminal">
  {{ csrf_field() }}

<br><br>

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

  <h3>Number OF Victims: <input type="number" name="num1" style="margin-left:39px" ></h3>
  <br><br>
  <h3>Number OF Crimes: <input type="number" name="num2" style="margin-left:39px" ></h3>
  <br><br>
  <h3> Current State:
    <input type="radio" name="state" style="margin-left:25px" value="jail"  >In Jail
    <input type="radio" name="state" style="margin-left:25px"   value="free">Free </h3>
  <br><br>

  <input class="btn-lg btn-danger"  type="submit" style="text-align:center; margin-left:350px"  >
</form>

</div>
