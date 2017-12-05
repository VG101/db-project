<!----
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Music</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<form id="myForm" action="editplaylist.php" method="post">
--->

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

//$a = "pid";
//$b = "ptitle";
$pid = $_GET['pid'];
$tid = $_GET['tid'];
$ptitle = $_GET['ptitle'];
//echo $uname;

$query = "DELETE FROM playlistcontents WHERE pid = $pid and tid = $tid";
//echo "DELETE FROM playlistcontents WHERE pid = $pid and tid = $tid";
$result = mysqli_query($link,$query);

//$post_data = array () ;
//$post_data [ ' pid ' ] = $pid ;
//$post_data [ ' ptitle ' ] = $ptitle ;
//$post_data [ ' submit ' ] = " submit " ;
//$url = "editplaylist.php";

if($result){
//  do_post_request($url, $post_data, null);

    exit(header("Location:editplaylist.php?pid=".$pid."%20&%20ptitle=".$ptitle));
    //"localhost/project/editplaylist.php?pid=4%20&%20ptitle=ahhhh";
    //echo " Location:editplaylist.php?pid=".$pid."&ptitle=".$ptitle;
    //header(" Localtion:editplaylist.php?pid=".$pid."&ptitle=".$ptitle);
    //exit();
    //exit(header("Location:editplaylist.php"));
//    foreach ($post_data as $a => $b) {
//        //echo $a;
//        //echo $b;
//        echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
//    }
}
else{
    echo "Delete fail, something went wrong.";
}


?>

<!---
</form>
<script type="text/javascript">
    document.getElementById('myForm').submit();
</script>
</body>

</html>
--->

<?php
//function do_post_request($url, $data, $optional_headers = null)
//{
//$params = array('http' => array(
//'method' => 'POST',
//'content' => $data
//));
//if ($optional_headers !== null) {
//$params['http']['header'] = $optional_headers;
//}
//$ctx = stream_context_create($params);
//$fp = @fopen($url, 'rb', false, $ctx);
//if (!$fp) {
//throw new Exception("Problem with $url, $php_errormsg");
//}
//$response = @stream_get_contents($fp);
//if ($response === false) {
//throw new Exception("Problem reading data from $url, $php_errormsg");
//}
//return $response;
//}
//?>