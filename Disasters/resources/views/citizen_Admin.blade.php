@extends('Admin')

@section('content1')

<br>

<h4><span class="error"> Select the SSN and the Name of the Citizen you want to make him/her Admin </span></h4>
<br>
<br>
<table class="table table-hover">

  <thead>
    <tr>
      <th scope="col" >SSN</th>
      <th scope="col">Name</th>
    </tr>
  </thead>

  <tbody>

    <tr>
      @foreach( $SSNs as $SSNval )

      <th scope="col"> {{ $SSNval }} </th>
      @endforeach

      @foreach( $Names as $name )

      <th scope="col"> {{ $name }} </th>
      @endforeach
    </tr>

  </tbody>

</table>

@endsection
