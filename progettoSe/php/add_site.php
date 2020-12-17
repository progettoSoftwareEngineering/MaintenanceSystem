<?php

session_start();

include("db_con.php");

$siteName = $_POST['siteName'];
$workArea = $_POST['workArea'];

if ($stmt = $con->prepare('INSERT INTO sites (workArea, name) VALUES ( ?, ?)'))
{
  $stmt -> bind_param('ss', $workArea, $siteName);
  $stmt -> execute();
  $stmt -> close();

  echo "Site Added!";
  echo "<meta http-equiv='refresh' content='1; URL=../html/RM_sites.php'>";
}
else
  die('Query al Database non riuscita!');

$con->close();
?>
