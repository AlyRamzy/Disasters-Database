<?php
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>

<div class="text-center">
    <h1>Overall Report</h1>
    <h4>This report gives an overall view of the important events.</h4>
</div>
<hr/>

<?php
    BarChart::create(array(
        "dataStore"=>$this->dataStore('criminal'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            "name"=>array(
                "label"=>"Name"
            ),
            "no_of_crimes"=>array(
                "type"=>"number",
                "label"=>"# of Crimes"
            )
        ),
        "options"=>array(
            "title"=>"Criminals"
        )
    ));
?>

<?php
    BarChart::create(array(
        "dataStore"=>$this->dataStore('casualty'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            "name"=>array(
                "label"=>"Name"
            ),
            "deg_of_loss"=>array(
                "type"=>"number",
                "label"=>"Degree of Loss"
            )
        ),
        "options"=>array(
            "title"=>"Casaulties"
        )
    ));
?>

<?php
    BarChart::create(array(
        "dataStore"=>$this->dataStore('incident'),
        "width"=>"100%",
        "height"=>"500px",
        "columns"=>array(
            "name"=>array(
                "label"=>"Name"
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
