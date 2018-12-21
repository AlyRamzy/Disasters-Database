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

//----------------------------------------------------------

  public function addReport($description)
  {
    $sql = "Insert into Report (content, citizen_ssn) values ('" . $description . "', '011111111')"; //User SSN s is to be taken from the cookie once log in is done

    if (mysqli_query($this->conn, $sql)) {

        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
    }
  }


//-----------------------------------------------------------------

public function Citizens()
{

  $sql = "select person.ssn , person.name from citizen , person where citizen.ssn = person.ssn; ";

  if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn , $sql);
      echo "Data retrived successfully";
      return ($data);
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      return;
  }
}

//----------------------------------------------------------------


public function Govns()
{

  $sql = "select person.ssn , person.name from government_representative , person where government_representative.ssn = person.ssn ;";

  if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn , $sql);
      echo "Data retrived successfully";
      return ($data);

  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      return;
}

}

//-------------------------------------------------------------------------

public function ExchangeCitizen( $ssn , $ssnA )
{

$sql = "select username , password from citizen where ssn =  '" . $ssn . "' ;";

if (mysqli_query($this->conn, $sql)) {

    $data = mysqli_query($this->conn , $sql);
    $data = mysqli_fetch_assoc($data);

    $username = $data['username'];
    $password = $data['password'];

    echo "Data retrived successfully";
    echo $username;
    echo $password;

    $sql = "Delete from citizen where ssn = '" . $ssn . "' ;";

    if (mysqli_query($this->conn, $sql)) {

        echo "Data deleted successfully";

        $sql = "insert into admin (ssn , username , password ) values ( '" . $ssn . "', '" . $username ."' , '" . $password . "' )";

        if(mysqli_query($this ->conn, $sql))
        {
            echo "Admin Added successfully";

            $sql = " update admin SET no_added_admins = no_added_admins + 1 where ssn = '" . $ssnA . "' ;";

            if(mysqli_query($this ->conn, $sql))
            {
                echo "data selected successfully";
                return;
              } else { echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                           return;}


        } else {   echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                     return; }

     } else {   echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                  return; }

} else {   echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
             return; }

}

//------------------------------------------------------------------------

public function ExchangeGovn( $ssn , $ssnA)
{

$sql = "select username , password from government_representative  where ssn = '" . $ssn .  "' ;";

if (mysqli_query($this->conn, $sql)) {

    $data = mysqli_query($this->conn , $sql);
    $data = mysqli_fetch_assoc($data);

    $username = $data['username'];
    $password = $data['password'];

    echo "Data retrived successfully";

    $sql = "Delete from government_representative where ssn = '" . $ssn . "' ;";

    if (mysqli_query($this->conn, $sql)) {

        echo "Data deleted successfully";

        $sql = "insert into admin (ssn , username , password ) values ( '" . $ssn . "', '" . $username ."' , '" . $password . "' )";

        if(mysqli_query($this ->conn, $sql))
        {
            echo "Admin Added successfully";

            $sql = " update admin SET no_added_admins = no_added_admins + 1 where ssn = '" . $ssnA . "' ;";

            if(mysqli_query($this ->conn, $sql))
            {
                echo "data selected successfully";
                return;
              } else { echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                           return;}


        } else {   echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                     return; }

     } else {   echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                  return; }

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
    return;}
}

//------------------------------------------------------------------------

  public function newAdmin($name , $username , $password , $gender , $address , $ssn , $age , $Assn)
  {

    $sql1 = "Insert into person (ssn, name , gender , address) values ('" . $ssn . "', '" . $name . "', " . $gender . ", '" . $address . "' )";
    $sql2 = "Insert into Admin (ssn, username , password ) values ('" . $ssn . "', '" . $username ."' , '" . $password . "' )";
    if (mysqli_query($this->conn, $sql1)) {

      if (mysqli_query($this->conn, $sql2)) {
                echo "New record created successfully";
                $sql = " update admin SET no_added_admins = no_added_admins + 1 where ssn = '" . $Assn . "' ;";

                if(mysqli_query($this ->conn, $sql))
                {
                    echo "data selected successfully";
                    return;
                  } else { echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                               return;}

      } else {
              echo "Error: " . $sql2 . "<br>" . mysqli_error($this->conn);

    }
          } else {
              echo "Error: " . $sql1 . "<br>" . mysqli_error($this->conn);

          }
  }

//----------------------------------------------------------------------

public function getALLSSN()
{
  $sql = "select ssn from person;";
  if(mysqli_query($this->conn, $sql))
  {
    $data = mysqli_query($this->conn, $sql);
    return ($data);
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
  }
}


//----------------------------------------------------------------------

  public function DCauses($name )
  {
    $sql = "select possible_causes from disaster where name = '" . $name . "'";

    if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn, $sql);
      if(mysqli_num_rows($data) !=0)
      {
          echo "data retreived successfully";
          return ($data);
      }
        echo "Disaster Name Doesn't exist please make sure of the name you entered";
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }

  }

//---------------------------------------------------------------------------

  public function DPrecautions( $name )
  {
    $sql = "select precautions from Disaster where name = '" . $name . "'";


    if (mysqli_query($this->conn, $sql)) {

        $data = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($data) !=0)
        {
            echo "data retreived successfully";
            return ($data);
        }
          echo "Disaster Name Doesn't exist please make sure of the name you entered";
          return ($data);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

//---------------------------------------------------------------------------

  public function Casualties( $name )
  {
    $sql = "select deg_of_loss , incident.name , location ,  description , year , month , day
    from person, casualty, incident , casualty_incident
    where  id = incident_id and person.ssn = casualty.ssn and casualty.ssn = casualty_ssn and person.name = '" . $name . "';" ;

    if (mysqli_query($this->conn, $sql)) {

        $data = mysqli_query($this->conn, $sql);

        if(mysqli_num_rows($data) !=0)
        {
            echo "data retreived successfully";
            return ($data);
        }
          echo "Casualty Name Doesn't exist ";
          return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }


  //-------------------------------------------------------------------

  public function AllYear( $year )
  {
      $sql = "select * from incident where year = '" . $year .  "';";


    if (mysqli_query($this->conn, $sql)) {

        $data = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($data) !=0)
        {
            echo "data retreived successfully";
            return ($data);
        }
          echo "No Incident in this Date :) ";
          return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

//--------------------------------------------------------------

  public function AllMonth( $month )
  {
      $sql = "select * from incident where month = '" . $month . "';";

    if (mysqli_query($this->conn, $sql)) {

        $data = mysqli_query($this->conn, $sql);
        if(mysqli_num_rows($data) !=0)
        {
            echo "data retreived successfully";
            return ($data);
        }
          echo "No Incident in this Date :) ";
          return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

//-----------------------------------------------------------------------

  public function AllDay( $day )
  {
      $sql = "select * from incident where day = '" . $day . "';";


    if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn, $sql);
      if(mysqli_num_rows($data) !=0)
      {
          echo "data retreived successfully";
          return ($data);
      }
        echo "No Incident in this Date :) ";
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

//-------------------------------------------------------------------

  public function AllDate( $year , $month , $day )
  {
      $sql = "select * from incident where year = '" . $year . "' , month = '" . $month . "' , day = '" . $day . "';";


    if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn, $sql);
      if(mysqli_num_rows($data) !=0)
      {
          echo "data retreived successfully";
          return ($data);
      }
        echo "No Incident in this Date :) ";
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

//-------------------------------------------------------------------

  public function DMonth( $month , $day )
  {
      $sql = "select * from incident where month = '" . $month . "' , day = '" . $day . "';";


    if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn, $sql);
      if(mysqli_num_rows($data) !=0)
      {
          echo "data retreived successfully";
          return ($data);
      }
        echo "No Incident in this Date :) ";
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

//--------------------------------------------------------------------

  public function Dyear( $year , $day )
  {
    $sql = "select * from incident where year = '" . $year . "' , day = '" . $day . "';";


    if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn, $sql);
      if(mysqli_num_rows($data) !=0)
      {
          echo "data retreived successfully";
          return ($data);
      }
        echo "No Incident in this Date :) ";
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

//-----------------------------------------------------------------

  public function Myear( $year , $month )
  {
    $sql = "select * from incident where year = '" . $year . "' , month = '" . $month . "';";


    if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn, $sql);
      if(mysqli_num_rows($data) !=0)
      {
          echo "data retreived successfully";
          return ($data);
      }
        echo "No Incident in this Date :) ";
        return ($data);

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

//------------------------------------------------------------------

  function __destruct()
  {
    mysqli_close($this->conn);
  }
}
