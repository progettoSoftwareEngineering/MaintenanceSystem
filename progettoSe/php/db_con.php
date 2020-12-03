<?php
$config = parse_ini_file('../cfg/conn.ini', true);

$DATABASE_HOST = $config['database']['localhost'];
$DATABASE_USER = $config['database']['user'];
$DATABASE_PASS = $config['database']['password'];
$DATABASE_NAME = $config['database']['DBname'];

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	die ('Connessione al Database fallita: ' . mysqli_connect_error());
}

mysqli_set_charset($con, "utf8");

?>