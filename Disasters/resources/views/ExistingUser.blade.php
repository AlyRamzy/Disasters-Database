@extends('Admin')
@section('img')

style="background-image:url('{{asset('img/admina.png')}}');

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
  padding:10px;
  padding-left:20px;

}

</style>
<br>
<br>


    <form method="post" action="/citizen_Admin"  >
    {{ csrf_field() }}
<h3 style="color:white; margin-left:200px;">Citizens <select  name="Citizen_name" class="effect"  style="margin-left:290px; color:white; padding-right:60px; padding-top:30px; padding-left:80px"></h3>


@for ($i = 0; $i < $n ; $i++)

      <h3> <option style="background-color:darkred;" value=" {{ $SSNs[$i] }} " >  {{ $Names[$i] }} </option></h3>

      @endfor

    </select>

      <button type="submit" class="btn btn-success btn-primary" name="submit"  style="margin-top:10px; pading:15px; color:black">ِAdd</button>
  </form>


<br>

    <form method="post" action="/Govn_Admin">
    {{ csrf_field() }}
  <h3 style="color:white;">Governmaent Representative <select name="Govn_name" class="effect"  style="margin-left:60px; color:white; padding-right:60px; padding-top:30px; padding-left:80px; margin-top:50px;"></h3>

        @for ($i = 0; $i < $s ; $i++)

        <option style="background-color:darkred;"  value="{{ $GSSNs[$i] }} "> {{ $GNames[$i] }}  </option>

      @endfor
    </select>
  <button type="submit" class="btn btn-success btn-primary" name="submit"  style="margin-top:10px; pading:15px; color:black">ِAdd</button>
  </form>


@endsection
