@extends('Disaster_View')

@section('content6')

<br>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"> Incident ID </th>
      <th scope="col"> Name </th>
      <th scope="col"> Economical Losses </th>
      <th scope="col"> Incident location </th>
      <th scope="col"> Incident Description</th>
      <th scope="col"> year</th>
      <th scope="col">  month</th>
      <th scope="col">  Day</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      @foreach( $ID as $id )

      <th scope="col"> {{ $id }} </th>
      @endforeach

      @foreach( $DName as $name )

      <th scope="col"> {{ $name }} </th>
      @endforeach

      @foreach( $Eco_losses as $losses )

      <th scope="col"> {{ $losses }} </th>
      @endforeach

      @foreach( $Location as $L )

      <th scope="col"> {{ $L }} </th>
      @endforeach

      @foreach( $description as $Desc )

      <th scope="col"> {{ $Desc }} </th>
      @endforeach

      @foreach( $year as $Y )

      <th scope="col"> {{ $Y }} </th>
      @endforeach

      @foreach( $month as $M )

      <th scope="col"> {{ $M }} </th>
      @endforeach

      @foreach( $day as $Days )

      <th scope="col"> {{ $Days }} </th>
      @endforeach

    </tr>

    </tbody>

    </table>


@endsection
