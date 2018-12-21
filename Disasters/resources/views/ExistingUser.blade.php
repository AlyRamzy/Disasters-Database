@extends('Admin')

@section('content1')

<br>
<br>


<div class="form-group">


    <form method="post" action="/citizen_Admin"  >
    {{ csrf_field() }}
<select  name="Citizen_name" style = "padding:10px">


@for ($i = 0; $i < $n ; $i++)

      <h3> <option value=" {{ $SSNs[$i] }} " >  {{ $Names[$i] }} </option></h3>

      @endfor

    </select>

    <input type="submit" name="submit"  style="margin-top:10px" value="add">
  </form>
   </div>



<br>

    <form method="post" action="/Govn_Admin">
    {{ csrf_field() }}
  <b-form-select v-model="selected" :options="options" class="mb-3" size="lg" />
  <select name="Govn_name"  selected  style= "padding:10px">

        @for ($i = 0; $i < $s ; $i++)

        <option value="{{ $GSSNs[$i] }} "> {{ $GNames[$i] }}  </option>

      @endfor
    </select>
  <input type="submit" name="submit"  style="margin-top:10px" value="add">
  </form>


@endsection
