@extends('View_Casaulty')

@section('content7')



@for ($i = 0; $i < $n ; $i++)
<div class="card">

  <div class="card-body" class="effect">
 <h6 class="card-title">Damage </h6>

<p class="card-text"> {{ $Damage[$i] }}</p>

 <h6 class="card-title">Incident </h6>

<p class="card-text"> {{ $Iname[$i] }}</p>

 <h6 class="card-title">Incident location  </h6>

 <p class="card-text"> {{ $location[$i] }}</p>

 <h6 class="card-title">Incident Description </h6>

<p class="card-text"> {{ $description[$i] }}</p>

 <h6 class="card-title">Date </h6>

<p class="card-text"> {{ $year[$i] }}  . "-" . {{ $month[$i] }}  . "-" . {{ $day[$i] }} </p>

</div>
</div>
  @endfor


@endsection
