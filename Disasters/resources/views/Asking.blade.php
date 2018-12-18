
@extends('Citizen')

@section('content3')

      <h1>Ask a Question</h1>
      <h4>Government Representative will respond soon. </h4>
      <hr>
      <h3>Your Question </h3>
      <div class="form-group" style="margin-top:19px">
        <form method="post" action="/Asking">
          {{ csrf_field() }}

          Enter the Incident ID:  <input type="number" name="in_id" style="margin-bottom:19px">

          <textarea class="form-control" type="text" name="question_txt" rows="3" required>Enter your question here...</textarea>

          <input type="submit" class="btn btn-success" style="margin-top:19px"></input>

        </form>
        </div>
    </div>
    <div class="col-sm-2 sidenav">

    </div>
  </div>
</div>

@endsection
