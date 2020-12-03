<?php
session_start();

include("db_con.php");

if(isset($_POST['name_reg'], $_POST['surname_reg'], $_POST['username_reg'], $_POST['password_reg'], $_POST['email_reg'], $_POST['gender_reg'], $_POST['data_reg'], $_POST['userType_reg']))
{
	$nome = $_POST['name_reg'];
	$cognome = $_POST['surname_reg'];
	$username = $_POST['username_reg'];
	$password = $_POST['password_reg'];
	$email = $_POST['email_reg'];
	$sesso = $_POST['gender_reg'];
	$data = $_POST['data_reg'];
	$userType = $_POST['userType_reg'];
	
	if ($stmt = $con->prepare('INSERT INTO accounts (name, surname, username, password, email, gender, birthday, userType) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)'))
	{
		$stmt -> bind_param('ssssssss', $nome, $cognome, $username, $password, $email, $sesso, $data, $userType);
		$stmt -> execute();
		$stmt = $con->prepare('SELECT id FROM accounts WHERE name = ? AND surname = ? AND username = ? AND password = ? AND email = ? AND gender = ? AND birthday = ? AND userType = ?');
		$stmt -> bind_param('ssssssss', $nome, $cognome, $username, $password, $email, $sesso, $data, $userType);
		$stmt->execute();
		$stmt->bind_result($id);
		$stmt->fetch();
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $username;
		$_SESSION['userType'] = $userType;
		$_SESSION['id'] = $id;
		$stmt->close();
		echo "Registrazione avvenuta con successo!";
		echo "<meta http-equiv='refresh' content='1; URL=../html/home.php'>";
	}
	else
		die('Query al Database non riuscita!');
}
else
	die('Impossibile registrarsi: campi non compilati!');

$con->close();
?>