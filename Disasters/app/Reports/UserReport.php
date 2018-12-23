<?php

namespace App\Reports;

require_once "koolreport/autoload.php";
use \koolreport\processes\Group;
use \koolreport\processes\Sort;
use \koolreport\processes\Limit;

class UserReport extends \koolreport\KoolReport
{
    public function settings()
    {
        return array(
            "dataSources"=>array(
                "disasters"=>array(
                    "connectionString"=>"mysql:host=localhost;dbname=disasters",
                    "username"=>"root",
                    "password"=>"",
                    "charset"=>"utf8"
                )
            )
        );
    }

    public function setup()
    {
        $this->src('disasters')
        ->query("SELECT username, trust_level FROM citizen")
        ->pipe(new Sort(array(
            "trust_level"=>"desc"
        )))
        ->pipe($this->dataStore('citizen'));
    }
}
