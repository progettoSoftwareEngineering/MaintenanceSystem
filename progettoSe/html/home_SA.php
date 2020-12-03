<?php
include("../php/session_active.php");

$title = "System Administrator";
require("partials/head.php");
?>

<body>
	<?php require("partials/header.php") ?>


	<div class="container justify-contennt-center">
		<h2> Welcome back, <?= $_SESSION['name'] ?>! </h2>

		<div class="card" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Add User:</h5>
		    <p class="card-text">You can add a new employee</p>
		    <a href="sup_reg_form.php" class="btn btn-primary">Add</a>
		  </div>
		</div>
	</div>


	<script src="../js/currentWeek.js" charset="utf-8"></script>
	<script src="../js/logout.js" charset="utf-8"></script>
</body>

<?php require("partials/footer.php"); ?>

</html>
