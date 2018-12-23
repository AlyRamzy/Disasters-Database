<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class AddCriminalController extends Controller
{


  private function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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


  public function IncIDs()
  {
    $executor = new QueryExecutor();
    $data =  $executor->HInCidents();
    $num = mysqli_num_rows($data);
    $data = $this->proc_result($data);

    return view('/Add_Criminal' , ['IDs' =>(array)$data['id'] , 'Names' =>(array)$data['name'] , 'n' => $num ]);

  }

  public function AddCriminal()
  {
    $executor = new QueryExecutor();
  $degLossErr = $ssnErrN =$genderErr = $ageErr = $nameErr=$addressErr =  "";
  $ssn = $gender = $age = $address =$NoC= $State= $Nov= $name ="";

  if (empty(request('name'))) {
    $nameErr = "Name is required";
    echo $nameErr;
    return $this->IncIDs();
  } else {
    $name = $this->test_input(request('name'));
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      echo $nameErr;
      return $this->IncIDs();
    }
  }

  if (empty(request('ssn'))) {
    $ssnErrN = "SSN is required";
    echo $ssnErrN;
    return $this->IncIDs();
  } else {
    $ssn = $this->test_input(request('ssn'));
    if (!is_numeric($ssn)) {
      $ssnErrN = "Invalid SSN";
      echo $ssnErrN;
      return $this->IncIDs();
    }
  }

  if (empty(request('age'))) {
    $age = 'null';
  } else {
    $age = $this->test_input(request('age'));
    if (!preg_match("/^[0-9 ]*$/",$age)) {
      $ageErr = "Only Numbers and white space allowed";
      echo $ageErr;
      return $this->IncIDs();
    }
  }

  if (empty(request('address'))) {
    $address = 'null';
  } else {
    $address = $this->test_input(request('address'));
    if (!preg_match("/^[0-9a-zA-Z ]*$/",$name)) {
      $addressErr = "Only letters and white space and Numbers allowed";
      echo $addressErr;
      return $this->IncIDs();
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

  if (empty(request('num1'))) {
    $Nov = 0;
  } else {
    $Nov = $this->test_input(request('num1'));
    if (!preg_match("/^[0-9 ]*$/",$Nov)) {
      $ageErr = "Only Numbers and white space allowed";
      echo $ageErr;
      return $this->IncIDs();
    }
  }

  if (empty(request('num2'))) {
    $NoC = 0;
  } else {
    $NoC = $this->test_input(request('num2'));
    if (!preg_match("/^[0-9 ]*$/",$NoC)) {
      $ageErr = "Only Numbers and white space allowed";
      echo $ageErr;
      return $this->IncIDs();
    }
  }

  if (empty(request('state'))) {
    $State = 'null';
  } else {
    $State = $this->test_input(request('state'));
    if ($State == 'jail')
    {
      $State = 0;
    }
    else
    {
      $State = 1;
    }
  }

  $inc_Id = request('I_name');

  $executor->AddCriminals($name, $gender , $address , $ssn , $age , $NoC , $State , $Nov ,   $inc_Id);

  return $this->IncIDs();

  }





}
