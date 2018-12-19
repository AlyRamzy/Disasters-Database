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
    if ($gender = 'female')
    {
      $gender = 0;
    } else {
      $gender = 1;
    }
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


public function getCitizen()
 {
  $CitizenName = request('Cname');

  $executor = new QueryExecutor();
  $data =  $executor->Citizens($CitizenName);
  $data = mysqli_fetch_assoc($data);

  return view('/citizen_Admin' , ['SSNs' =>(array)$data['ssn'] , 'Names' =>(array)$data['name'] ]);
}

public function getGovn()
{
  $GName = request('Gname');

  $executor = new QueryExecutor();
  $data =  $executor->Govns($GName);
  $data = mysqli_fetch_assoc($data);

  return view('/Govn_Admin' , ['GSSNs' =>(array)$data['ssn'] , 'GNames' => (array)$data['name']  ]);   //to be changed
}

public function Gadmin()
{
  $Gssn = request('GovSSN');

  $executor = new QueryExecutor();
  $Assn = '00011111';
  $executor->ExchangeGovn($Gssn , $Assn);     //need the cookie

  return view('/Govn_Admin' );
}

public function Cadmin()
{
  $Cssn = request('CitizenSSN');
  $Assn = '22222000';
  $executor = new QueryExecutor();
  $executor->ExchangeCitizen($Cssn , $Assn);     //need the cookie

  return view('/citizen_Admin');
}

}
