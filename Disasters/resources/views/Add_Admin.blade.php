@extends('Admin')

@section('content1')

<div class="container">

<h2 class="alert alert-danger">Add Admin To The Data Base  </h2>
<?php
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
// define variables and set to empty values
$usernameErrN = $passwordErrN = $ssnErrN =$genderErr = $ageErr = $nameErr=$addressErr =  "";
$usernameN = $passwordN = $ssnN = $gender = $age = $address = $name ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["usernameN"])) {
    $UsernameErrN = "UserName is required";
  } else {
    $usernameN = test_input($_POST["usernameN"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[0-9 ]*$/",$usernameN)) {
      $usernameErrN = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["age"])) {
    $ageErr = "Age is required";
  } else {
    $age = test_input($_POST["age"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[- ]*$/",$age)) {
      $ageErr = "Only Numbers and white space allowed";
    }
  }

  if (empty($_POST["usernameN"])) {
    $UsernameErrN = "UserName is required";
  } else {
    $usernameN = test_input($_POST["usernameN"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$usernameN)) {
      $usernameErrN = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["passwordN"])) {
    $passwordErrN = "Password is required";
  } else {
    $passwordN = test_input($_POST["passwordN"]);
    // check if e-mail address is well-formed
    if (!filter_var($passwordN, FILTER_VALIDATE_EMAIL)) {
      $passwordErrN = "Invalid Password format";
    }
  }

  if (empty($_POST["ssnN"])) {
    $ssnN = "";
  } else {
    $ssnN = test_input($_POST["ssnN"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$ssn)) {
      $ssnErrN = "Invalid SSN";
    }
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

}
?>

<h2>Sign up</h2>
<p><span class="error"> required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name" style="margin-left:31px" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  UserName: <input type="text" name="username" style="margin-left:2px" value="<?php echo $usernameN;?>">
  <span class="error"> <?php echo $usernameErrN;?></span>
  <br><br>
  Password: <input type="password" name="password" style="margin-left:8px" value="<?php echo $passwordN;?>">
  <span class="error"> <?php echo $passwordErrN;?></span>
  <br><br>
  SSN: <input type="number" name="ssn" style="margin-left:41px" value="<?php echo $ssnN;?>">
  <span class="error"> <?php echo $ssnErrN;?></span>
  <br><br>
  Address: <input type="text" name="address" style="margin-left:20px" value="<?php echo $address;?>">
  <span class="error"> <?php echo $addressErr;?></span>
  <br><br>
  Age: <input type="number" name="age" style="margin-left:47px" value="<?php echo $age;?>">
  <span class="error"> <?php echo $ageErr;?></span>
  <br><br>


  Gender:
  <input type="radio" name="gender" style="margin-left:27px" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" style="margin-left:9px" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error"> <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit"  style="margin-top:10px" value="Submit">
</form>
</div>


@endsection
