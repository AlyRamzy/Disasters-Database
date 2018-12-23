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
    $data =  $executor->InCidents();
    $num = mysqli_num_rows($data);
    $data = $this->proc_result($data);

    return view('/Add_Casuality' , ['IDs' =>(array)$data['id'] , 'Names' =>(array)$data['name'] , 'n' => $num ]);

  }

  public function AddCasualty()
  {

  $degLossErr = $ssnErrN =$genderErr = $ageErr = $nameErr=$addressErr ="";
  $deg=$ssn= $gender = $age = $address = $name ="";

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

  if (empty(request('Degree'))) {
    $deg = 0;
  } else {
    $deg = $this->test_input(request('Degree'));
    if($deg == '1')
    {
      $deg = 1;
    }
    if($deg == '2')
    {
      $deg =2;
    }
    else {
      $deg = 3;
    }
}
  $inc_Id = request('I_name');

  $executor->AddC($name, $gender , $address , $ssn , $age , $deg ,   $inc_Id );

return $this->IncIDs();

}

}
