@extends('Disaster_View')

@section('content6')

<br>

@for ($i = 0; $i < $n ; $i++)
<div class="card">

  <div class="card-body" class="effect">

    <h6 class="card-title">Incident </h6>

   <p class="card-text"> {{ $IName[$i] }}</p>

    <h6 class="card-title"> Disaster type </h6>

   <p class="card-text"> {{ $DName[$i] }}</p>

   <h6 class="card-title"> Economical Losses  </h6>

  <p class="card-text"> {{ $Eco_losses[$i] }}</p>

    <h6 class="card-title">Incident location  </h6>

    <p class="card-text"> {{ $Location[$i] }}</p>

    <h6 class="card-title">Incident Description </h6>

   <p class="card-text"> {{ $description[$i] }}</p>

    <h6 class="card-title">Date </h6>

   <p class="card-text"> {{ $year[$i] }} - {{ $month[$i] }} - {{ $day[$i] }} </p>

   </div>
   </div>
     @endfor


@endsection
