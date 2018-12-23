<?php

namespace App\Reports;

require_once "koolreport/autoload.php";
use \koolreport\processes\Group;
use \koolreport\processes\Sort;
use \koolreport\processes\Limit;

class OverallReport extends \koolreport\KoolReport
{
    public function settings()
    {
        return array(
            "dataSources"=>array(
                "stats"=>array(
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
        $this->src('stats')
        ->query("SELECT name, eco_loss, type FROM Incident")
        ->pipe(new Group(array(
            "by"=>"type",
            "sum"=>"eco_loss"
        )))
        ->pipe(new Sort(array(
            "eco_loss"=>"desc"
        )))
        ->pipe(new Limit(array(10)))
        ->pipe($this->dataStore('incident'));
    }
}
