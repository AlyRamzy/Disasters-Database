<?php
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>

<div class="text-center">
    <h1>User Report</h1>
    <h4>This report gives a view of citizen trust levels.</h4>
</div>
<hr/>

<?php
    BarChart::create(array(
        "dataStore"=>$this->dataStore('citizen'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            "username"=>array(
                "label"=>"name"
            ),
            "trust_level"=>array(
                "type"=>"number",
                "label"=>"Trust Level"
            )
        ),
        "options"=>array(
            "title"=>"Users"
        )
    ));
?>
