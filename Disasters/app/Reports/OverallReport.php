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
        ->query("SELECT name, no_of_crimes FROM person p, criminal c WHERE p.ssn = c.ssn")
        ->pipe(new Sort(array(
            "no_of_crimes"=>"desc"
        )))
        ->pipe($this->dataStore('criminal'));

        $this->src('disasters')
        ->query("SELECT name, deg_of_loss FROM person p, casualty c WHERE p.ssn = c.ssn")
        ->pipe(new Sort(array(
            "deg_of_loss"=>"desc"
        )))
        ->pipe($this->dataStore('casualty'));

        $this->src('disasters')
        ->query("SELECT name, type, eco_loss FROM incident")
        ->pipe(new Group(array(
            "by"=>"type"
        )))
        ->pipe(new Sort(array(
            "eco_loss"=>"desc"
        )))
        ->pipe($this->dataStore('incident'));
    }
}
