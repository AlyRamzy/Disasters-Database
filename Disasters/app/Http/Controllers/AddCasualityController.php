<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class AddCasualityController extends Controller
{
  public function add()
  {
    $name = request('Cname');
    $ssn = request('Cssn');
    $address = request('Caddress');
    $age = request('Cage');
    $gender = request('Cgender');
    $degOfLosses = request('Closses');
    $incident = request('inc_ID');         // check this

    $executor = new QueryExecutor();
    $executor->AddCasuality($name , $ssn , $address , $age , $gender , $degOfLosses , $incident);

    return view('/Add_Casuality') ;
  }
}
