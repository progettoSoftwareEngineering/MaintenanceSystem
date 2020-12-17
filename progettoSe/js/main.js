// add weeks buttons
function addWeeks() {
  for (var i = 1; i <= 53; i++) {

    // add card collapse
    $(".weeks").append(
      '<div class="card"><div class="card-header" id="heading' + i +

      '"><h2 class="mb-0"><button class="btn btn-outline-secondary btn-block text-center font-weight-bold" type="button" data-toggle="collapse" ' +
      'data-target="#collapse' + i + '" aria-expanded="false" aria-controls="collapse' + i + '">' +
      '<i class="fas fa-caret-down"></i>Week' + i + '<i class="fas fa-caret-down"></i></button></h2></div>'
    );

    addCollapseTarget(i);
  }
};

// add table for week
function addCollapseTarget(id) {
  var HTMLCode = '<div id="collapse' + id + '" class="collapse" aria-labelledby="heading' + id + '" data-parent="#accordionWeeks">' +
    `<div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover table-sm text-center" id="table` + id + `">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Area</th>
              <th>Type</th>
              <th>Intervention Time[min]</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="tbody` + id + `">

          </tbody>
        </table>
      </div>
      <div class='text-center'>
        <button type="button" class="btn btn-sm btn-warning text-right" data-toggle="modal" data-target="#planModal" data-week="` + id + `">Add Activity</button>
      </div>
    </div>
  `;

  $(".weeks").append(HTMLCode);
};

function loadTable() {
  $.getJSON("../php/getData.php", function(dataJSON) {
    var tr;
    $.each(dataJSON, function(key, value) {
      var week = value.week;
      var activity = value.id + " - " + value.area + " - " + value.type + " - " + value.intTime + "'";
      var tableData = `
          <tr>
            <td>` + value.id + `</td>
            <td>` + value.area + `</td>
            <td>` + value.type + `</td>
            <td>` + value.intTime + `</td>
            <td>
              <form action="../php/deleteActivity.php" method="post">
                <button data-toggle="modal" data-target="#selectedModal" data-week="` + week + `" data-activity="` + activity + `" id="` + value.id + `" type="button" class="btn btn-sm btn-outline-primary"><i class="fas fa-clipboard-check"></i>  Select</button>
  							<input type= "hidden" name="activityId" value="` + value.id + `">
  							<button type="submit" class="btn btn-sm btn-warning ml-3"><i class="far fa-trash-alt" aria-hidden="true"></i> Delete</button>
  						</form>
            </td>
          </tr>
          `;
      $(".tbody" + week).append(tableData);
      $("#table" + week).addClass("");
    });
  });
};

$(document).ready(function(){
  $(".header").addClass("fixed-top");
  addWeeks();
  loadTable();
  $("#collapse" + currentWeek).collapse();
});

$("#accordionWeeks").on('shown.bs.collapse', function(event) {
  $('[data-target="#' + event.target.id + '"]').removeClass('btn-outline-secondary').addClass("btn-blue");
  var element = document.getElementById(event.target.id);
  element.scrollIntoView({
    behavior: "smooth",
    block: "center"
  });
});

$("#accordionWeeks").on('hide.bs.collapse', function(event) {
  $('[data-target="#' + event.target.id + '"]').removeClass('btn-blue').addClass("btn-outline-secondary");
});

$('#planModal').on('show.bs.modal', function(event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var activityWeek = button.data('week'); // Extract info from data-* attributes

  var modal = $(this)
  modal.find('.modal-title').text('Plan Activity for week ' + activityWeek);
  modal.find('#activity-week').val(activityWeek);
});

$('#selectedModal').on('show.bs.modal', function(event) {
  var button = $(event.relatedTarget);
  var activity = button.data('activity'); // Extract info from data-* attributes
  var id = button.attr("id");
  var week = button.data("week");
  var modal = $(this)

  $.getJSON("../php/getData.php?id=" + id, function(result) {
    modal.find('.modal-title').text('Selected activity # ' + result.id);
    modal.find('#selected-activity-week').text(result.week);
    const activityItem = result.id + " - " + result.area + " - " + result.type + " - " + result.intTime + "'";
    modal.find('#selected-activity').text(activityItem);
    modal.find('#SMPFile').attr('href', result.SMP);
    modal.find('#selected-activity-description').text(result.description);

    modal.find("#skillsNeeded").text('');
    result.skills.forEach((skill) => {
      modal.find("#skillsNeeded").append('<li class="list-group-item">' + skill + '</li>');
    });
  });
});

$('#selectedModal').on('hidden.bs.modal', function(event) {
  var modal = $(this)
  modal.find('#selected-activity-workNote').text('');
  modal.find('#selected-activity-description').text('');

  modal.find("#skillsNeeded").text('');
})
