<?php
session_start();

if (strcmp($_SESSION['userType'], "SA")  == 0)
	header('Location: ../html/home_SA.php');
elseif (strcmp($_SESSION['userType'], "RM")  == 0)
	header('Location: ../html/home_RM.php');
elseif (strcmp($_SESSION['userType'], "PL")  == 0)
	header('Location: ../html/home_PL.php');
elseif (strcmp($_SESSION['userType'], "MT")  == 0)
	header('Location: ../html/home_MT.php');
else
	header('Location: ../html/login.php');
?>