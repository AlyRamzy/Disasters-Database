<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class AddReportController extends Controller
{
  public function Add()
  {
    $description = request('rep_txt');
    if(!isset($_COOKIE['user'])) {
        echo "Cookie named 'user' is not set!";
    } else {
        echo "Cookie 'user' is set!<br>";
        $ssn = $_COOKIE['user'];
    }

    $executor = new QueryExecutor();
    $executor->addReport($description, $ssn);

    return view('/Add_Report') ;
  }
}
