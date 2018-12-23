@extends('Govn_Rep')

@section('content1')

      <h1>Reports Forum</h1>
      <div class="col-sm-6 text-left">

      </div>
        <hr>
        <h3>Review a Report</h3>
        <div class="custom-control" style="margin-top:25px">
          <form method="post" action="/Get_Reviewed">
          {{ csrf_field() }}

          @for ($i = 0; $i < $n ; $i++)
          <div class="radio">
            <label><input type="radio" name="sel_id" value = " {{ $ids[$i] }} ">{{ $ids[$i] }}</label>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" style="margin-left:25px">
              Load Description
            </button>

            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Report Content</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {{ $content[$i] }}
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>

          </div>

          @endfor
          <button type="submit" class="btn btn-primary" style="margin-top:15px">Trust</button>
          </form>
        </div>

 @endsection
