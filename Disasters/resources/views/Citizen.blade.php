@extends('Base')

@section('content')
<br>
<h4><a href="">My Discussions</a></h4>
<br>
<h4><a href="">Recent Discussions</a></h4>
<br>
<h4><a href="Asking">Ask a question</a></h4>
<br>
<h4><a href="NEWS">Updated News</a></h4>
<br>
<h4><a href="Add_Report">Reporting</a></h4>
<br>
<h4><a href="Main">View Previous Events</a></h4>
<br>

<div class="input-group" style="margin-left:11px" >
 <input type="text" class="form-control" style="padding:20px" placeholder="Disaster Name..">
</div>
<div class="input-group" style="margin:18px" >
<button type="submit" class="btn btn-success" style="padding:9px">Search</button>
</div>

</div>
<div class="col-sm-8 text-left">


@yield('content3')


</div>



@endsection
