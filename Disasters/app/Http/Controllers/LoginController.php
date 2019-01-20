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
        if (!preg_match("/[A-Za-z0-9]+/",$username)) {
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
        $citInfo = $this->proc_result($citInfo);
        if (password_verify($password, $citInfo['password'][0]))
        {
          $cookie_name = "user";
          $cookie_value = $citInfo['ssn'][0];
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Available for approximately one day
          $cookie_name = "type";
          $cookie_value = "citizen";
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
        $govInfo = $this->proc_result($govInfo);
        if (password_verify($password, $govInfo['password'][0]))
        {
          $cookie_name = "user";
          $cookie_value = $govInfo['ssn'][0];
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Available for approximately one day
          $cookie_name = "type";
          $cookie_value = "gov_rep";
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
        $adminInfo = $this->proc_result($adminInfo);
        if (password_verify($password, $adminInfo['password'][0]))
        {
          $cookie_name = "user";
          $cookie_value = $adminInfo['ssn'][0];
          setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Available for approximately one day
          $cookie_name = "type";
          $cookie_value = "admin";
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
      if (!preg_match("/[A-Za-z0-9]+/",$usernameN)) {
        $usernameErrN = "Only letters, numbers and white space allowed";
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
      $passwordN = password_hash($passwordN, PASSWORD_DEFAULT);
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
    }

    if (empty(request('address'))) {
      $address = 'null';
    } else {
      $address = "'".$this->test_input(request('address'))."'";
      return view('\Login');
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
    $all_ssns = $this->proc_result($all_ssns);

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
      $cookie_name = "type";
      $cookie_value = "citizen";
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Available for approximately one day
      return view('/Citizen');
    }
  }

  public function LogOut()
  {
    setcookie("user", "", time() - 3600);
    setcookie("type", "", time() - 3600);
    return view('/Login');
  }

  public function ChangePassword()
  {
    //Setting variables
    if(!isset($_COOKIE['user'])) {
        echo "Cookie named 'user' is not set!";
    } else {
        echo "Cookie 'user' is set!<br>";
        $ssn = $_COOKIE['user'];
    }
    $old_password = request('password1');
    $new_password1 = request('password2');
    $new_password2 = request('password3');

    //Validating the previous password and new password
    $executor = new QueryExecutor();

    $real_password = $this->proc_result($executor->getPassword($ssn));
    $real_password = $real_password['password'][0];
    if (!password_verify($old_password, $real_password))
    {
      echo "Incorrect Password";
      return view('/change_password');
    }
    else if ($new_password1 != $new_password2)
    {
      echo "Passwords don't match";
      return view('/change_password');
    }

    //Updating the password
    $new_password1 = password_hash($new_password1, PASSWORD_DEFAULT);
    $executor->updatePassword($ssn, $new_password1);
    setcookie("user", "", time() - 3600);
    setcookie("type", "", time() - 3600);
    return view('/Login');
  }
}
