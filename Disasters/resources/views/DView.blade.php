@extends('Disaster_View')

@section('content6')

<br>

<div class="col-sm-8 text-left">


  <table class="table table-bordered">
<thead>
  <tr>
    <th scope="col">Incident ID </th>
    <th scope="col">Incident Name </th>
    <th scope="col"> Disaster type </th>
    <th scope="col"> Economical Losses </th>
    <th scope="col">Incident location </th>
    <th scope="col">Incident Description </th>
    <th scope="col">Date</th>
  </tr>
</thead>
<body>
@for ($i = 0; $i < $n ; $i++)
    <tr>
    <td> {{ $ID[$i] }}</td>
    <td> {{ $IName[$i] }}</td>
    <td> {{ $DName[$i] }}</td>
    <td> {{ $Eco_losses[$i] }}</td>
    <td> {{ $Location[$i] }}</td>
    <td> {{ $description[$i] }}</td>
    <td> {{ $year[$i] }} - {{ $month[$i] }} - {{ $day[$i] }}</td>
    </tr>
 @endfor
</thead>
</tbody>

   </div>
   </div>



@endsection
