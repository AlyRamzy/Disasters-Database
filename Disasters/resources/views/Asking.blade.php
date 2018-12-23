@extends('Citizen')

@section('img')
style="background-image:url('{{asset('img/report.jpg')}}');



  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;"
@endsection

<style>

.effect{
  border-radius: 50px 0px;
    background: transparent;
    border: 0px;
    border-bottom: 12px;
    border-color: #ddd;
    border-color: #B1B1B9;
    box-shadow: 6px 10px 16px 11px;
    box-shadow: 10px;
    border-color: eee;
    color:white;
    padding:10px;
    padding-left:20px;
}
</style>

@section('content3')

      <h1>Ask a Question</h1>
      <h4>Government Representative will respond soon. </h4>
      <hr>
      <h3>Your Question </h3>
      <div class="form-group" style="margin-top:19px">
        <form method="post" action="/Asking">
          {{ csrf_field() }}

          Enter the Incident Name:  <input type="text" name="in_name" style="margin-bottom:19px">

          <textarea class="form-control" type="text" name="question_txt" rows="3" placeholder="Enter your question here..." required></textarea>

            <button type="submit" class="btn btn-success btn-primary" name="submit"  style="margin-top:30px; pading:15px; color:black">ِAdd question</button>

        </form>
        </div>
    </div>

  </div>
</div>

@endsection
