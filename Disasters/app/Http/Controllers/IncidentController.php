<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\QueryExecutor;

class IncidentController extends Controller
{

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


    public function humanmade()
    {
        $exec =new QueryExecutor();
        $disasters=$exec->GetDisasters();

        $reports=$exec->GetReports();

        return view ('/Human_Made',compact('disasters'),compact('reports'));//['disasters'=>$dis])
    }

    public function natural()
    {
        $exec =new QueryExecutor();
        $disasters=$exec->GetDisasters();

        $reports=$exec->GetReports();

        return view ('/Natural',compact('disasters'),compact('reports'));//['disasters'=>$dis]);

    }

    public function Addnatural()
    {
        request()->validate([

            'Date'=>'required',
            'Location'=>'required',
            'disaster'=>'required',
            'name'=>'required'

        ]);

        $report_id= request('report');
        if (empty($report_id))
        {
            $report_id=-1;
        }

        $Eco_Loss=request('Economical');
        if (empty($Eco_Loss))
        {
            $Eco_Loss="NULL";

        }
        else{
            $Eco_Loss="'".$Eco_Loss."'";
        }
        $date=request('Date');
        $description=request('Description');
        if (empty($description))
        {
            $description='NULL';

        }
        else{
            $description="'".$description."'";
        }
        $location=request('Location');

        $type=request('disaster');
        $name=request('name');
        if (empty($name))
        {
            $name='NULL';

        }
        else{
            $name="'".$name."'";
        }

        $Freq=request('Frequency');
        if (empty($Freq))
        {
            $Freq="NULL";

        }
        $phy_parm=request('Physical_Parameters');
        if (empty($phy_parm))
        {
            $phy_parm="NULL";

        }
        else{
            $phy_parm="'".$phy_parm."'";
        }

        $thedate = explode("-", $date);


        $year = $thedate[0];
        $month = $thedate[1];
        $day= $thedate[2];

        $exec =new QueryExecutor();

        $disasters=$exec->InsertNatural($Eco_Loss,$year,$month,$day,$description,$location,$type,$Freq,$phy_parm,$report_id,$name);

        //return $disasters;

        return $this->natural();
    }

    public function Addhumanmade()
    {
        request()->validate([

            'Date'=>'required',
            'Location'=>'required',
            'disaster'=>'required',
            'name'=>'required'
        ]);
        $report_id= request('report');
        if (empty($report_id))
        {
            $report_id=-1;
        }

       $Eco_Loss=request('Economical');
       if (empty($Eco_Loss))
        {
            $Eco_Loss="NULL";

        }
        else{
            $Eco_Loss="'".$Eco_Loss."'";
        }
       $date=request('Date');
       $description=request('Description');
       if (empty($description))
       {
           $description='NULL';

       }
       else
       {
           $description="'".$description."'";
       }
       $name=request('name');
        if (empty($name))
        {
            $name='NULL';

        }
        else{
            $name="'".$name."'";
        }
       $location=request('Location');
       $type=request('disaster');

       $causes=request('Causes');
       if (empty($causes))
       {
           $causes='NULL';

       }
       else
       {
           $causes="'".$causes."'";
       }

       $thedate = explode("-", $date);


       $year = $thedate[0];
       $month = $thedate[1];
       $day= $thedate[2];

       $exec =new QueryExecutor();

       $disasters=$exec->InsertHumanMade($Eco_Loss,$year,$month,$day,$description,$location,$type,$causes,$report_id,$name);


       // return view ('/Natural',compact('disasters'));//['disasters'=>$dis]);
       return $this->humanmade();
    }


//---------------------------------------------------------------------

  public function VIncident()
  {

    $executor = new QueryExecutor();

    $day = request('Iday');
    $month = request('Imonth');
    $year = request('Iyear');

    if (empty($day) && empty($month) && empty($year))
    {
      echo "Enter a Date you want to search for :)";
      return view('/Disaster_View') ;
    }
    if(!empty($day) && empty($year) && empty($month))
    {
          $data = $executor->AllDay($day);
    }
    elseif(empty($day) && empty($year) && !empty($month))
    {
          $data = $executor->AllMonth($month);
    }
    elseif(empty($day) && !empty($year) && empty($month))
    {
          $data = $executor->AllYear($year);
    }
    elseif(!empty($day) && empty($year) && !empty($month))
    {
          $data = $executor->DMonth($month , $day);
    }
    elseif(!empty($day) && !empty($year) && empty($month))
    {
          $data = $executor->Dyear($year , $day);
    }
    elseif(empty($day) && !empty($year) && !empty($month))
    {
          $data = $executor->Myear($year , $month);
    }
    elseif(!empty($day) && !empty($year) && !empty($month))
    {
        $data = $executor->AllDate($year , $month , $day);
    }

    if (mysqli_num_rows($data) == 0)
    {
      return view('/Disaster_View');
    }

    $num =  mysqli_num_rows($data);

    $data =  $this->proc_result($data);

    if(!isset($_COOKIE['visibility'])) {
      return view('/DView' , ['ID' => (array)$data['id'] ,
                                      'DName' =>(array)$data['name'],
                                      'Eco_losses' => (array)$data['eco_loss'] ,
                                      'Location' =>(array)$data['location'],
                                     'description' => (array)$data['description'] ,
                                     'year' => (array)$data['year'] ,
                                     'month' => (array)$data['month'] ,
                                     'day' => (array)$data['day'] ,
                                      'n' => $num] ) ;
    } else {
        $visibile = $_COOKIE['visibility'];
        $n = mysqli_num_rows($data);

        $eco_arr = array();
        if ($visible['eco_loss'])
        {
          for ($i = 0; $i < $n ; $i++)
          {
            array_push($eco_arr, 'HIDDEN');
          }
        }

        $loc_arr = array();
        if ($visible['location'])
        {
          for ($i = 0; $i < $n ; $i++)
          {
            array_push($loc_arr, 'HIDDEN');
          }
        }

        $des_arr = array();
        if ($visible['description'])
        {
          for ($i = 0; $i < $n ; $i++)
          {
            array_push($des_arr, 'HIDDEN');
          }
        }

        $year_arr = array();
        if ($visible['year'])
        {
          for ($i = 0; $i < $n ; $i++)
          {
            array_push($year_arr, 'HIDDEN');
          }
        }

        $mon_arr = array();
        if ($visible['month'])
        {
          for ($i = 0; $i < $n ; $i++)
          {
            array_push($mon_arr, 'HIDDEN');
          }
        }

        $day_arr = array();
        if ($visible['day'])
        {
          for ($i = 0; $i < $n ; $i++)
          {
            array_push($day_arr, 'HIDDEN');
          }
        }

        return view('/DView' , ['ID' => (array)$data['id'] ,
                                        'DName' =>(array)$data['name'],
                                        'Eco_losses' => $eco_arr ,
                                        'Location' => $loc_arr,
                                       'description' => $des_arr ,
                                       'year' => $year_arr ,
                                       'month' => $mon_arr ,
                                       'day' => $day_arr ,
                                        'n' => $num ]) ;
    }
  }
}
