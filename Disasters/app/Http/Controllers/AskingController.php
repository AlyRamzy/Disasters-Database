<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class AskingController extends Controller
{
  public function Add()
  {
    $executor = new QueryExecutor();

    $question = request('question_txt');
    $inc_id = request('in_id');

    $all_ids = $executor->getIncID();

    if (in_array($inc_id, (array)$all_ids))
    {
      $executor->addDisc($inc_id, $question);
      return view('/Asking');
    }
    else
    {
      echo "Please Enter an Existing Incident";
      return view('/Asking');
    }
  }
}
