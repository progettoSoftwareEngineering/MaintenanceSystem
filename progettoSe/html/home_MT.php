<?php
include("../php/session_active.php");

$title = "Skills Maintainer";
require('partials/head.php');
?>

<body>
  <?php require("partials/header.php")?>
  <div class="container container-lg header sticky-top">
<!--
    <nav class="navbar navbar-expand-md navbar-light bg-blue justify-content-center">
      <a class="navbar-brand" href="#">
        <img src="../src/images/logo.png" width="40" height="40" class="d-inline-block align-top" alt="" loading="lazy">
        CompanyX<br/>Work of excellence
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">

        <ul class="nav nav-pills">
          <li class="nav-item ml-2">
            <a class="h4 text-light" href="#" title="Home">Home</a>
          </li>
          <li class="nav-item ml-2">
            <a class="h4 text-light" href="#" title="About">About</a>
          </li>
          <li class="nav-item ml-2">
            <a class="h4 text-light" href="#" title="Features">Features</a>
          </li>
          <li class="nav-item ml-2">
            <a class="h4 text-light" href="#" title="Pricing">Pricing</a>
          </li>
        </ul>

        <span class="navbar-text date text-light">
          <p>
            Date: <span id="currentDate"></span> <br>
            Current Week: <span id="currentWeek"></span>
          </p>
        </span>

        <span class="user-btn">
          <i class="fas fa-user-circle fa-4x"></i>
        </span>
      </div>
    </nav> -->

    <div class="container ">
      <div class="row">
        <div class="col col-sm-2 mb-5 pt-5 lateralBar">
          <div class="container topNav bg-blue pb-3 px-0">
            <div class="container topNav text-center bg-dark py-1">
              <i>Utilities:</i>
            </div>
            <div class="px-2">
              <a class="nav-link text-light text-center text-decoretion-none" href="#">Sites</a>
              <a class="nav-link text-light text-center text-decoretion-none" href="#" >Materials</a>
              <a class="nav-link text-light text-center text-decoretion-none" href="#">Procedures</a>
              <a class="nav-link text-light text-center text-decoretion-none" href="#">Date</a>
            </div>
          </div>

          <div class="container bottomNav bg-blue mt-5 pb-3 px-0">
            <div class="container text-center bg-dark py-1">
              <i>Maintenance typologies::</i>
            </div>
            <div class="px-2">
              <a class="nav-link text-light text-center text-decoretion-none" href="#">Electrical</a>
              <a class="nav-link text-light text-center text-decoretion-none" href="#" >Electronic</a>
              <a class="nav-link text-light text-center text-decoretion-none" href="#">Hydraulic</a>
              <a class="nav-link text-light text-center text-decoretion-none" href="#">Mechanical</a>
            </div>
          </div>
        </div>
        <div class="col col-sm-10">
          <div class="table-responsive mt-5">
            <table class="table table-striped table-hover table-sm text-center">
              <thead class="thead-dark">
                <tr>
                  <th>prova1</th>
                  <th>prova2</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Esempio1</td>
                  <td>Esempio1</td>
                </tr>
                <tr>
                  <td>Esempio2</td>
                  <td>Esempio2</td>
                </tr>
                <tr>
                  <td>Esempio3</td>
                  <td>Esempio3</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- script javascript and jquery  -->
  <script type="text/javascript" src='../js/main.js'></script>

</body>

<?php require("partials/footer.php"); ?>


</html>
