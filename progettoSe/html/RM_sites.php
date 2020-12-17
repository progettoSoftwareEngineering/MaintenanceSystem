<?php
include("../php/session_active.php");

$title = "Repository Manager";
require('partials/head.php');
?>

<body>
  <?php require("partials/header.php")?>
  <div class="container container-lg header sticky-top">

    <div class="container ">
      <div class="row">
        <div class="col col-sm-2 mb-5 pt-5 lateralBar">
          <div class="container topNav bg-blue pb-3 px-0">
            <div class="container topNav text-center bg-dark py-1">
              <i>Utilities:</i>
            </div>
            <div class="px-2">
              <a class="nav-link text-light text-center text-decoretion-none active" href="#">Sites</a>
              <a class="nav-link text-light text-center text-decoretion-none" href="RM_materials.php" >Materials</a>
              <a class="nav-link text-light text-center text-decoretion-none" href="#">Procedures</a>
              <a class="nav-link text-light text-center text-decoretion-none" href="#">Date</a>
            </div>
          </div>

          <div class="container bottomNav bg-blue mt-5 pb-3 px-0">
            <div class="container text-center bg-dark py-1">
              <i>Maintenance typologies:</i>
            </div>
            <div class="px-2">
              <a class="nav-link text-light text-center text-decoretion-none" disable>Electrical</a>
              <a class="nav-link text-light text-center text-decoretion-none" disable >Electronic</a>
              <a class="nav-link text-light text-center text-decoretion-none" disable>Hydraulic</a>
              <a class="nav-link text-light text-center text-decoretion-none" disable>Mechanical</a>
            </div>
          </div>
        </div>
        <div class="col col-sm-10">
          <h2>Manage Sites</h2>
          <hr>
          <div class="table-responsive">
            <table class="table table-striped table-hover table-sm text-center">
              <thead class="thead-dark">
                <tr>
                  <th>id</th>
                  <th>Site</th>
                  <th>Work Area</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php require("../php/sites.php");
                foreach ($sites as $value) {
					$id = $value['id'];
					$site = $value['site'];
					$workArea = $value['workArea'];
					echo "<tr>
						<td>$id</td>
						<td>$site</td>
						<td>$workArea</td>
						<td>
						<form action=\"../php/delete_site.php\" method=\"post\">
							<input type= \"hidden\" name=\"siteID\" value=\"$id\">
							<button type=\"submit\" class=\"btn btn-sm btn-warning\"><i class=\"far fa-trash-alt\" aria-hidden=\"true\"></i> Delete</button>
						</form>
						</td>
					</tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
          <hr>
          <form class="form-inline justify-content-center" action="../php/add_site.php" method="post">
            <label class="sr-only" for="inlineFormInputSite">Site</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="far fa-building fa-1px"></i></div>
              </div>
              <input type="text" name="siteName" class="form-control" id="inlineFormInputSite" placeholder="Site Name" required>
            </div>


            <label class="sr-only" for="inlineFormInputWorkArea">Work Area</label>
            <div class="input-group mb-2 mr-sm-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="far fa-building fa-1px"></i></div>
              </div>
              <input type="text" name="workArea" class="form-control" id="inlineFormInputWorkArea" placeholder="Work Area" required>
            </div>

            <button type="submit" class="btn btn-blue mb-2">Add</button>
          </form>
        </div>
      </div>
    </div>
  </div>
 

</body>

<?php require("partials/footer.php"); ?>


</html>
