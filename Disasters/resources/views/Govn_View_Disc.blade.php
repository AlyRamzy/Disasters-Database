@extends ('Govn_Rep')

@section('content1')
@for ($x=0;$x<count($disc['ssn']);$x++)

<div class="panel-group" id="accordion">

    <div class="panel panel-default">
    
      <div class="panel-heading">
      
        <h4 class="panel-title">
        
          <a data-toggle="collapse" data-parent="#accordion" href=#{{$x}}>{{$disc['name'][$x]}}</a>
        </h4>
      </div>
     
      <div id={{$x}}  class="panel-collapse collapse in">
        <div class="panel-body"> 
        <h5>User Name:</h5>
        <h5>{{$disc['username'][$x]}}</h5>
        <h5>User SSN:</h5>
        <h5>{{$disc['ssn'][$x]}}</h5>
        <h5>Question :</h5>
        <h5>{{$disc['question'][$x]}}</h5>
        
        <h5>Answer :</h5>
        @if( !empty($disc['answer'][$x]))
        <h5>{{$disc['answer'][$x]}}</h5>
        @endif
        @if( empty($disc['answer'][$x]))
        <form method="post" action="Ans_Disc">
        {{csrf_field()}}
        <h5 >Your Answer:<input  type="text" name="answer"  style="margin-left:15px" ><br></h5>
        <input id="prodId" name="disc_id" type="hidden" value="{{$disc['dics_id'][$x]}}">

        <input class="btn-sm btn-danger"  type="submit" value="Answer" style="text-align:center; margin-left:350px"  >
        <br><br>
        
        </form>
        @endif
        
        
        
        </div>
      </div>
    </div>
    
</div>
@endfor

@endsection