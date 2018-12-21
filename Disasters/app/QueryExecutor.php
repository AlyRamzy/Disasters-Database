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
  public function GetAllUsers()
  {
    $sql="SELECT name,c.ssn FROM person p,citizen c WHERE p.ssn=c.ssn  ";
    if(mysqli_query($this->conn,$sql)){
      
      $data= mysqli_query($this->conn,$sql);
      return ($data);
    }
    else{
      echo "Error "."<br>". mysqli_error($this->conn);
      return;

    }

  }
  public function RemoveUser($ssn)
  {
    //$sql=" DELETE FROM person WHERE ssn= '" . $ssn. "'";
    $sql="DELETE FROM person WHERE ssn='".$ssn. "'";
    //return mysqli_query($this->conn,$sql);
    if(mysqli_query($this->conn,$sql)){
      
      echo "User Removed Successfully";
      return;
    }
    else{
      echo "Error Deleting User"."<br>". mysqli_error($this->conn);
      return;

    }
  }

  public function GetDisasters()
  {
    $sql="SELECT name FROM disaster ";
    if(mysqli_query($this->conn,$sql)){
      
      $data= mysqli_query($this->conn,$sql);
      return ($data);
    }
    else{
      echo "Error "."<br>". mysqli_error($this->conn);
      return;

    }
  }
  public function InsertHumanMade($Eco_Loss,$year,$month,$day,$description,$location,$name,$causes)
  {
    $sqlinc="INSERT INTO incident (eco_loss, year , month , day , description , location , name ) VALUES ("
          .$Eco_Loss .", '" 
          .$year ."', '"
          .$month ."', '"
          .$day ."', "
          .$description . ", '"
          .$location ."', '"
          .$name . "')";
    if(mysqli_query($this->conn,$sqlinc)){
      $sqlID="SELECT MAX(id) FROM incident";
      
      
      $id=mysqli_query($this->conn,$sqlID);
      $idnum=mysqli_fetch_assoc($id);
      $incid=$idnum['MAX(id)'];
      //$incid=$this->conn->insert_id; this only line do all what above do 
       $sqlhuman="INSERT INTO human_made (id, causes) VALUES ("
       .$incid . ", "
       .$causes .")";
       if(mysqli_query($this->conn,$sqlhuman))
       {
         echo "Incident Added Successfully";
         return;
       }
       else{
        echo "Error "."<br>". mysqli_error($this->conn);
        return;
       }
      }
   
    else{
      echo "Error "."<br>". mysqli_error($this->conn);
      return;
    }
  }

  public function InsertNatural($Eco_Loss,$year,$month,$day,$description,$location,$name,$Freq,$physical_parm)
  {
    $sqlinc="INSERT INTO incident (eco_loss, year , month , day , description , location , name ) VALUES ("
          .$Eco_Loss .", '" 
          .$year ."', '"
          .$month ."', '"
          .$day ."', "
          .$description . ", '"
          .$location ."', '"
          .$name . "')";
    if(mysqli_query($this->conn,$sqlinc)){
      $sqlID="SELECT MAX(id) FROM incident";
      
      
      $id=mysqli_query($this->conn,$sqlID);
      $idnum=mysqli_fetch_assoc($id);
      $incid=$idnum['MAX(id)'];
       $sqlnatural="INSERT INTO natural_disaster (id, freq , physical_parameters) VALUES ("
       .$incid . ", "
       .$Freq . ", "
       .$physical_parm .")";
       if(mysqli_query($this->conn,$sqlnatural))
       {
         echo "Incident Added Successfully";
         return;
       }
       else{
        echo "Error "."<br>". mysqli_error($this->conn);
        return;
       }
    }
    else{
        echo "Error "."<br>". mysqli_error($this->conn);
      return;
    }
  }

  function __destruct()
  {
    //parent::__destruct();

    mysqli_close($this->conn);
    //wrong destruct i think 
  }
}
