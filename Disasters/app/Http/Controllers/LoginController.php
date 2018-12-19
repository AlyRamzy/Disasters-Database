<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;
use Nexmo\Verify\Check;

class LoginController extends Controller
{
    private function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    public function ValnLog()
    {
      //Validate the input data
      $usernameErr = $passwordErr = "";
      $username = $password = "";

      if (empty(request('username'))) {
        $usernameErr = "UserName is required";
        echo $usernameErr;
        return view('/Login');
      } else {
        $username = $this->test_input(request('username'));
        if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
          $usernameErr = "Only letters and white space allowed";
          echo $usernameErr;
          return view('/Login');
        }
      }

      if (empty(request('password'))) {
        $passwordErr = "Password is required";
        echo $passwordErr;
        return view('/Login');
      } else {
        $password = $this-> test_input(request('password'));
      }

      //Check whether the username exists and the password is right
      $executor = new QueryExecutor();

      //Citizen Check
      $citInfo = $executor->getCitizenCred($username);

      if (mysqli_num_rows($citInfo))
      {
        $citInfo = mysqli_fetch_assoc($citInfo);
        if ($password == $citInfo['password'])
        {
          $cookie_name = "user";
          $cookie_value = $citInfo['ssn'];
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Available for approximately one day
          return view('/Citizen');
        }
        else
        {
          echo "Please Enter a Correct Password";
          return view('/Login');
        }
      }

      //Government_Representative Check
      $govInfo = $executor->getGovRepCred($username);

      if (mysqli_num_rows($govInfo))
      {
        $govInfo = mysqli_fetch_assoc($govInfo);
        if ($password == $govInfo['password'])
        {
          $cookie_name = "user";
          $cookie_value = $govInfo['ssn'];
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Available for approximately one day
          return view('/Govn_Rep');
        }
        else
        {
          echo "Please Enter a Correct Password";
          return view('/Login');
        }
      }

      //Admin Check
      $adminInfo = $executor->getAdminCred($username);

      if (mysqli_num_rows($adminInfo))
      {
        $adminInfo = mysqli_fetch_assoc($adminInfo);
        if ($password == $adminInfo['password'])
        {
          $cookie_name = "user";
          $cookie_value = $adminInfo['ssn'];
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Available for approximately one day
          return view('/Admin');
        }
        else
        {
          echo "Please Enter a Correct Password";
          return view('/Login');
        }
      }

      echo "The Username doesn't Exist, Please Enter a Valid Username";
      return view('/Login');
    }

    public function SignUp()
    {
      //Validate the input data
    $usernameErrN = $passwordErrN = $ssnErrN =$genderErr = $ageErr = $nameErr=$addressErr =  "";
    $usernameN = $passwordN = $ssnN = $gender = $age = $address = $name ="";

    if (empty(request('name'))) {
      $nameErr = "Name is required";
      echo $nameErr;
      return view('/Login');
    } else {
      $name = $this->test_input(request('name'));
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
        echo $nameErr;
        return view('/Login');
      }
    }

    if (empty(request('username'))) {
      $UsernameErrN = "UserName is required";
      echo $UsernameErrN;
      return view('/Login');
    } else {
      $usernameN = $this->test_input(request('username'));
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $usernameErrN = "Only letters and white space allowed";
        echo $usernameErrN;
        return view('/Login');
      }
    }

    if (empty(request('passWord'))) {
      $passwordErrN = "Password is required";
      echo $passwordErrN;
      return view('/Login');
    } else {
      $passwordN = $this->test_input(request('passWord'));
    }

    if (empty(request('ssn'))) {
      $ssnErrN = "SSN is required";
      echo $ssnErrN;
      return view('/Login');
    } else {
      $ssnN = $this->test_input(request('ssn'));
      if (!is_numeric($ssnN)) {
        $ssnErrN = "Invalid SSN";
        echo $ssnErrN;
        return view('/Login');
      }
    }

    if (empty(request('age'))) {
      $age = 'null';
    } else {
      $age = $this->test_input(request('age'));
      if (!preg_match("/^[- ]*$/",$age)) {
        $ageErr = "Only Numbers and white space allowed";
        echo $ageErr;
        return view('\Login');
      }
    }

    if (empty(request('address'))) {
      $address = 'null';
    } else {
      $address = $this->test_input(request('address'));
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $addressErr = "Only letters and white space allowed";
        echo $addressErr;
        return view('\Login');
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

    $all_ssns = $executor->getALLSSN();
    $all_ssns = mysqli_fetch_assoc($all_ssns);

    if (in_array($ssnN, (array)$all_ssns['ssn']))
    {
      echo "The User Already Exists";
      return view('/Login');
    }
    else
    {
      $executor->addCitizen($ssnN, $name, $usernameN, $passwordN, $age, $address, $gender);
      $cookie_name = "user";
      $cookie_value = $ssnN;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Available for approximately one day
      return view('/Citizen');
    }
  }

  public function LogOut()
  {
    setcookie("user", "", time() - 3600);
    return view('/Login');
  }

  public function ChangePassword()
  {
    //To be Added
  }
}
