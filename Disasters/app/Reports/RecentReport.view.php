<?php
    use \koolreport\widgets\koolphp\Table;
    use \koolreport\widgets\google\BarChart;
?>

<div class="report-content">
  <div class="text-center">
      <h1>Recents Report</h1>
      <h4>This report gives a view of recent incidents.</h4>
  </div>
  <hr/>

  <?php
  Table::create(array(
      "dataStore"=>$this->dataStore('incident'),
          "columns"=>array(
              "name"=>array(
                  "type"=>"name",
                  "label"=>"Name"
              ),
              "eco_loss"=>array(
                  "type"=>"number",
                  "label"=>"Economical Losses"
              ),
              "type"=>array(
                  "type"=>"name",
                  "label"=>"Disaster Type"
              ),
              "description"=>array(
                  "type"=>"name",
                  "label"=>"Description"
              ),
              "location"=>array(
                  "type"=>"name",
                  "label"=>"Location"
              )
          ),
      "cssClass"=>array(
          "table"=>"table table-hover table-bordered"
      )
  ));
  ?>
</div>
