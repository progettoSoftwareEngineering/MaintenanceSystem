<?php

session_start();

include("db_con.php");

if(isset($_POST['activityId']))
{
	if ($stmt = $con->prepare('DELETE FROM activity WHERE id = ?'))
	{
		$stmt -> bind_param('i', $_POST['activityId']);
		$stmt -> execute();
		$stmt->close();
		echo "Rimozione avvenuta con successo!";
		echo "<meta http-equiv='refresh' content='1; URL=../html/home_PL.php'>";
	}
	else
		die('Query al Database non riuscita!');
}
else{
	echo('Impossibile rimuovere attività: nessuna attività selezionata');
	echo "<meta http-equiv='refresh' content='1; URL=../html/home_PL.php'>";
}
$con->close();

?>