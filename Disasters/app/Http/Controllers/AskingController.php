<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class AskingController extends Controller
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

  public function Add()
  {
    $executor = new QueryExecutor();

    $question = request('question_txt');
    $inc_name = request('in_name');
    if(!isset($_COOKIE['user'])) {
        echo "Cookie named 'user' is not set!";
    } else {
        echo "Cookie 'user' is set!<br>";
        $ssn = $_COOKIE['user'];
    }

    $all_names = $executor->getIncName();
    $all_names = $this->proc_result($all_names);

    if (in_array($inc_name, (array)$all_names['name']))
    {
      $executor->addDisc($inc_name, $question, $ssn);
      return view('/Asking');
    }
    else
    {
      echo "Please Enter an Existing Incident";
      return view('/Asking');
    }
  }
}
