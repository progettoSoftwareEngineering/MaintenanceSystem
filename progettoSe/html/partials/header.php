<body>
  <!-- Header with logo, menu, date and week and user -->
  <div class="container header">
    <nav class="navbar navbar-expand-lg navbar-light bg-blue">
			<a class="navbar-brand" href="home.php">
				<img src="../src/images/logo.png" width="40" height="40" class="d-inline-block align-right" alt="" loading="lazy">
				CompanyX
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse d-lg-flex justify-content-between" id="collapsibleNavbar">

        <div class="ml-lg-5">
            <a class="nav-link text-light" href="home.php"> <i class="fas fa-home fa-2x"></i> Go Home</a>
        </div>

				<ul class="nav nav-pills text-center">
					<li class="nav-item ml-2 ml-lg-0">
            <p class="h4 text-light mx-auto" > <?php echo $title ?> </p>
					</li>
				</ul>

				<div class="">
					<span class="navbar-text date text-light">
						<p>
							Date: <span id="currentDate"></span> <br>
							Current Week: <span id="currentWeek"></span>
						</p>
					</span>

					<i class="fas fa-user-circle fa-4x"></i>
					<div class="navbar-text user-btn m-0">
						<a class="nav-link text-light" href="profile.php">Profile</a>
						<a class="nav-link text-light" href="../php/logout.php">Logout</a>
					</div>
				</div>
			</div>
		</nav>


    <script src="../js/currentWeek.js" charset="utf-8"></script>
  </div>
