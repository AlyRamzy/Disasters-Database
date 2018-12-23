<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryExecutor;

class BasicController extends Controller
{
    public function MMenuRet()
    {
      if(!isset($_COOKIE['type']))
      {
          echo "Cookie named 'type' is not set!";
      } else {
          echo "Cookie 'type' is set!<br>";
          $type = $_COOKIE['type'];
      }
      if ($type == 'citizen')
      {
        return view('/Citizen');
      }
      else if ($type == 'gov_rep')
      {
        return view('/Govn_Rep');
      }
      else
      {
        return view('/Admin');
      }
    }

    public function ViewProf()
    {
      $exec=new QueryExecutor();

      if(!isset($_COOKIE['type']))
      {
          echo "Cookie named 'type' is not set!";
      } else {
          echo "Cookie 'type' is set!<br>";
          $type = $_COOKIE['type'];
      }
      if ($type == 'citizen')
      {
        $ssn = $_COOKIE['user'];
        $data=$exec->GetAllCitizenInfo($ssn);

        $citizent=mysqli_fetch_assoc($data);
        if($citizent['gender']==1)
        {
            $citizent['gender']='Male';
        }
        else
        {
            $citizent['gender']='female';
        }

        return view('/Profile_Citizent',compact('citizent'));
      }
      else if ($type == 'gov_rep')
      {
        $ssn = $_COOKIE['user'];
        $data=$exec->GetAllGovInfo($ssn);

        $govrep=mysqli_fetch_assoc($data);
        if($govrep['gender']==1)
        {
            $govrep['gender']='Male';
        }
        else
        {
            $govrep['gender']='female';
        }

        return view('/Profile_Govn_Rep',compact('govrep'));
      }
      else
      {
        $ssn = $_COOKIE['user'];
        $data=$exec->GetAllAdminInfo($ssn);

        $admin=mysqli_fetch_assoc($data);
        if($admin['gender']==1)
        {
            $admin['gender']='Male';
        }
        else
        {
            $admin['gender']='female';
        }

        return view('/Profile_Admin',compact('admin'));
      }
    }
}
