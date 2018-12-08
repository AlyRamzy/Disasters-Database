@extends('Admin')

@section('content1')

<div class="container">

<h1 class="alert alert-danger">Remove User From The Site  </h1>
<?php
$SSN=$SSNERROR="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["SSN"])) {
      $nameErr = "SSN is required";
    } else {
      $name = test_input($_POST["SSN"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Wrong Format OF SSN ";
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
<h2>Please Enter The User SSN</h2>

<form method="post" style="margin-top:30px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  SSN: <input type="text" name="SSN" value="<?php echo $SSN;?>">
  <span class="error"> <?php echo $SSNERROR;?></span>
  <br><br>
  <input type="submit" name="submit" style="margin-left:30px" value="Submit">

  </form>
</div>

@endsection
