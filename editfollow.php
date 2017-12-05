<?php
session_start();

$_SESSION['loggedin'] = 0;

if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==1)
{
    header("Location:index.php");
    exit;
}

$dbhost = '127.0.0.1';
$dbuser = 'root';
$password = '12345678';
$dbname = 'project';

$link = mysqli_connect($dbhost, $dbuser, $password, $dbname);
if(mysqli_connect_errno($link)) {
    echo "Connection fail: " . mysqli_connect_error();
}

$uid = $_COOKIE['uid'];
$fid = $_GET['fid'];

$query = "DELETE FROM follow WHERE uid = $uid and fid = $fid";
$result = mysqli_query($link,$query);

//$post_data = array () ;
//$post_data [ ' pid ' ] = $pid ;
//$post_data [ ' ptitle ' ] = $ptitle ;
//$post_data [ ' submit ' ] = " submit " ;
//$url = "editplaylist.php";

if($result){
    exit(header("Location:follow.php"));
}
else{
    echo "Delete fail, something went wrong.";
}


?>