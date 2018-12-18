<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class DisasterCausesController extends Controller
{
  public function getCauses()
  {
    $DisasterName = request('D_name');

    $executor = new QueryExecutor();
    $executor->DCauses($DisasterName);

    return view('/info') ;   //to be changed
  }
}
