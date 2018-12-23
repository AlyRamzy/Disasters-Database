<?php
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>

<div class="text-center">
    <h1>Overall Report</h1>
    <h4>This report shows top 10 disasters with economical loss.</h4>
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
                "label"=>"Amount",
                "prefix"=>"$"
            )
        ),
        "options"=>array(
            "title"=>"Incident"
        )
    ));
?>
