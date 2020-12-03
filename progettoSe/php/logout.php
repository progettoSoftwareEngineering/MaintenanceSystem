<?php
session_start();
session_destroy();
setcookie("auth_cookie", "stop");
header('Location: ../html/login.php');
?>