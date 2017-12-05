<?php
session_start();

$_SESSION['loggedin'] = 0;

//if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==1)
//{
//    header("Location:index.php");
//    exit;
//}


date_default_timezone_set('America/New_York');


$dbhost = '127.0.0.1';
$dbuser = 'root';
$password = '12345678';
$dbname = 'project';

$link = mysqli_connect($dbhost, $dbuser, $password, $dbname);
if(mysqli_connect_errno($link)) {
    echo "Connection fail: " . mysqli_connect_error();
}

$uid = $_COOKIE['uid'];


if($_POST){
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $newpass2 = $_POST['newpass2'];
    echo "<script>alert('old password is {$oldpass}')</script>";


//    echo "<script>alert('{$birthday}')</script>";


    $query1 = "SELECT * FROM User WHERE uid = '".$uid."'";
    $result1 = mysqli_query($link,$query1);
    $row1 = mysqli_fetch_array($result1);

    $checkpass = $row1[3];

    if($checkpass!=$oldpass){
        echo "<script>alert('old password incorrect!')</script>";
    }
    else{
        if($newpass!=$newpass2){
            echo "<script>alert('please enter the same password twice!')</script>";
        }
        else{
            $updateuserpass = "UPDATE user SET password = '$newpass' WHERE uid=$uid";
            $update = mysqli_query($link,$updateuserpass);
        }
    }



//    $imgname = $_FILES['myfile']['name'];
//    echo "<script>alert('Filename: {$_FILES['myfile']['name']}')</script>";
//    $tmp = $_FILES['myfile']['tmp_name'];
//    $filepath = 'photo/';

    $userPortraitPath = "";

    if(is_uploaded_file($_FILES["myfile"]["tmp_name"])){
        if((($_FILES["myfile"]["type"]=="image/gif")
                ||($_FILES["myfile"]["type"]=="image/jpg")
                ||($_FILES["myfile"]["type"]=="image/png")
                ||($_FILES["myfile"]["type"]=="image/jpeg")
            )&& $_FILES["myfile"]["size"]< 20000){
            if($_FILES["myfile"]["error"]>0){
                echo "<script>alert('Returncode: {$_FILES["myfile"]["error"]}')</script>";
            }
            else{
                $_FILES["myfile"]["name"] = "{$uid}_portrait";
                $userImageFolderPath = "C:/AppServ/www/project/pic/{$uid}";
                $releventPath = "pic/{$uid}";
                //echo "<script>alert('FILETYPE: {$_FILES["myfile"]["type"]}')</script>";
                if(!file_exists($userImageFolderPath)){
                    mkdir($userImageFolderPath,0777,true);
                }
                else if($_FILES["myfile"]["type"]=="image/gif"){
                    move_uploaded_file($_FILES["myfile"]["tmp_name"],
                        "{$releventPath}/".$_FILES["myfile"]["name"].".gif");
                    $userPortraitPath = "{$releventPath}/".$_FILES["myfile"]["name"].".gif";
                }
                else if($_FILES["myfile"]["type"]=="image/jpg"){
                    move_uploaded_file($_FILES["myfile"]["tmp_name"],
                        "{$releventPath}/".$_FILES["myfile"]["name"].".jpg");
                    $userPortraitPath = "{$releventPath}/".$_FILES["myfile"]["name"].".jpg";
                }
                else if($_FILES["myfile"]["type"]=="image/png"){
                    move_uploaded_file($_FILES["myfile"]["tmp_name"],
                        "{$releventPath}/".$_FILES["myfile"]["name"].".png");
                    $userPortraitPath = "{$releventPath}/".$_FILES["myfile"]["name"].".png";
                }
                else if($_FILES["myfile"]["type"]=="image/jpeg"){
                    move_uploaded_file($_FILES["myfile"]["tmp_name"],
                        "{$releventPath}/".$_FILES["myfile"]["name"].".jpeg");
                    $userPortraitPath = "{$releventPath}/".$_FILES["myfile"]["name"].".jpeg";
                }
                $updateportrait = "UPDATE usersetting SET portrait='$userPortraitPath' WHERE uid=$uid";
                $update3 = mysqli_query($link,$updateportrait);
            }
        }
    }
//    else{
//        echo "<script>alert('Not Uploaded!')</script>";
//    }

}

$query1 = "SELECT * FROM User WHERE uid = '".$uid."'";
$result1 = mysqli_query($link,$query1);
$row1 = mysqli_fetch_array($result1);


$uname = $row1[1];
$email = $row1[2];

$query2 = "SELECT * FROM usersetting WHERE uid = '".$uid."'";
$result2 = mysqli_query($link,$query2);
$row2 = mysqli_fetch_array($result2);

$realname = $row2[1];
$city = $row2[2];
$birthday = $row2[4];
$signature = $row2[3];
$user_Portrait = $row2[5];
?>

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
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="index.php">Home</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="follow.php">Follow</a>
                        </li>
                        <li>
                            <a href="playlist.php">My List</a>
                        </li>
                        <li>
                            <a href="history.php">History</a>
                        </li>
                        <!--                        <li class="dropdown">-->
                        <!--                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>-->
                        <!--                            <ul class="dropdown-menu">-->
                        <!--                                <li>-->
                        <!--                                    <a href="#">Action</a>-->
                        <!--                                </li>-->
                        <!--                                <li>-->
                        <!--                                    <a href="#">Another action</a>-->
                        <!--                                </li>-->
                        <!--                                <li>-->
                        <!--                                    <a href="#">Something else here</a>-->
                        <!--                                </li>-->
                        <!--                                <li class="divider">-->
                        <!--                                </li>-->
                        <!--                                <li>-->
                        <!--                                    <a href="#">Separated link</a>-->
                        <!--                                </li>-->
                        <!--                                <li class="divider">-->
                        <!--                                </li>-->
                        <!--                                <li>-->
                        <!--                                    <a href="#">One more separated link</a>-->
                        <!--                                </li>-->
                        <!--                            </ul>-->
                        <!--                        </li>-->
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" />
                        </div> <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li  class="active">
                            <a href="setting.php">Setting</a>
                        </li>
                        <li>
                            <a href="logout.php?logout">Logout &nbsp;&nbsp;&nbsp;&nbsp;</a>
                        </li>
                    </ul>
                </div>

            </nav>

        </div>
    </div>
    <div class="container">
        <br />
        <br />
        <br />
        <br />
        <form role="form" method="POST" action="changepass.php" enctype="multipart/form-data">
            <!--            <form role="form">-->
            <div class="row clearfix">
                <div class="col-md-2 column">
                </div>
                <div class="col-md-3 column">
                    <div class="col-md-10 column">
                        <img alt="200x200" src="<?php echo $user_Portrait; ?>" />
                        <br />
                        <div class="form-group">
                            <br />
                            <label for="exampleInputFile">Select another portrait</label><input type="file" name="myfile" />
                            <br />
                        </div>
                        <h2 >
                            Signature
                        </h2>
                        <p >
                            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
                        </p>
                        <p>
                            <a class="btn" href="#">View details »</a>
                        </p>
                    </div>
                    <div class="col-md-2 column">
                    </div>
                </div>
                <div class="col-md-5 column">
                    <ul class="nav nav-tabs">
                        <li >
                            <a href="setting.php">Basic Information</a>
                        </li>
                        <li class="active">
                            <a href="changepass.php">Change Password</a>
                        </li>
                        <!--                        <li class="dropdown pull-right">-->
                        <!--                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">下拉<strong class="caret"></strong></a>-->
                        <!--                            <ul class="dropdown-menu">-->
                        <!--                                <li>-->
                        <!--                                    <a href="#">操作</a>-->
                        <!--                                </li>-->
                        <!--                                <li>-->
                        <!--                                    <a href="#">设置栏目</a>-->
                        <!--                                </li>-->
                        <!--                                <li>-->
                        <!--                                    <a href="#">更多设置</a>-->
                        <!--                                </li>-->
                        <!--                                <li class="divider">-->
                        <!--                                </li>-->
                        <!--                                <li>-->
                        <!--                                    <a href="#">分割线</a>-->
                        <!--                                </li>-->
                        <!--                            </ul>-->
                        <!--                        </li>-->
                    </ul>
                    <br />
                    <br />
                    <br />

                    <div class="form-group">
                        <label> Enter old password *</label>
                        <input type="password" required="required" class="form-control" name="oldpass" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label> Enter new password * </label>
                        <input type="password" required="required" class="form-control" name="newpass" />
                    </div>
                    <br />
                    <div class="form-group">
                        <label> Enter new password again * </label>
                        <input type="password" required="required" class="form-control" name="newpass2" />
                    </div>
                    <br />

                    <button type="submit" class="btn btn-primary">Submit</button>

                    <?php //echo "The birthday is $birthday";?>

                </div>
                <div class="col-md-2 column">
                </div>
            </div>
        </form>
    </div>
</div>
</body>

</html>