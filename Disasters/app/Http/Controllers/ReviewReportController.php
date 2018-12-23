<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class ReviewReportController extends Controller
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

    public function GetReports()
    {
      $executor = new QueryExecutor();
      $data = $executor->GetReports();
      $n = mysqli_num_rows($data);
      $reports = $this->proc_result($data);
      $ids = $reports['report_id'];
      $content = $reports['content'];
      return view('/Review_Reports', ['n' => $n, 'ids' => $ids, 'content' => $content]);
    }

    public function ReviewReport()
    {
      $id = request('sel_id');
      if(!isset($_COOKIE['user'])) {
          echo "Cookie named 'user' is not set!";
      } else {
          echo "Cookie 'user' is set!<br>";
          $gssn = $_COOKIE['user'];
      }
      $executor = new QueryExecutor();
      $executor->TrustReport($id, $gssn);

      return view('/Add_Incident');  //To de Edited
    }
}
