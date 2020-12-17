<?php
include("db_con.php");
$query = 'SELECT materials.id as id, sites.name as siteName, sites.workArea as area, materials.name as materialName FROM materials INNER JOIN sites ON materials.sitesId=sites.id';

$result = $con->query($query);
$materials = array();

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $newMaterial = array(
      "id" => $row['id'],
      "site" => $row['siteName']." - ".$row['area'],
      "material" => $row['materialName']
    );
    array_push($materials, $newMaterial);
  }
}

return $materials;

$con->close();
?>
