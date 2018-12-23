<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryExecutor;

class Govn_Disc extends Controller
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

    public function ViewDisc()
    {
        $exec =new QueryExecutor();
        $disc=$exec->GetDiscussions();
         $disc=$this->proc_result($disc);

        return view('/Govn_View_Disc',compact('disc'));
    }
    public function Answer()
    {
        $answer=request('answer');
        $disc_id=request('disc_id');
        $GovSSN=$_COOKIE['user'];
        $exec =new QueryExecutor();
        $exec->AnsDisc($GovSSN,$answer,$disc_id);
        return $this->ViewDisc();
    }
    //
}
