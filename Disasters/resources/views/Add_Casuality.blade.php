@extends ('Govn_Rep')

@section('img')
style="background-image:url('{{asset('img/cas.jpg')}}');



  background-position: center;
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

<form method="post" action="/Add_Casualty">
  {{ csrf_field() }}

<h3 style="color:white; margin-left:20px;">Incident <select required  name="I_name" class="effect"  style="margin-left:60px; color:white; padding-right:90px; padding-top:30px; padding-left:100px"></h3>

      @for ($i = 0; $i < $n ; $i++)

            <h3> <option style="background-color:darkred;" value=" {{ $IDs[$i] }} " >  {{ $Names[$i] }} </option></h3>

    @endfor
</select>
<br><br>

<h3 style="color:white;">Name: <input type="text" required name="name" class="effect" style="margin-left:28px; color:white;" ></h3>
  <br><br>

  <h3 style="color:white;">SSN: <input type="number" required name="ssn"  class="effect" style="margin-left:39px; color:white;" ></h3>

  <br><br>
  <h3 style="color:white;">Address: <input type="text"  name="address" class="effect" style="margin-left:0px; color:white;" >

  <br><br>
  <h3 style="color:white;">Age: <input type="number"  name="age"  class="effect" style="margin-left:44px; color:white;" ></h3>

  <br><br>

 <h3 style="color:white;"> Gender:
  <input type="radio" name="gender" style="margin-left:25px; color:white;" value="Female"  > Female
  <input type="radio" name="gender" style="margin-left:6px; color:white;"   value="male"> Male</h3>

  <br><br>

  <h3 style="color:white;"> Casualty State:
    <input type="radio" name="Degree" style="margin-left:25px; color:white;" value="1" > stable
    <input type="radio" name="Degree" style="margin-left:25px; color:white;" value="2"> Critical
    <input type="radio" name="Degree" style="margin-left:25px; color:white;" value="3"> Dead  </h3>

  <br><br>

  <button type="submit" class="btn btn-success btn-primary" name="submit"  style="margin-top:10px; padding:12px; color:black; margin-left:450px">ِ Add Casualty</button>

</form>

</div>




@endsection
