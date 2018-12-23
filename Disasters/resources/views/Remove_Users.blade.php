@extends('Admin')
@section('img')
style="background-image:url('{{asset('img/shutterstock_586784021(1).jpg')}}'); 
  
  
  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;"
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
    padding:10px;
}
</style>



<div  >

<h1 style="text-align:center; color:white; border-radius:50px 0px;">Remove User From The Site  </h1>

<h3 style="text-align:center; color:white; border-radius:50px 0px;">Please Choose The User You Want To Remove</h3>

<form method="post" style="margin-top:30px c" action="Remove_Users">
{{csrf_field()}}
<br><br><br><br>
<h3 style="color:white; margin-left:169px;">User<select   name="user" style="margin-left:169px; color:white;" class="effect" ></h3>
   
    @for($x=0;$x<count($users['name']);$x++)
    {
    <h3 ><option style="background-color:darkred;" value="{{$users['ssn'][$x]}}" >{{$users['name'][$x]}} : {{$users['ssn'][$x]}}</option></h3>
    }
    @endfor
    
  </select>

  <br><br><br><br>
  <input class="btn-lg btn-danger" value="Remove" type="submit" style="text-align:center; margin-left:200px"  >

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
