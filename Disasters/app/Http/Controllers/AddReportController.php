<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class AddReportController extends Controller
{
  public function Add()
  {
    $description = request('rep_txt');

    $executor = new QueryExecutor();
    $executor->addReport($description);

    return view('/Add_Report') ;
  }
}
