<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class AddCasualtyController extends Controller
{
  private function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  public function AddC()
  {
  $ssnErrN =$genderErr = $ageErr = $nameErr=$addressErr =  "";
  $ssn = $gender = $age = $address = $name ="";

  if (empty(request('name'))) {
    $nameErr = "Name is required";
    echo $nameErr;
    return view('/Add_Casuality');
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
    $address = $this->test_input(request('address'));
    if (!preg_match("/^[0-9a-zA-Z ]*$/",$name)) {
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


}
















}
