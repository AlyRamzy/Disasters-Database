@extends ('Govn_Rep')

@section('content1')
<div >
<h1 style="text-align:center;">Insert Incident</h1>


<br>


 <form action="/Human_Made" method="POST">
 {{csrf_field()}}
 <h3>Type<select  name="disaster" style="margin-left:169px"></h3>
 @foreach ($disasters as $disaster)
    <h3><option value="{{$disaster["name"]}}" >{{$disaster["name"]}}</option></h3>
   @endforeach
  </select>
  <br><br>
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