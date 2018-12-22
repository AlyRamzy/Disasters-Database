<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      //To be Added
    }
}
