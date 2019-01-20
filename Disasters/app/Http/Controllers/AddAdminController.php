<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class AddAdminController extends Controller
{

  private function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

//-----------------------------------------------------------------------------------

  public function addNew()
  {

    //Validate the input data
  $usernameErrN = $passwordErrN = $ssnErrN =$genderErr = $ageErr = $nameErr=$addressErr =  "";
  $username = $password = $ssn = $gender = $age = $address = $name ="";

  if (empty(request('name'))) {
    $nameErr = "Name is required";
    echo $nameErr;
    return view('/Add_Admin');
  } else {
    $name = $this->test_input(request('name'));
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      echo $nameErr;
      return view('/Add_Admin');
    }
  }

  if (empty(request('username'))) {
    $UsernameErrN = "UserName is required";
    echo $UsernameErrN;
    return view('/Add_Admin');
  } else {
    $username = $this->test_input(request('username'));
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $usernameErrN = "Only letters and white space allowed";
      echo $usernameErrN;
      return view('/Add_Admin');
    }
  }

  if (empty(request('passWord'))) {
    $passwordErrN = "Password is required";
    echo $passwordErrN;
    return view('/Add_Admin');
  } else {
    $password = $this->test_input(request('passWord'));
    $password = password_hash($password, PASSWORD_DEFAULT);
  }

  if (empty(request('ssn'))) {
    $ssnErrN = "SSN is required";
    echo $ssnErrN;
    return view('/Add_Admin');
  } else {
    $ssn = $this->test_input(request('ssn'));
    if (!is_numeric($ssn)) {
      $ssnErrN = "Invalid SSN";
      echo $ssnErrN;
      return view('/Add_Admin');
    }
  }

  if (empty(request('age'))) {
    $age = 'null';
  } else {
    $age = $this->test_input(request('age'));
    if (!preg_match("/^[0-9 ]*$/",$age)) {
      $ageErr = "Only Numbers and white space allowed";
      echo $ageErr;
      return view('\Add_Admin');
    }
  }

  if (empty(request('address'))) {
    $address = 'null';
  } else {
    $address = "'".$this->test_input(request('address'))."'";
    if (!preg_match("/^[0-9a-zA-Z ]*$/",$address)) {
      $addressErr = "Only letters and white space and Numbers allowed";
      echo $addressErr;
      return view('\Add_Admin');
  }
  }

  if (empty(request('gender'))) {
    $gender = 'null';
  } else {
    $gender = $this->test_input(request('gender'));
    if ($gender == 'female')
    {
      $gender = 0;
    }
    else
    {
      $gender = 1;
    }
  }

    //Check whether the user exists
  $executor = new QueryExecutor();

  $all_ssns = $executor->getALLUSSN();
  $all_ssns = $this->proc_result($all_ssns);

  if (in_array($ssn, (array)$all_ssns['ssn']))
  {
    echo "The user Already Exists Add him/her from the Existing User Page";
    return view('/Add_Admin');
  }
  else
  {
    if(!isset($_COOKIE['user'])){
      echo "Cookie named user doesn't set !";
      return view('/Add_Admin');
    } else {
      $ASSN = $_COOKIE['user'];

      $executor->newAdmin($name , $username , $password , $gender , $address , $ssn , $age , $ASSN);

      return view('/Add_Admin') ;
    }
  }
}

//---------------------------------------------------------------------------------------------

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

//-----------------------------------------------------------------------------------------------

public function getData()
 {

  $executor = new QueryExecutor();
  $data1 =  $executor->Citizens();
  $num1 = mysqli_num_rows($data1);
  $data1 = $this->proc_result($data1);

  $data =  $executor->Govns();
  $num = mysqli_num_rows($data);
  $data = $this->proc_result($data);

  return view('/ExistingUser' , ['SSNs' =>(array)$data1['ssn'] , 'Names' =>(array)$data1['name'] , 'n' => $num1,
                                 'GSSNs' =>(array)$data['ssn'] , 'GNames' => (array)$data['name']  , 's' => $num ]);
}

//---------------------------------------------------------------------------------------------

public function Gadmin()
{
  $Gssn = request('Govn_name');
  if (empty($Gssn))
  {
    echo " No Government Representative exists ! ";
    return $this->getData();

  }
  $executor = new QueryExecutor();

  if(!isset($_COOKIE['user'])){
    echo "Cookie named user doesn't set !";
    return $this->getData();
  } else {
    $Assn = $_COOKIE['user'];
  $executor->ExchangeGovn($Gssn , $Assn);
  return $this->getData();
}
}

//------------------------------------------------------------------------

public function Cadmin()
{
  $Cssn = request('Citizen_name');
  if (empty($Cssn))
  {
    echo " No citizens exists ! ";
    return $this->getData();

  }
  $executor = new QueryExecutor();
  if(!isset($_COOKIE['user'])){
    echo "Cookie named user doesn't set !";
    return $this->getData();
  } else {
    $Assn = $_COOKIE['user'];
  $executor->ExchangeCitizen($Cssn , $Assn);
  return $this->getData();
}
}

//--------------------------------------------------------------------

}
