<?php
  header('Content-type: text/json');

  if(isset($_GET['id'])){
    $json = array("id" => $_GET['id'],
      "week" => 49,
      "area"  => "Fisciano - Molding",
      "type"  => "Mechanical",
      "intTime"  => 120,
      "workspaceNote" => "The paint is closed from 00/00/00 to 00/00/00;",
      "description" => "Replacement of robot 21 welding cable",
      "skills" => array("Electrical Maintenance", "Knowledge of cable types", "XYZ-type robot knowledge"),
      "SMP" => "/file/smp.pdf"
      );
  }else{
    $json = array(array(
      "week" => 49,
      "activities" => array(
        array(
          "id" => 13,
          "area"  => "Fisciano - Molding",
          "type"  => "Mechanical",
          "intTime"  => 120),
        array(
          "id" => 14,
          "area" => "Nusco - Carpentry",
          "type" => "Electric",
          "intTime" => 30
        )
      )
    )
    );
  }

  echo json_encode($json);
