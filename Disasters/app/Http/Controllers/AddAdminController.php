<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class AddAdminController extends Controller
{
  public function addNew()
  {
    $name = request('name');
    $username = request('username');
    $password = request('password');
    $gender = request('gender');
    $address = request('address');
    $ssn = request('ssn');
    $age = request('age');

    $executor = new QueryExecutor();
    $executor->newAdmin($name , $username , $password , $gender , $address , $ssn , $age);

    return view('/Add_Admin') ;
  }

  public function addExisting()
  {

    $ssn = request('ssn');
    $type = request('type');

    $executor = new QueryExecutor();
    $executor->addAdmin($ssn , $type);

    return view('/Add_Admin');   // to be changed
  }
}
