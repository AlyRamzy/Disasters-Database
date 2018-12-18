<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class DisasterPrecautionsController extends Controller
{
  public function getPrecautions()
  {
    $DisasterName = request('D_name');

    $executor = new QueryExecutor();
    $executor->DPrecautions($DisasterName);

    return view('/info') ;    // to be changed
  }
}
