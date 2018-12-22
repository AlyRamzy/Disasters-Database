<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class IncidentController extends Controller
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

  public function VIncident()
  {

    $executor = new QueryExecutor();
    $day = request('Iday');
    $month = request('Imonth');
    $year = request('Iyear');

    if (empty($day) && empty($month) && empty($year))
    {
      echo "Enter a Date you want to search for :)";
      return view('/Disaster_View') ;
    }
    if(!empty($day) && empty($year) && empty($month))
    {
          $data = $executor->AllDay($day);
    }
    elseif(empty($day) && empty($year) && !empty($month))
    {
          $data = $executor->AllMonth($month);
    }
    elseif(empty($day) && !empty($year) && empty($month))
    {
          $data = $executor->AllYear($year);
    }
    elseif(!empty($day) && empty($year) && !empty($month))
    {
          $data = $executor->DMonth($month , $day);
    }
    elseif(!empty($day) && !empty($year) && empty($month))
    {
          $data = $executor->Dyear($year , $day);
    }
    elseif(empty($day) && !empty($year) && !empty($month))
    {
          $data = $executor->Myear($year , $month);
    }
    elseif(!empty($day) && !empty($year) && !empty($month))
    {
        $data = $executor->AllDate($year , $month , $day);
    }

    if (mysqli_num_rows($data) == 0)
    {
      return view('/Disaster_View');
    }
    $data =  $this->proc_result($data);

    return view('/DView' , ['ID' => (array)$data['id'] ,
                                    'DName' =>(array)$data['name'],
                                    'Eco_losses' => (array)$data['eco_loss'] ,
                                    'Location' =>(array)$data['location'],
                                   'description' => (array)$data['description'] ,
                                   'year' => (array)$data['year'] ,
                                   'month' => (array)$data['month'] ,
                                   'day' => (array)$data['day']  ]) ;
  }

}
