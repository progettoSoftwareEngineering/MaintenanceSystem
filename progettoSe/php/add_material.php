<?php

session_start();

include("db_con.php");

$nome = $_POST['materialName'];
$siteId = $_POST['siteId'];

if ($stmt = $con->prepare('INSERT INTO materials (sitesId, name) VALUES ( ?, ?)'))
{
  $stmt -> bind_param('is', $siteId, $nome);
  $stmt -> execute();

  $stmt->close();
  echo "Material Added!";
  echo "<meta http-equiv='refresh' content='1; URL=../html/RM_materials.php'>";
}
else
  die('Query al Database non riuscita!');

$con->close();
?>
