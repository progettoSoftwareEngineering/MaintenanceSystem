<?php

session_start();

include("db_con.php");

$id = $_POST['siteID'];

if ($stmt = $con->prepare('DELETE FROM sites WHERE id=?'))
{
  $stmt -> bind_param('i', $id);
  $stmt -> execute();

  $stmt->close();
  echo "Site Removed!";
  echo "<meta http-equiv='refresh' content='1; URL=../html/RM_sites.php'>";
}
else
  die('Query al Database non riuscita!');

$con->close();
?>
