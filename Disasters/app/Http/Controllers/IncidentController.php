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
        $exec =new QueryExecutor();
        $disasters=$exec->InsertNatural();
        
        return view ('/Natural',compact('disasters'));//['disasters'=>$dis]);
    }

    public function Addhumanmade()
    {
       $Eco_Loss=request('Economical');
       $date=request('Date');
       $description=request('Description');
       $location=request('Location');
       $name=request('disaster');
       $causes=request('Causes');

       $thedate = explode("-", $date);

    
       $year = $thedate[0]; 
       $month = $thedate[1]; 
       $day= $thedate[2]; 

       $exec =new QueryExecutor();
       $disasters=$exec->InsertHumanMade($Eco_Loss,$year,$month,$day,$description,$location,$name,$causes);
        
       // return view ('/Natural',compact('disasters'));//['disasters'=>$dis]);
       return redirect('/Human_Made');
    }



    //
}
