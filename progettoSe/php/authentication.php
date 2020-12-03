<?php
session_start();

include("db_con.php");

setcookie("auth_cookie", "stop");

if ( !isset($_POST['username'], $_POST['password']) ) {
	die ('Prego, inserire username e password!');
}

if ($stmt = $con->prepare('SELECT id, password, userType FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
}

if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $userType);
	$stmt->fetch();
	if (strcmp($_POST['password'], $password) == 0) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['userType'] = $userType;
		$_SESSION['id'] = $id;
		setcookie("auth_cookie", "start", time() + 86400);
		if (strcmp($userType, "SA")  == 0)
			header('Location: ../html/home_SA.php');
		elseif (strcmp($userType, "RM")  == 0)
			header('Location: ../html/home_RM.php');
		elseif (strcmp($userType, "PL")  == 0)
			header('Location: ../html/home_PL.php');
		else
			header('Location: ../html/home_MT.php');
	}
	else{
		echo 'Incorrect password or username!';
		echo "<meta http-equiv='refresh' content='1; URL=../html/login.php'>";
	}
} else {
	echo 'Incorrect password or username!';
	echo "<meta http-equiv='refresh' content='1; URL=../html/login.php'>";
}
$stmt->close();
?>