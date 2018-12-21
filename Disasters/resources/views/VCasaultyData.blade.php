@extends('View_Casaulty')

@section('content7')

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Damage </th>
      <th scope="col">Incident </th>
      <th scope="col">Incident location </th>
      <th scope="col">Incident Description</th>
      <th scope="col">year</th>
      <th scope="col">month</th>
      <th scope="col">Day</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      @foreach( $Damage as $D )

      <td> {{ $D }} </td>
      @endforeach

      @foreach( $Iname as $name )

      <td> {{ $name }} </td>
      @endforeach

      @foreach( $location as $L )

      <td> {{ $L }} </td>
      @endforeach

      @foreach( $description as $Desc )

      <td> {{ $Desc }} </td>
      @endforeach

      @foreach( $year as $Y )

      <td> {{ $Y }} </td>
      @endforeach

      @foreach( $month as $M )

      <td> {{ $M }} </td>
      @endforeach

      @foreach( $day as $Days )

      <td> {{ $Days }} </td>
      @endforeach

    </tr>

  </tbody>

  </table>

@endsection
