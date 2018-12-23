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

  public function GetAllGovInfo($ssn)
  {
    $sql="SELECT * FROM person p,government_representative g WHERE p.ssn=g.ssn AND p.ssn=  '".$ssn."'";
    if(mysqli_query($this->conn,$sql)){

      $data= mysqli_query($this->conn,$sql);
      return ($data);
    }
    else{
      echo "Error "."<br>". mysqli_error($this->conn);
      return;

    }

  }
  
 public function getALLUSSN()
 {
   $sql = " (select person.ssn from person, government_representative where person.ssn =  government_representative.ssn)
      Union (select person.ssn from person, admin where person.ssn =  admin.ssn);
      Union (select person.ssn from person, citizen where person.ssn =  citizen.ssn );";

      if(mysqli_query($this->conn,$sql)){

        $data= mysqli_query($this->conn,$sql);
        return ($data);
      }
      else{
        echo "Error "."<br>". mysqli_error($this->conn);
        return;

      }

 }
  
  public function GetAllAdminInfo($ssn)
  {
    $sql="SELECT * FROM person p,admin d WHERE p.ssn=d.ssn AND p.ssn=  '".$ssn."'";
    if(mysqli_query($this->conn,$sql)){

      $data= mysqli_query($this->conn,$sql);
      return ($data);
    }
    else{
      echo "Error "."<br>". mysqli_error($this->conn);
      return;

    }

  }
  public function GetAllCitizenInfo($ssn)
  {
    $sql="SELECT * FROM person p,citizen c WHERE p.ssn=c.ssn AND p.ssn=  '".$ssn."'";
    
    if(mysqli_query($this->conn,$sql)){

      $data= mysqli_query($this->conn,$sql);
      return ($data);
    }
    else{
      echo "Error "."<br>". mysqli_error($this->conn);
      return;

    }

  }

  public function AllCriminals()
  {
    $sql = "select ssn from criminal;";
    if (mysqli_query($this->conn, $sql)) {

      echo "data retrived  successfully";
      $data = mysqli_query($this->conn, $sql);
      return($data);

    } else { echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                           return;}

  }


  public function AddCriminals($name, $gender , $address , $ssn , $age , $NoC , $State , $Nov ,   $inc_Id)
  {
    $allSSNs = $this->getALLSSN();
    $CSSNs = $this ->AllCriminals();

    if (in_array($ssn, (array)$allSSNs))
    {
      if (in_array($ssn, (array)$CSSNs))
      {
        $sql = "select * from criminal_hm_incident where hm_incident_id  = '" .  $inc_Id .  "' and criminal_ssn = '" . $ssn . "' );";

        if (mysqli_query($this->conn, $sql)) {

          $data = mysqli_query($this->conn, $sql);

        if( mysqli_num_rows($data) == 0 ) {

        $sql = "insert into criminal_hm_incident (hm_incident_id  , criminal_ssn) values ('" .  $inc_Id .  "', '" . $ssn . "' );";

        if(mysqli_query($this->conn, $sql)){

          echo "data inserted successfully";
          return;
        } else { echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                               return;}

        } else {

          echo " this Criminal already exists in this incident ";
          return;  }

        } else { echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                               return;}


      } else {

        $sql1 = "Insert into criminal (ssn, no_of_crimes , current_state , no_of_victims  ) values ('" . $ssn . "', " . $NoC . "," . $State . " , " . $Nov . ");";
        $sql2 = "insert into criminal_hm_incident (hm_incident_id  , criminal_ssn) values ('" .  $inc_Id .  "', '" . $ssn . "' );";
        if (mysqli_query($this->conn, $sql1)) {

          if(mysqli_query($this->conn, $sql2)){

            echo "data inserted successfully";
            return;
          } else { echo "Error: " . $sql2 . "<br>" . mysqli_error($this->conn);
                                 return;}

        } else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($this->conn);}

      }

    } else  {

      $sql1 = "Insert into person (ssn, name , gender , address) values ('" . $ssn . "', '" . $name . "', " . $gender . ", '" . $address . "' );";
      $sql2 = "Insert into criminal (ssn, no_of_crimes , current_state , no_of_victims  ) values ('" . $ssn . "', " . $NoC . "," . $State . " , " . $Nov . ");";
      $sql3 =  "insert into criminal_hm_incident (hm_incident_id  , criminal_ssn) values ('" .  $inc_Id .  "', '" . $ssn . "' );";

      if (mysqli_query($this->conn, $sql1)) {

        if (mysqli_query($this->conn, $sql2)) {

          if(mysqli_query($this->conn, $sql3)){

            echo "data inserted successfully";
            return;
          } else { echo "Error: " . $sql3 . "<br>" . mysqli_error($this->conn);
                                 return;}

        } else {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($this->conn);}

            } else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($this->conn);  }
    }

  }



  public function ALLCasualty()
  {
    $sql = "select ssn from casualty;";
    if (mysqli_query($this->conn, $sql)) {

      echo "data retrived  successfully";
      $data = mysqli_query($this->conn, $sql);
      return($data);

    } else { echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                           return;}

  }


  public function AddC($name, $gender , $address , $ssn , $age , $deg ,   $inc_Id)
  {
    $allSSNs = $this->getALLSSN();
    $CSSNs = $this ->ALLCasualty();
    if (in_array($ssn, (array)$allSSNs))
    {
      if (in_array($ssn, (array)$CSSNs))
      {
        $sql = "select * from casualty_incident where incident_id = '" .  $inc_Id .  "' and casualty_ssn = '" . $ssn . "' );";

        if (mysqli_query($this->conn, $sql)) {

          $data = mysqli_query($this->conn, $sql);

        if( mysqli_num_rows($data) == 0 ) {

        $sql = "insert into casualty_incident (incident_id  , casualty_ssn) values ('" .  $inc_Id .  "', '" . $ssn . "' );";

        if(mysqli_query($this->conn, $sql)){

          echo "data inserted successfully";
          return;
        } else { echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                               return;}

        } else {

          echo " this Casualty already exists in this incident ";
          return;
        }


        } else { echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                               return;}


      } else {

        $sql1 = "Insert into casualty (ssn, deg_of_loss) values ('" . $ssn . "', " . $deg . " );";
        $sql2 = "insert into casualty_incident (incident_id  , casualty_ssn) values ('" .  $inc_Id .  "', '" . $ssn . "' );";
        if (mysqli_query($this->conn, $sql1)) {

          if(mysqli_query($this->conn, $sql2)){

            echo "data inserted successfully";
            return;
          } else { echo "Error: " . $sql2 . "<br>" . mysqli_error($this->conn);
                                 return;}

        } else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($this->conn);}

      }

    } else  {

      $sql1 = "Insert into person (ssn, name , gender , address) values ('" . $ssn . "', '" . $name . "', " . $gender . ", '" . $address . "' );";
      $sql2 = "Insert into casualty (ssn, deg_of_loss) values ('" . $ssn . "', " . $deg . " );";
      $sql3 = "insert into casualty_incident (incident_id  , casualty_ssn) values ('" .  $inc_Id .  "', '" . $ssn . "' );";

      if (mysqli_query($this->conn, $sql1)) {

        if (mysqli_query($this->conn, $sql2)) {

          if(mysqli_query($this->conn, $sql3)){

            echo "data inserted successfully";
            return;
          } else { echo "Error: " . $sql3 . "<br>" . mysqli_error($this->conn);
                                 return;}

        } else {
                echo "Error: " . $sql2 . "<br>" . mysqli_error($this->conn);}

            } else {
                echo "Error: " . $sql1 . "<br>" . mysqli_error($this->conn);  }
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
  public function RemoveUser($ssn,$Adminssn)
  {
    //$sql=" DELETE FROM person WHERE ssn= '" . $ssn. "'";
    $sql="DELETE FROM person WHERE ssn='".$ssn. "'";
    //return mysqli_query($this->conn,$sql);
    if(mysqli_query($this->conn,$sql)){
      $sqlnum="SELECT no_banned_users FROM admin WHERE ssn='".$Adminssn."'";
      $num=mysqli_query($this->conn,$sqlnum);
      $num=mysqli_fetch_assoc($num);
      $num=$num['no_banned_users'];
      $num++;
      $update="UPDATE admin SET no_banned_users =".$num." WHERE ssn='".$Adminssn."'";
      if(mysqli_query($this->conn,$update))
      {


      echo "User Removed Successfully";

      return;
      }
      else
      {
        echo "Error Deleting User"."<br>". mysqli_error($this->conn);
      return;

      }
    }
    else{
      echo "Error Deleting User"."<br>". mysqli_error($this->conn);
      return;

    }
  }

  public function GetDiscussions()
  {
    $sql="SELECT dics_id,question,answer,username,ssn,name FROM discussion d, citizen c , incident i WHERE d.citizen_ssn=c.ssn AND d.incident_id =i.id";
    if(mysqli_query($this->conn,$sql)){
      
      $data= mysqli_query($this->conn,$sql);
      return ($data);
    }
    else{
      echo "Error "."<br>". mysqli_error($this->conn);
      return;

    }
  }
  public function AnsDisc($ssn,$answer,$id)
  {
    $sql=" UPDATE discussion SET answer='".$answer."', govn_ssn= ".$ssn." WHERE dics_id=".$id;
    if(mysqli_query($this->conn,$sql)){
      
      echo "Answered Succesfully";
    }
    else{
      echo "Error "."<br>". mysqli_error($this->conn);
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
  
  public function GetReports()
  {
    $sql="SELECT report_id FROM report  WHERE incident_id IS NULL";
    if(mysqli_query($this->conn,$sql)){
      
      $data= mysqli_query($this->conn,$sql);
      return ($data);
    }
    else{
      echo "Error "."<br>". mysqli_error($this->conn);
      return;

    }
  }
  public function InsertHumanMade($Eco_Loss,$year,$month,$day,$description,$location,$type,$causes,$rep_id,$name)
  {

    $sqlinc="INSERT INTO incident (eco_loss, year , month , day , description , location , type , name ) VALUES ("
          .$Eco_Loss .", '" 
          .$year ."', '"
          .$month ."', '"
          .$day ."', "
          .$description . ", '"
          .$location ."', '"
          .$type . "', "
          .$name.")";
    
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

        $sqldis = " update disaster SET no_of_prev_occur = no_of_prev_occur + 1 where name = '" . $type . "' ;";
        mysqli_query($this->conn,$sqldis);
        if($rep_id!=-1)
        {
        $rep="UPDATE report SET incident_id =".$incid." WHERE report_id =".$rep_id. "";
        mysqli_query($this->conn,$rep);
        }

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

  public function InsertNatural($Eco_Loss,$year,$month,$day,$description,$location,$type,$Freq,$physical_parm,$rep_id,$name)
  {
    //return $type;
    $sqlinc="INSERT INTO incident (eco_loss, year , month , day , description , location , type , name ) VALUES ("
          .$Eco_Loss .", '" 
          .$year ."', '"
          .$month ."', '"
          .$day ."', "
          .$description . ", '"
          .$location ."', '"
          .$type . "', "
          .$name.")";
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

        $sqldis = " update disaster SET no_of_prev_occur = no_of_prev_occur + 1 where name = '" . $type . "' ;";
        mysqli_query($this->conn,$sqldis);
         if($rep_id!=-1)
         {
         $rep="UPDATE report SET incident_id =".$incid." WHERE report_id =".$rep_id. "";
         mysqli_query($this->conn,$rep);
         }
         
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

//----------------------------------------------------------------------

public function HInCidents()
{
  $sql = "select Incident.id , Incident.name from Incident , human_made where human_made.id = Incident.id ; ";

  if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn , $sql);
      echo "Data retrived successfully";
      return ($data);
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      return;
  }

}
//-----------------------------------------------------------------------

public function InCidents()
{
  $sql = "select id , name from Incident; ";

  if (mysqli_query($this->conn, $sql)) {

      $data = mysqli_query($this->conn , $sql);
      echo "Data retrived successfully";
      return ($data);
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      return;
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
    $all_ssns = $this ->getALLSSN();
    if (!(in_array($ssn, (array)$all_ssns['ssn'])))
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

  } else {
    
      $sql = "Insert into Admin (ssn, username , password ) values ('" . $ssn . "', '" . $username ."' , '" . $password . "' )";

      if (mysqli_query($this->conn, $sql)) {
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
      $sql = "select * from incident where year = " . $year .  ";";


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
      $sql = "select * from incident where month = " . $month . ";";

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
      $sql = "select * from incident where day = " . $day . ";";


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
      $sql = "select * from incident where year = " . $year . " and month = " . $month . " and day = " . $day . ";";

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
     $sql = "select * from incident where month = " . $month . " and day ='" . $day . ";";


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
    $sql = "select * from incident where year = " . $year . " and day = " . $day . ";";

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
    $sql = "select * from incident where year = " . $year . " and month = " . $month . ";";

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

  public function addReport($description, $ssn)
  {
    $sql = "Insert into Report (content, citizen_ssn) values ('" . $description . "', '".$ssn."')"; //User SSN s is to be taken from the cookie once log in is done

    if (mysqli_query($this->conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
    }
  }

  public function getIncName()
  {
    $sql = "Select name From incident";

    if (mysqli_query($this->conn, $sql)) {
        $data = mysqli_query($this->conn, $sql);
        return ($data);
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        return;
    }
  }

  public function addDisc($inc_name, $question, $ssn)
  {
    $sql = "Select id From incident Where name = '".$inc_name."'";
    if (mysqli_query($this->conn, $sql)) {
        $data = mysqli_query($this->conn, $sql);
        $data = mysqli_fetch_assoc($data);
        $data = $data['id'];

        $sql = "Insert into discussion (question, incident_id,  citizen_ssn) values ('".$question."', ".$data.", '".$ssn."')";

        if (mysqli_query($this->conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
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

  public function getPassword($ssn)
  {
     $sql = "Select password From citizen Where ssn = '".$ssn."' Union Select password From admin Where ssn = '".$ssn.
            "' Union Select password From government_representative Where ssn = '".$ssn."'";
     if (mysqli_query($this->conn, $sql)) {
         $data = mysqli_query($this->conn, $sql);
         return ($data);
     } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
         return;
     }
  }

  public function updatePassword($ssn, $new_password)
  {
    $sql= "Select password From citizen Where ssn = '".$ssn."'";
    if (mysqli_num_rows(mysqli_query($this->conn, $sql)) != 0)
    {
      $sql = "Update citizen Set password = '".$new_password."' Where ssn = '".$ssn."'";
      if (mysqli_query($this->conn, $sql)) {
          echo "Password Updated Successfully";
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      }
    }
    else
    {
      $sql= "Select password From government_representative Where ssn = '".$ssn."'";
      if (mysqli_num_rows(mysqli_query($this->conn, $sql)) != 0)
      {
        $sql = "Update government_representative Set password = '".$new_password."' Where ssn = '".$ssn."'";
        if (mysqli_query($this->conn, $sql)) {
            echo "Password Updated Successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
    }
    else
    {
      $sql= "Select password From admin Where ssn = '".$ssn."'";
      if (mysqli_num_rows(mysqli_query($this->conn, $sql)) != 0)
      {
        $sql = "Update admin Set password = '".$new_password."' Where ssn = '".$ssn."'";
        if (mysqli_query($this->conn, $sql)) {
            echo "Password Updated Successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
        }
      }
    }
  }

  public function GetReportsInfo()
  {
      $sql = "Select report_id, content From report";
      if (mysqli_query($this->conn, $sql)) {
          $data = mysqli_query($this->conn, $sql);
          return ($data);
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
          return;
      }
  }

  public function TrustReport($id, $gov_ssn)
  {
      $sql = "Update report Set govn_ssn = '".$gov_ssn."' Where report_id = ".$id;
      if (mysqli_query($this->conn, $sql)) {
          echo "Updated successfully";
          $sql = "Select citizen_ssn From report where report_id = ".$id;
          if (mysqli_query($this->conn, $sql)) {
              $data = mysqli_query($this->conn, $sql);
              $data = mysqli_fetch_assoc($data);
              $data = $data['citizen_ssn'];
              $sql = "Update Citizen Set trust_level = trust_level + 1 Where ssn = '".$data."'";
              if (mysqli_query($this->conn, $sql)) {
                  echo "Trust Level Increased";
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
                  return;
              }
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
              return;
          }
      } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
      }
  }

  function __destruct()
  {
    mysqli_close($this->conn);
  }
}
