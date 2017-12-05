<?php
$dbhost = '127.0.0.1';
$dbuser = 'root';
$password = '12345678';
$dbname = 'project';

$link = mysqli_connect($dbhost, $dbuser, $password, $dbname);
if(mysqli_connect_errno($link)) {
	echo "Connection fail: " . mysqli_connect_error();
}
?>