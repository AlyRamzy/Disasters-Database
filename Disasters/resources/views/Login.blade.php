<!DOCTYPE html>
<html lang="en">
<head>
  <title>Disasters</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .resize{
      width:1024px;
      height:560px;
      display:block;
      margin-left:auto;
      margin-right:auto;
      width:100%;
  }
  .background{
      background-color:#D0CACA;

  .resz {
      width:1080px;
  }
  .error {color: #FF0000;}

  </style>
</head>
<body class="background">

<div class="container">
  <div id="myCarousel" class="carousel slide resize" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active resize">
        <img src="{{asset('img/VolcanoSuperchain.png')}}"  class="img-rounded" alt="Volcano" style="width:100%;">
        <div class="carousel-caption">
          <h3>Volcano</h3>
          <p>Volcano wow !!!</p>
        </div>
      </div>

      <div class="item resize">
        <img src="{{asset('img/tsunami.jpg')}}"  class="img-rounded" alt="Tsunami" style="width:100%;">
        <div class="carousel-caption">
          <h3>Tsunami</h3>
          <p>Huge Tsunami!!</p>
        </div>
      </div>

      <div class="item resize">
        <img src="{{asset('img/earthquake.jpg')}}"  class="img-rounded" alt="Earth Quake" style="width:100%;">
        <div class="carousel-caption">
          <h3>Earth Quake</h3>
          <p>Alot of Destruction</p>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- The log Window   -->
  <div class="row">
  <div class="col-lg-6" style="text-align:center;"><h1>Already a Member?</h1>
  <?php
// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "UserName is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
      $usernameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if e-mail address is well-formed
    if (!filter_var($password, FILTER_VALIDATE_EMAIL)) {
      $passwordErr = "Invalid Password format";
    }
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Log in</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Username:<input type="text" name="name" value="<?php echo $username;?>">
  <span class="error"> <?php echo $usernameErr;?></span>
  <br><br>
  Password:  <input type="password" name="email" value="<?php echo $password;?>">
  <span class="error"> <?php echo $passwordErr;?></span>
  <br><br>

  <input type="submit" name="submit" value="Log in" >

</form>

  </div>

  <div class="col-lg-6" style="margin-top:6px"><h1>New Member?</h1>
  <?php
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
Name: <input type="text" name="name" style="margin-left:28px" value="<?php echo $name;?>">
  <span class="error"> <?php echo $nameErr;?></span>
  <br><br>
  UserName: <input type="text" name="username" value="<?php echo $usernameN;?>">
  <span class="error"> <?php echo $usernameErrN;?></span>
  <br><br>
  Password: <input type="password" name="passWord" style="margin-left:6px" value="<?php echo $passwordN;?>">
  <span class="error"> <?php echo $passwordErrN;?></span>
  <br><br>
  SSN: <input type="number" name="ssn" style="margin-left:39px" value="<?php echo $ssnN;?>">
  <span class="error"><?php echo $ssnErrN;?></span>
  <br><br>
  Address: <input type="text" name="address" style="margin-left:18px" value="<?php echo $address;?>">
  <span class="error"> <?php echo $addressErr;?></span>
  <br><br>
  Age: <input type="number" name="age" style="margin-left:44px" value="<?php echo $age;?>">
  <span class="error"> <?php echo $ageErr;?></span>
  <br><br>

  Gender:
  <input type="radio" name="gender" style="margin-left:25px"  <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" style="margin-left:6px"  <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <span class="error"> <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
</form>
  </div>
</div>
</div>



</body>
</html>
