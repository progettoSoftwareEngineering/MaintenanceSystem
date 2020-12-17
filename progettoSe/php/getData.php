<?php
  session_start();
  include("db_con.php");
  
  header('Content-type: text/json');

  if(isset($_GET['id'])){
    $query = 'SELECT activity.week as week, activity.id as id, activity.estimatedTime as intTime,activity.description as description,  activity.typology as type, sites.name as site, sites.workArea as area FROM activity INNER JOIN sites ON activity.sitesId=sites.id HAVING activity.id=?';
    $stmt = $con->prepare($query);
    $stmt-> bind_param('i', $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
      $json = array(
        "week" =>$row["week"],
        "id" => $row["id"],
        "area"  => $row['site']." - ".$row['area'],
        "type"  => $row['type'],
        "intTime"  => $row['intTime'],
        "description" => $row['description'],
        "skills" => array("Electrical Maintenance", "Knowledge of cable types", "XYZ-type robot knowledge"),
        "SMP" => "../src/file/smp.pdf");
    }
    $con->close();
  }else{
    $query = 'SELECT activity.week as week, activity.id as id, activity.estimatedTime as intTime, activity.typology as type, sites.name as site, sites.workArea as area FROM activity INNER JOIN sites ON activity.sitesId=sites.ID';

    $result = $con->query($query);

    if ($result->num_rows > 0) {
      $json = array();
      while($row = $result->fetch_assoc()) {
        $activity = array(
          "week" =>$row["week"],
          "id" => $row["id"],
          "area"  => $row['site']." - ".$row['area'],
          "type"  => $row['type'],
          "intTime"  => $row['intTime']);
        array_push($json, $activity);
      }
    } else {
      echo "0 results";
    }
    $con->close();
  }

  echo json_encode($json);
