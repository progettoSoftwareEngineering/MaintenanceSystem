<?php
  include("../php/session_active.php");
  $title = "Home";
  require("partials/head.php");
?>

<body>

<?php include("partials/header.php"); ?>



  <!-- Body of the page where we find activities divided by weeks -->
  <section class="activities-for-week pt-5 mt-5">

    <h2>Planned Activities by Weeks</h2>

    <div class="accordion weeks container container-lg" id="accordionWeeks">

    </div>
  </section>

  <!-- Plan new activity form -->
  <section>
    <!-- Plan activity Modal -->
    <div class="modal fade" id="planModal" tabindex="-2" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="dialog">
        <div class="modal-content">
          <div class="modal-header bg-blue text-light">
            <h5 class="modal-title" id="ModalLabel">Plan Activity for week</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="modal-body ">
            <form class="form form-horizontal striped-rows" method="post" action="../php/addActivity.php">

              <div class="form-body justify-content-center">
                <!-- Week row -->
                <div class="form-group form-row py-2">
                  <label for="activity-week" class="col-form-label col-sm-4 text-center"><i class="far fa-calendar-minus fa-1px"></i> Week:</label>
                  <div class="col-sm-8">
                    <input name= "week" type="number" class="form-control" id="activity-week" min="1" max="53" placeholder="1 - 52" data-bind="value:replyNumber" required />
                  </div>
                </div>
                <!-- Area row -->
                <div class="form-group form-row py-2">
                  <label for="activity-area" class="col-sm-4 col-form-label text-center"><i class="far fa-building fa-1px"></i>  Area:</label>
                  <div class="col-sm-8">
                    <select class="custom-select" id="areaSelect" name="siteId">
          						<?php
          						require("../php/sites.php");
          						foreach ($sites as $value) {
          						  $siteId = $value['id'];
          						  $site = $value['site'];
          						  $workArea = $value['workArea'];
          						  echo "<option value=\"$siteId\">$site - $workArea</option>";
          						}
          						?>
                    </select>
                    </div>
                </div>
                <!-- Type row -->
                <div class="form-group form-row py-2">
                  <label for="activity-type" class="col-sm-4 col-form-label text-center">Type:</label>
                  <div class="col-sm-8">
                    <select class="custom-select" id="typeSelect" name="typology">
                      <option value="Hydraulic">Hydraulic</option>
                      <option value="Electric">Electric</option>
                      <option value="Electronic">Electronic</option>
                      <option value="Mechanical">Mechanical</option>
                    </select>
                  </div>
                </div>
                <!-- Estimated Intervention Time row -->
                <div class="form-group form-row py-2">
                  <label for="activity-intTime" class="col-sm-4 col-form-label text-center"><i class="far fa-clock fa-1px"></i> Intervention Time [min]:</label>
                  <div class="col-sm-8 my-auto">
                    <input name="estimatedTime" type="number" class="form-control" id="activity-intTime" min="0" placeholder="Estimated Intervention Time in minutes" data-bind="value:replyNumber"  required/>
                  </div>
                </div>
                <!-- Description of the activity row -->
                <div class="form-group form-row py-2">
                  <label for="activity-description" class="col-sm-4 col-form-label text-center"><i class="far fa-comment fa-1px"></i> Actvity description:</label>
                  <div class="col-sm-8">
                    <textarea name="description" class="form-control" id="activity-description" placeholder="Insert a short description of the activity."></textarea>
                  </div>
                </div>
                <!-- Interruptible activi radios row -->
                <div class="form-group form-row py-2">
                  <label for="activity-interruptible" class="col-sm-4 col-form-label text-center"><i class="far fa-hand-paper fa-1px"></i> Interruptible:</label>
                  <div class="col-sm-8 my-auto" id="activvity-interruptible">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="interruptible" id="inlineInterruptibleRadioYes" value="1" checked>
                      <label class="form-check-label" for="inlineInterruptibleRadioYes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="interruptible" id="inlineInterruptibleRadioNo" value="0">
                      <label class="form-check-label" for="inlineInterruptibleRadioNo">No</label>
                    </div>
                  </div>
                </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-blue text-light">Add Activity</button>
				</div>
			</form>
          </div>
        </div>
      </div>
    </div>

    </div>

  </section>

  <!-- Activity details Modal -->
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
            <div class="row mb-3 justify-content-md-center">
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

            <!-- Intervention description row -->
            <div class="row mb-3 justify-content-md-center">
              <!-- Skill needed row -->
                <div class="col-md-4">
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

              <div class="col-md-8">
                <div class="card text-center">
                  <div class="card-header bg-warning p-2">
                    <h6 class="card-title mb-0" for="selected-activity-description">Intervention Description:</h6>
                  </div>
                  <div class="card-body p-2">
                    <p class="card-text" id="selected-activity-description"></p>
                  </div>
                </div>

                <!-- File row -->
                <div class="card text-center mt-3">
                  <div class="card-header bg-warning p-2">
                    <h6 class="card-title mb-0" for="selected-activity-workNote">Standard Maintenance Procedure File (SMP):</h6>
                  </div>
                  <div class="card-body p-2">
                    <i class="far fa-file-pdf fa-2px"></i>
                    <a id="SMPFile" download target="_blank" class="text-decoration-none">Open file</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-blue text-light disabled" disabled>Forward</button>
          </div>
        </div>
      </div>
    </div>

    </div>

  </section>

  <!-- script javascript and jquery  -->
  <script type="text/javascript" src='../js/main.js'></script>

</body>

<?php require("partials/footer.php"); ?>

</html>
