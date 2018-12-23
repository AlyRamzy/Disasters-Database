@extends ('Govn_Rep')

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
<h1 style="text-align:center; color:white; border-radius:50px 0px;">Insert Incident</h1>


<br>


 <form @yield('action') method="POST">
 {{csrf_field()}}
 <h3 style="color:white; ">Type<select    name="disaster" style="margin-left:169px; color:white; padding-left:180px" class="effect" ></h3>
 @foreach ($disasters as $disaster)
    <h3 ><option style="background-color:darkred;" value="{{$disaster["name"]}}" >{{$disaster["name"]}}</option></h3>
   @endforeach
  </select>
  <br><br>
 <h3 style="color:white;">Description: <textarea class="effect" name=" Description" rows="5" cols="40" style="margin-left:86px"></textarea></h3>
  <br><br>
<h3 style="color:white;">Location:<input class="effect" type="text" name="Location" style="margin-left:119px" ><br></h3>
<br><br>
<h3 style="color:white;">Economical Losses: <input class="effect" type="number" name="Economical"><span class="glyphicon glyphicon-euro"></span><br></h3>
<!-- input date  !--><br><br>
<h3 style="color:white;">Date: <input class="effect" type="date" name="Date" style="margin-left:150px" ><br></h3>
<br><br>
@yield('Incident')
<br>
<button type="submit" class="btn btn-success btn-primary" name="submit"  style="margin-top:10px; padding:12px; color:black; margin-left:450px">ِAdd Incident</button>

<div >
<ul>
@foreach ($errors->all() as $error)
<h5 class="alert alert-danger">{{$error}}</h5>
@endforeach
</ul>

</div>
</form>



</div>


@endsection
