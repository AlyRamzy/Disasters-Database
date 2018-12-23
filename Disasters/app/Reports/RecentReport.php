<?php

namespace App\Reports;

require_once "koolreport/autoload.php";
use \koolreport\processes\Group;
use \koolreport\processes\Sort;
use \koolreport\processes\Limit;

class RecentReport extends \koolreport\KoolReport
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
        ->query("SELECT * FROM incident WHERE year = (SELECT MAX(year) FROM incident)")
        ->pipe(new Sort(array(
            "eco_loss"=>"desc"
        )))
        ->pipe($this->dataStore('incident'));
    }
}
