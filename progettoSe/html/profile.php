<?php
session_start();

include("../php/db_con.php");

if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit();
}
else{
	$session_name = $_SESSION['name'];
	setcookie("session_name", "$session_name", time() + 86400);
}

setcookie("auth_cookie", "stop");

if( $stmt = $con->prepare('SELECT name, surname, username, password, email, gender, birthday, userType FROM accounts WHERE id = ?')){
	$stmt->bind_param('i', $_SESSION['id']);
	$stmt->execute();
	$stmt->bind_result($name, $surname, $username, $password, $email, $gender, $birthday, $userType);
	$stmt->fetch();
	$stmt->close();
}
else
	die ('Query non riuscita!');

$title = "Profile Page";
require("partials/head.php");
?>

<body>
	<?php require("partials/header.php")?>
		<div class="container profile-box mt-5">
			<h2>Profile</h2>
			<hr>
			<div class="row">
				<h5 class="h5 col-sm-4 text-right">Name:</h5>
				<p class="h6 col-sm-8 text-left"><?= $name ?></p>
			</div>
			<div class="row">
				<p class="h5 col-sm-4 text-right">Surname:</p>
				<p class="h6 col-sm-8 text-left"><?= $surname ?></p>
			</div>
			<div class="row">
				<p class="h5 col-sm-4 text-right">Email:</p>
				<p class="h6 col-sm-8 text-left"><?= $email ?></p>
			</div>
			<div class="row">
				<p class="h5 col-sm-4 text-right">Gender:</p>
				<p class="h6 col-sm-8 text-left"><?= $gender ?></p>
			</div>
			<div class="row">
				<p class="h5 col-sm-4 text-right">Date of Birth:</p>
				<p class="h6 col-sm-8 text-left"><?= $birthday ?></p>
			</div>
			<div class="row">
				<p class="h5 col-sm-4 text-right">User Type:</p>
				<p class="h6 col-sm-8 text-left"><?= $userType ?></p>
			</div>
			<hr>
			<div class="text-center">
				<a href="profile_mod.php" class="btn btn-block btn-warning disabled">Update</a>
			</div>
		</div>
	</body>
	<?php require("partials/footer.php"); ?>
</html>
