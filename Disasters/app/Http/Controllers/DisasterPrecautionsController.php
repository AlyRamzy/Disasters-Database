<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class DisasterPrecautionsController extends Controller
{
  public function getPrecautions()
  {
    $DisasterName = request('Di_name');

    if(empty($DisasterName) || $DisasterName == "Disaster Name..")
    {
      echo "Enter a Disaster name to search for ";
      return view('/info');
    }

    $executor = new QueryExecutor();
    $precaution =$executor->DPrecautions($DisasterName);
    $precaution = mysqli_fetch_assoc($precaution);

        return view('/D_Precautions' , ['DPrecautions' =>  $precaution['precautions'],
                                           'Dname' => $DisasterName ]);
  }
}
