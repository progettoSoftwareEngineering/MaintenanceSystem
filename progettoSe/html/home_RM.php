<?php
include("../php/session_active.php");

$title = "Repository Manager";
require("partials/head.php");
?>

<body>
	<?php require("partials/header.php") ?>


	<div class="container justify-contennt-center">
		<h2> Welcome back, <?= $_SESSION['name'] ?>! </h2>

		<div class="row">
			<div class="card mr-2" style="width: 18rem;">
				<div class="card-body">
					<h5 class="card-title">Manage Sites:</h5>
					<p class="card-text">You can delete or add sites</p>
					<a href="RM_sites.php" class="btn btn-primary">Manage</a>
				</div>
			</div>

			<div class="card" style="width: 18rem;">
					<div class="card-body">
						<h5 class="card-title">Manage Materials:</h5>
						<p class="card-text">You can delete or add materials</p>
						<a href="RM_materials.php" class="btn btn-primary">Manage</a>
				</div>
			</div>
		</div>
	</div>


	<script src="../js/currentWeek.js" charset="utf-8"></script>
	<script src="../js/logout.js" charset="utf-8"></script>
</body>

<?php require("partials/footer.php"); ?>

</html>
