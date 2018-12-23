<?php
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>

<div class="text-center">
    <h1>Incident Report</h1>
    <h4>This report gives a view of economical losses of all incidents.</h4>
</div>
<hr/>

<?php
    BarChart::create(array(
        "dataStore"=>$this->dataStore('incident'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            "name"=>array(
                "label"=>"name"
            ),
            "eco_loss"=>array(
                "type"=>"number",
                "label"=>"Economical Losses"
            )
        ),
        "options"=>array(
            "title"=>"Incidents"
        )
    ));
?>
