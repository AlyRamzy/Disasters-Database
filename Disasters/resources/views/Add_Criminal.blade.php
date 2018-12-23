@extends ('Govn_Rep')

@section('img')
style="background-image:url('{{asset('img/criminal.jpg')}}');



  background-position: left;
  background-repeat: no-repeat;
  background-size:cover"
@endsection

@section('content1')
<style>

.effect{
  border-radius: 50px 0px;
    background: transparent;
    border: 0px;
    border-bottom: 12px;
    border-color: #ddd;
    border-color: #B1B1B9;
    box-shadow: 6px 10px 16px 11px;
    box-shadow: 10px;
    border-color: eee;
    color:white;
    padding:20px;
}
</style>
<div >

<form method="post" action="/Add_Criminal">
  {{ csrf_field() }}

<br><br>

<h3 style="color:white; margin-left:10px;">Incident <select required name="I_name" class="effect"  style="margin-left:60px; color:white; padding-right:90px; padding-top:30px; padding-left:100px"></h3>

      @for ($i = 0; $i < $n ; $i++)

            <h3> <option style="background-color:darkred;" value=" {{ $IDs[$i] }} " >  {{ $Names[$i] }} </option></h3>

            @endfor
</select>
<br><br>

<h3 style="color:white;">Name: <input type="text" required name="name" class="effect"  style="margin-left:28px" ></h3>
<span class="error" style="color:red"> </span>
  <br><br>

<h3 style="color:white;">SSN: <input type="number" required name="ssn" class="effect" style="margin-left:39px; " ></h3>
<span class="error" style="color:red"> </span>
  <br><br>
  <h3 style="color:white;">Address: <input type="text" name="address" class="effect" style="margin-left:0px" >

  <br><br>
<h3 style="color:white;">Age: <input type="number" name="age" class="effect" style="margin-left:44px" ></h3>

  <br><br>

 <h3 style="color:white;"> Gender:
  <input type="radio" name="gender" style="margin-left:25px" value="Female"  >Female
  <input type="radio" name="gender" style="margin-left:6px"   value="male">Male</h3>

  <br><br>

<h3 style="color:white;">Number OF Victims: <input type="number" class="effect" name="num1" style="margin-left:39px" ></h3>
  <br><br>
<h3 style="color:white;">Number OF Crimes: <input type="number" class="effect" name="num2" style="margin-left:39px" ></h3>
  <br><br>
  <h3 style="color:white;"> Current State:
    <input type="radio" name="state" style="margin-left:25px" value="jail"  >In Jail
    <input type="radio" name="state" style="margin-left:25px"   value="free">Free </h3>
  <br><br>

  <button type="submit" class="btn btn-success btn-primary" name="submit"  style="margin-top:10px; padding:12px; color:black; margin-left:450px">ِAdd Criminal</button>

</form>

</div>

@endsection
