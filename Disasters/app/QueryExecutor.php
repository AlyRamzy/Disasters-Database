<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueryExecutor extends Model
{
  private $conn;

  function __construct()
  {
    parent::__construct();

    $this->conn = mysqli_connect("localhost", "root", "", "Disasters");

    if (!$this->conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
  }

  public function addReport($description)
  {
    $sql = "Insert into Report (content, citizen_ssn) values ('" . $description . "', '011111111')"; //User SSN s is to be taken from the cookie once log in is done

    if (mysqli_query($this->conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
    }
  }

  public function getIncID()
  {
    $sql = "Select id From incident";

    if (mysqli_query($this->conn, $sql)) {
        $data = mysqli_query($this->conn, $sql);
        return ($data);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function addDisc($inc_id, $question)
  {
    $sql = "Insert into discussion (question, incident_id,  citizen_ssn) values ('".$question."', ".$inc_id.", '0312321312')"; //User SSN s is to be taken from the cookie once log in is done

    if (mysqli_query($this->conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
    }
  }

  public function getCitizenCred($username)
  {
    $sql = "Select ssn, username, password From citizen Where username = '".$username."'";
    if (mysqli_query($this->conn, $sql)) {
        $data = mysqli_query($this->conn, $sql);
        return ($data);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function getGovRepCred($username)
  {
    $sql = "Select ssn, username, password From government_representative Where username = '".$username."'";
    if (mysqli_query($this->conn, $sql)) {
        $data = mysqli_query($this->conn, $sql);
        return ($data);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function getAdminCred($username)
  {
    $sql = "Select ssn, username, password From admin Where username = '".$username."'";
    if (mysqli_query($this->conn, $sql)) {
        $data = mysqli_query($this->conn, $sql);
        return ($data);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function getALLSSN()
  {
    $sql = "Select ssn From person";
    if (mysqli_query($this->conn, $sql)) {
        $data = mysqli_query($this->conn, $sql);
        return ($data);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function addCitizen($ssn, $name, $username, $password, $age, $address, $gender)
  {
    $sql1 = "Insert into person (ssn, name, age, gender, address) values ('".$ssn."', '".$name."', ".$age.", ".$gender.", ".$address.")";
    $sql2 = "Insert into Citizen (ssn, username, password) values ('".$ssn."', '".$username."', '".$password."')";
    if (mysqli_query($this->conn, $sql1)) {
      if (mysqli_query($this->conn, $sql2))
      {
        echo "New record created successfully";
      }
      else
      {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($this->conn);
      }
    } else {
        echo "Error: " . $sql1 . "<br>" . mysqli_error($this->conn);
    }
  }

  function __destruct()
  {
    mysqli_close($this->conn);
  }
}
