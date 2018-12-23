<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QueryExecutor;

class Profile extends Controller
{
    public function GovRep()
    {
        
        $exec=new QueryExecutor();
        //$ssn=21510971420378;
       
        $ssn = $_COOKIE['user'];
        $data=$exec->GetAllGovInfo($ssn);
       
        $govrep=mysqli_fetch_assoc($data);
        if($govrep['gender']==1)
        {
            $govrep['gender']='Male';
        }
        else 
        {
            $govrep['gender']='female';
        }
        
        
        return view('/Profile_Govn_Rep',compact('govrep'));

    }
    public function Admin()
    {
        
        $exec=new QueryExecutor();
        //$ssn=141316582;
        $ssn = $_COOKIE['user'];
        $data=$exec->GetAllAdminInfo($ssn);
       
        $admin=mysqli_fetch_assoc($data);
        if($admin['gender']==1)
        {
            $admin['gender']='Male';
        }
        else 
        {
            $admin['gender']='female';
        }

        
        
        return view('/Profile_Admin',compact('admin'));

    }
    
    public function Citizent()
    {
        
        $exec=new QueryExecutor();
       // $ssn=141316582;
       $ssn = $_COOKIE['user'];
        $data=$exec->GetAllCitizenInfo($ssn);
       
        $citizent=mysqli_fetch_assoc($data);
        if($citizent['gender']==1)
        {
            $citizent['gender']='Male';
        }
        else 
        {
            $citizent['gender']='female';
        }
        
        
        return view('/Profile_Citizent',compact('citizent'));

    }
    //
}
