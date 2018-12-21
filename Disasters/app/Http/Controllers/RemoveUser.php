<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryExecutor;


class RemoveUser extends Controller
{
    public function Remove()
    {
        //return request()->all();
        request()->validate([

            'user'=>'required'
            
        ]);
        $SSN=request('user');
        $exec =new QueryExecutor();
        $disasters=$exec->RemoveUser($SSN);
         
        
        return $this->MakeViewRemove();


    }
    public function MakeViewRemove()
    {
        $exec=new QueryExecutor();
        $data=$exec->GetAllUsers();
        $users=$this->proc_result($data);
        //$users=mysqli_fetch_assoc($data);
        //return $users;
        
        return view('/Remove_Users',compact('users'));
    }
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
    //
}
