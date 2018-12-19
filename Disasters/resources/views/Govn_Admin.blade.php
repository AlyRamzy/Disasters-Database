@extends('Admin')

@section('content1')
<br>

<h4><span class="error">Select the SSN and the Name of the Government Representative you want to make him/her Admin </span></h4>
<br>
<br>

<table class="table table-hover" >
  <thead>
    <tr>
      <th scope="col">SSN</th>
      <th scope="col">Name</th>
    </tr>
  </thead>
  <tbody>

      <tr>
        @foreach( $GSSNs as $GSSNval )

        <th scope="col"> {{ $GSSNval }} </th>
        @endforeach

        @foreach( $GNames as $Gname )

        <th scope="col"> {{ $Gname }} </th>
        @endforeach
      </tr>

  </tbody>

</table>

@endsection
