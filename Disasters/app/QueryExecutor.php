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


  public function addAdmin( $ssn , $type )
  {

    $sql = "select username , password from " . $type . "where ssn = '" . $ssn . "'";

    if( mysqli_query($this->conn , $sql)) {

        $data = mysqli_query($this->conn , $sql);
        $sql = "delete from " . $type . "where ssn = '" . $ssn . "'";

        if (mysqli_query($this->conn, $sql)) {
            echo "Record Deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
            return;
        }

       $sql = "insert into admin (ssn , username , password ) values ( '" . $ssn . "', '" . $username ."' , '" . $password . "' )";

       if (mysqli_query($this->conn, $sql)) {
           echo "New record created successfully";
       } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
           return;
       }

    } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
          return;
    }
  }


  public function newAdmin($name , $username , $password , $gender , $address , $ssn , $age)
  {

    if ($gender == 'male')
    {
      $g = 1;
    } else {
      $g = 0;
    }

    $sql = "select ssn from person where ssn = '" . $ssn . "'" ;

    if (mysqli_query($this->conn, $sql)) {

        echo "Query executed successfully";

        $temp = mysqli_query($this->conn, $sql);

        if ( $temp = "") {

          $sql = "Insert into person (ssn, name , gender , address) values ('" . $ssn . "', '" . $name . "', " . $g . ", '" . $address . "' )";

          if (mysqli_query($this->conn, $sql)) {

              echo "New record created successfully";

              $sql = "Insert into Admin (ssn, username , password ) values ('" . $ssn . "', '" . $username ."' , '" . $password . "' )";

              if (mysqli_query($this->conn, $sql)) {
                        echo "New record created successfully";
              } else {
                      echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                      return;
            }

          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
              return;
          }
        } else {

            // printing that this person exists in the database and take the user to the existing view page
        }


    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }

  }



  public function DCauses($name )
  {
    $sql = "select possible_causes from Disaster where name = '" . $name . "'";

    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }

  }

  public function DPrecautions( $name )
  {
    $sql = "select precautions from Disaster where name = '" . $name . "'";


    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

//----------------------------------- to be modified ---------------------------------------------------

  public function Casualties( $name )     //to be modified
  {
    $sql = "select precautions from Disaster where name = '" . $name . "'";


    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function AllYear( $year )     //to be modified
  {
    $sql = "select precautions from Disaster where year = '" . $year . "'";


    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function AllMonth( $month )     //to be modified
  {
    $sql = "select precautions from Disaster where month = '" . $month . "'";


    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function AllDay( $day )     //to be modified
  {
    $sql = "select precautions from Disaster where name = '" . $name . "'";


    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function AllDate( $year , $month , $day )     //to be modified
  {
    $sql = "select precautions from Disaster where name = '" . $name . "'";


    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function DMonth( $month , $day )     //to be modified
  {
    $sql = "select precautions from Disaster where name = '" . $name . "'";


    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function Dyear( $year , $day )     //to be modified
  {
    $sql = "select precautions from Disaster where name = '" . $name . "'";


    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function Myear( $year , $month )     //to be modified
  {
    $sql = "select precautions from Disaster where name = '" . $name . "'";


    if (mysqli_query($this->conn, $sql)) {

        echo "Data retrived successfully";
        $data = mysqli_query($this->conn, $sql);
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }



  function __destruct()
  {
    mysqli_close($this->conn);
  }
}
