<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryExecutor;

class IncidentController extends Controller
{
    public function humanmade()
    {
        $exec =new QueryExecutor();
        $disasters=$exec->GetDisasters();
        
        return view ('/Human_Made',compact('disasters'));//['disasters'=>$dis]);
    }
    public function natural()
    {
        $exec =new QueryExecutor();
        $disasters=$exec->GetDisasters();
        
        return view ('/Natural',compact('disasters'));//['disasters'=>$dis]);
    }

    public function Addnatural()
    {
        request()->validate([

            'Date'=>'required',
            'Location'=>'required',
            'disaster'=>'required'

        ]);
        
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
        $name=request('disaster');
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
        $disasters=$exec->InsertNatural($Eco_Loss,$year,$month,$day,$description,$location,$name,$Freq,$phy_parm);
         
        
        return $this->natural();
    }

    public function Addhumanmade()
    {
        request()->validate([

            'Date'=>'required',
            'Location'=>'required',
            'disaster'=>'required'
        ]);
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
       $location=request('Location');
       $name=request('disaster');
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
       $disasters=$exec->InsertHumanMade($Eco_Loss,$year,$month,$day,$description,$location,$name,$causes);
        
       // return view ('/Natural',compact('disasters'));//['disasters'=>$dis]);
       return $this->humanmade();
    }



    //
}
