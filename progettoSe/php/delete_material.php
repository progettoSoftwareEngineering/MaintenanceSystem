<?php

session_start();

include("db_con.php");

$id = $_POST['materialID'];

if ($stmt = $con->prepare('DELETE FROM materials WHERE id=?'))
{
  $stmt -> bind_param('i', $id);
  $stmt -> execute();

  $stmt->close();
  echo "Material Removed!";
  echo "<meta http-equiv='refresh' content='1; URL=../html/RM_materials.php'>";
}
else
  die('Query al Database non riuscita!');

$con->close();
?>
