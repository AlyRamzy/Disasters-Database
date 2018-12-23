<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class VinewCasaultyController extends Controller
{

  private function proc_result($data)
      {
        $fields = mysqli_fetch_fields($data);
        $data_arr = array();

        foreach ($fields as $value)
        {
          $data_arr[$value->name] = [];
        }

        while ($row = mysqli_fetch_assoc($data))
        {
          foreach ($data_arr as $key => $value)
          {
            $next = $row[$key];
            array_push($value, $next);
            $data_arr[$key] = $value;
          }
        }
        return $data_arr;
      }

//---------------------------------------------------------------------

  public function VCasaulty()
  {
    $Casaultyname = request('CasaulName');
    if(empty($Casaultyname) )
    {
      echo "Enter the Casaulty name you want to search for ";
      return view('/View_Casaulty');
    }

    $executor = new QueryExecutor();
    $data = $executor->Casualties($Casaultyname);

    if (mysqli_num_rows($data) == 0)
    {
      return view('/View_Casaulty');
    }

    $num = mysqli_num_rows($data);
    $data =  $this->proc_result($data);

    return view('/VCasaultyData' , ['Damage' => (array)$data['deg_of_loss'] ,
                                    'Iname' => (array)$data['name'] ,
                                    'location' =>(array)$data['location'],
                                   'description' => (array)$data['description'] ,
                                   'year' => (array)$data['year'] ,
                                   'month' => (array)$data['month'] ,
                                   'day' => (array)$data['day'] , 
                                   'n' => $num ]);
  }
}
