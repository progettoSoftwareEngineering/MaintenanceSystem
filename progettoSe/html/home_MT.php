<?php
include("../php/session_active.php");

$title = "Maintainer Home Page" ;
require("partials/head.php");
?>


<body id="home">

	<?php require("partials/header.php") ?>

	<div class="container container-lg header sticky-top">


		<div class="navbar mb-2 ">
			<h2>Maintainer Home Page</h2>

			<form class="form-inline" method="post" action="ricerca.php">
				<input id="searchIn" class="form-control mr-sm-2" type="search" placeholder="Es. Activity ID" aria-label="Search" required>
				<button id="searchBtn" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>


		<div class="container">
			<h2 align="center">
				<p>Welcome back!</p> 
			</h2>
			<p align="center">
				On this page you can visualize your activity.
			</p>



			<!--ACTIVITY PLANNING TABLE-->
			<div class="text-right">
				<div class="dropdown show">
				  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    Week N°
				  </a>

				  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
				    <a class="dropdown-item" href="#">1</a>
				    <a class="dropdown-item" href="#">2</a>
				    <a class="dropdown-item" href="#">3</a>
				  </div>
				</div>
			</div>

			<div class="table-responsive mt-4">
				<table class="table table-striped table-hover table-sm text-center">
					<thead class="thead-dark">
						<tr>
							<th>ID</th>
							<th>Area</th>
							<th>Tipology</th>
							<th>Estimate Intervention Time</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>24332</td>
							<td>Fisciano</td>
							<td>Electric</td>
							<td>123</td>
							<td>
								<button data-toggle="modal" data-target="#selectedModal" type="button" class="btn btn-sm btn-block btn-outline-primary">Select</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

			<form class="form-inline">
			  <label class="sr-only" for="inlineFormInputArea">Area</label>
			  <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputArea" placeholder="Area">

			  <label class="sr-only" for="inlineFormInputType">Type</label>
				<select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelectPref">
				  <option selected>Choose Type</option>
				  <option value="1">Electric</option>
				  <option value="2">Electronic</option>
				  <option value="3">Hydraulic</option>
					<option value="3">Mechanical</option>
				</select>

				<label class="sr-only" for="inlineFormInputArea">Intervention Time</label>
				<div class="input-group mb-2 mr-sm-2">
					<div class="input-group-prepend">
			      <div class="input-group-text"><i class="far fa-clock fa"></i></div>
			    </div>
					<input type="number" class="form-control" id="inlineFormInputIntTime" min="0" placeholder="Est. Time '" data-bind="value:replyNumber"/>
				</div>

			  <button type="submit" class="btn btn-primary mb-2 mr-2">Submit</button>
				<button type="button" class="btn btn-danger mb-2 " name="button">Delete</button>
			</form>
		</div>
	</div>

			<!-- <input type="button" value="Add Activity" onclick="addRow('dataTable')" />
			<input type="button" value="Delete Activity" onclick="deleteRow('dataTable')" /> -->


			<!-- Open when the press the select button -->
			<section>
				<div class="modal fade" id="selectedModal" tabindex="-1" role="dialog" aria-labelledby="selectedModalLabel" aria-hidden="true">
					<div class="modal-dialog modal-lg modal-dialog-centered" role="dialog">
						<div class="modal-content">
							<div class="modal-header bg-blue text-light">
								<h5 class="modal-title" id="selectedModalLabel">Selected activity # </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body ">
								<!-- Week and Activiti to assign row -->
								<div class="row mb-3">
									<div class="col-md-4">
										<div class="card text-center">
											<div class="card-header bg-warning p-2">
												<h6 class="card-title mb-0" for="selected-activity-week">Week n°:</h6>
											</div>
											<div class="card-body p-2">
												<p class="card-text" id="selected-activity-week"></p>
											</div>
										</div>


									</div>
									<div class="col-md-8">
										<div class="card text-center">
											<div class="card-header bg-warning p-2">
												<h6 class="card-title mb-0" for="selected-activity">Activity:</h6>
											</div>
											<div class="card-body p-2">
												<p class="card-text" id="selected-activity"></p>
											</div>
										</div>
									</div>
								</div>

								<!-- Workspace note and Intervention description row -->
								<div class="row mb-3">
									<div class="col-md-6">
										<div class="card text-center">
											<div class="card-header bg-warning p-2">
												<h6 class="card-title mb-0" for="selected-activity-workNote">Workspace Notes:</h6>
											</div>
											<div class="card-body p-2">
												<p class="card-text" id="selected-activity-workNote"></p>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="card text-center">
											<div class="card-header bg-warning p-2">
												<h6 class="card-title mb-0" for="selected-activity-description">Intervention Description:</h6>
											</div>
											<div class="card-body p-2">
												<p class="card-text" id="selected-activity-description"></p>
											</div>
										</div>
									</div>
								</div>

								<!-- Skill needed row -->
								<div class="row mb-3">
									<div class="col-md-12">
										<div class="card text-center">
											<div class="card-header bg-warning p-2">
												<h6 class="card-title mb-0" for="selected-activity-workNote">Skills needed:</h6>
											</div>
											<div class="card-body p-2">
												<ul id="skillsNeeded" class="list-group list-group-flush">

												</ul>
											</div>
										</div>
									</div>
								</div>
								<!-- File row -->
								<div class="row mb-3 justify-content-md-center">
									<div class="col-md-auto">
										<div class="card text-center">
											<div class="card-header bg-warning p-2">
												<h6 class="card-title mb-0" for="selected-activity-workNote">Standard Maintenance Procedure File (SMP):</h6>
											</div>
											<div class="card-body p-2">
												<i class="far fa-file-pdf fa-2px"></i>
												<a href="file.pdf" download target="_blank" class="text-decoration-none">Open file</a>
											</div>
										</div>
									</div>
								</div>

								<div class="row mb-3 justify-content-md-center">
									<div class="col-md-auto">
										<div class="card text-center">
											<div class="card-header bg-warning p-2">
												<h6 class="card-title mb-0" for="selected-activity-workNote">Maintener Availability:</h6>
											</div>
											<div class="card-body p-2">
												<i class="far fa-file-pdf fa-2px"></i>
												<a href="file.pdf" download target="_blank" class="text-decoration-none">Open file</a>
											</div>
										</div>
									</div>
								</div>

							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="button" class="btn btn-blue text-light">Forward</button>
							</div>
						</div>
					</div>
				</div>

		</div>

		</section>

</body>
	<?php require("partials/footer.php") ?>

</html>
