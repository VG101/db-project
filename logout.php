<?php
session_start();
if(!isset($_SESSION['loggedin'])){
	header("Location:login.php");
}
else if (null != isset($_SESSION['loggedin'])) {
	header("Location:index.php");
}

if(isset($_GET['logout'])){
	session_destroy();
	unset($_SESSION['loggedin']);
	header("Location:login.php");
}


?>