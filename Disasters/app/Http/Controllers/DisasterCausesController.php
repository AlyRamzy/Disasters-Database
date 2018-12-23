<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class DisasterCausesController extends Controller
{
  public function getCauses()
  {
    $DisasterName = request('D_name');
    if(empty($DisasterName) || $DisasterName == "Disaster Name..")
    {
      echo "Enter a Disaster name to search for ";
      return view('/info');
    }
    $executor = new QueryExecutor();
    $cause =  $executor->DCauses($DisasterName);
    $cause = mysqli_fetch_assoc($cause);

    return view('/D_Causes' , ['DCauses' =>  $cause['possible_causes']   ]);   

  }
}
