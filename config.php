<?php
define("BASE_URL", "http://localhost/interd/");
global $pdo;

$dsn = "mysql:dbname=controle;host=localhost";
$dbuser = "root";
$dbpass = "";
try {
	$pdo = new PDO($dsn, $dbuser, $dbpass);
} catch (PDOException $e) {
	echo "ERROR".$e->getMessage();
	exit;
}
?>