<?php
include("../php/session_active.php");
setcookie("auth_cookie", "stop");
$title = "SA Add New User";
require("../html/partials/head.php");
?>

<body>
	<?php require("partials/header.php") ?>

	<div class="container registration-box mt-5">
		<h2>New user registration form</h2>
		
		<form name="form_registration" method="post" action="../php/registration.php">
		  <div class="form-row mb-3">
		    <div class="form-group col-md-6">
		      <label for="inputName">Name</label>
		      <input type="text" name="name_reg" class="form-control" id="inputName" required>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputSurname">Surname</label>
		      <input type="text" name="surname_reg" class="form-control" id="inputSurname" required>
		    </div>
		  </div>
		  <div class="form-row mb-3">
				<div class="form-group col-md-6">
		      <label for="inputUsername">Username</label>
		      <input type="text" name="username_reg" class="form-control" id="inputUsername" required>
		    </div>
		    <div class="form-group col-md-6">
		      <label for="inputPassword">Password</label>
		      <input type="password" name="password_reg" class="form-control" id="inputPassword" required>
		    </div>
		  </div>
			<div class="form-row mb-3">
			 <div class="form-group col-md-8">
				 <label for="inputEmail">Email</label>
				 <input type="email" name="email_reg" class="form-control" id="inputEmaile" required>
			 </div>
			 <div class="form-group col-md-4">
				 <label for="inputGender">Gender</label>
				 <select name="gender_reg" class="custom-select mr-sm-2" id="inputGender">
	        <option value="M" selected>Male</option>
	        <option value="F">Female</option>
	        <option value="NS">Other</option>
	      </select>
			 </div>
		 </div>


 			<div class="form-row mb-3">
 			 <div class="form-group col-md-6">
 				 <label for="inputBirthDate">Date of Birth</label>
 				 <input type="date" name="data_reg" class="form-control" id="inputBirthDate" required>
 			 </div>
 			 <div class="form-group col-md-6">
				 <div class="form-check">
				  <input class="form-check-input" type="radio" name="userType_reg" id="radioSA" value="SA">
				  <label class="form-check-label" for="radioSA">System Administrator</label>
				 </div>

				 <div class="form-check">
					<input class="form-check-input" type="radio" name="userType_reg" id="radioRM" value="RM">
 				  <label class="form-check-label" for="radioRM">Repository Manager</label>
				 </div>

				 <div class="form-check">
				 <input class="form-check-input" type="radio" name="userType_reg" id="radioPL" value="PL">
					 <label class="form-check-label" for="radioPL">Planner</label>
				</div>

				<div class="form-check">
				<input class="form-check-input" type="radio" name="userType_reg" id="radioMT" value="MT" checked>
					<label class="form-check-label" for="radioMT">Maintainer</label>
			 </div>

 			 </div>
		 </div>
		 <div class="text-center mt-4">
			 <button type="submit" class="btn btn-primary btn-lg">Add User</button>
		 </div>
		</form>

	</div>

	<body>

	<?php require("partials/footer.php");?>
</html>
