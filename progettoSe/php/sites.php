<?php
include("db_con.php");
$query = 'SELECT id as id, name, workArea FROM sites';

$result = $con->query($query);
$sites = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $area = array(
      "id" => $row['id'],
      "site" => $row['name'],
      "workArea" => $row['workArea']
    );
    array_push($sites, $area);
  }
}

return $sites;

$con->close();
?>
