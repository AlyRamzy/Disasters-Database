@extends('View_Casaulty')

@section('content7')

<br>

  <div class="col-sm-8 text-left">


    <table class="table table-bordered" >
  <thead>
    <tr>
      <th scope="col"> Damage </th>
      <th scope="col">Incident </th>
      <th scope="col">Incident location </th>
      <th scope="col">Incident Description </th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    @for ($i = 0; $i < $n ; $i++)
    <tr>
    <td> {{ $Damage[$i] }}</td>
    <td> {{ $Iname[$i] }}</td>
    <td> {{ $location[$i] }}</td>
    <td> {{ $description[$i] }}</td>
    <td> {{ $year[$i] }} - {{ $month[$i] }} - {{ $day[$i] }}</td>
    </tr>
    @endfor
</tbody>
</div>

@endsection
