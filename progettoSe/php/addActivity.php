<?php

session_start();

include("db_con.php");

if(isset($_POST['siteId'], $_POST['description'], $_POST['estimatedTime'], $_POST['typology'], $_POST['interruptible'], $_POST['week']))
{
	if ($stmt = $con->prepare('INSERT INTO activity (sitesId, description, estimatedTime, typology, interruptible, week) VALUES ( ?, ?, ?, ?, ?, ?)'))
	{
		$stmt -> bind_param('isisii', $_POST['siteId'], $_POST['description'], $_POST['estimatedTime'], $_POST['typology'], $_POST['interruptible'], $_POST['week']);
		$stmt -> execute();
		$stmt->close();
		echo "Inserimento avvenuto con successo!";
		echo "<meta http-equiv='refresh' content='1; URL=../html/home_PL.php'>";
	}
	else
		die('Query al Database non riuscita!');
}
else{
	echo('Impossibile inserire attività: campi non compilati!');
	echo "<meta http-equiv='refresh' content='1; URL=../html/home_PL.php'>";
}
$con->close();

?>
