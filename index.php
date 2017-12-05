<?php
session_start();

//$logout=$_GET['logout'];
//if($logout ==1)
//    $_SESSION['loggedin']=0;
//
//if($_SESSION['loggedin']!=1)
//{
//    header("Location:login.php");
//    exit;
//}

$uname = $_COOKIE['uname'];
$uid = $_COOKIE['uid'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Music</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bg.css">
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
                        <li >
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
                    <form method="POST" action="search.php" class="navbar-form navbar-left" role="search">
                        <div class="form-group" >
                            <input name="keyword" type="text" class="form-control" />
                        </div> <button type="submit" class="btn btn-default">Search</button>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
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
        <div class="row clearfix">
            <div class="col-md-3 column" style="background: #0f0f0f; opacity: 0.9; color: #FFF">
                <div class="row clearfix">
                    <div class="col-md-1 column">
                    </div>
                    <div class="col-md-11 column" >
                        <div class="row clearfix">
                            <div class="col-md-1 column">
                            </div>
                            <div class="col-md-11 column">
                                <img src="pic/m5.jpg" height="160" width="250"/>

                                <br />
                                <br />

                                <dl>
                                    <dt>
                                        Maroon 5
                                    </dt>
                                    <dd>
                                        Maroon 5 is an American pop rock band that originated in Los Angeles, California.
                                    </dd>

                                </dl>
                                <br />
                            </div>
                        </div>
                        <div class="container">
                            <h3>Similar Artists</h3>
                        </div>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    Artist Name
                                </th>
                            </tr>
                            </thead>
                            <?php

                            define('DB_HOST', '127.0.0.1');
                            define('DB_USER', 'root');
                            define('DB_PASS', '12345678');
                            define('DB_NAME', 'project');
                            $con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                            if ($con->connect_errno) {
                                printf("Connect failed: %s\n", $con->connect_error);
                                exit();
                            }
                            mysqli_select_db($con, DB_NAME);


                            $result = $con->query("SELECT * FROM artist");

                            echo "<tbody>";

                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<tr>";
                                echo "<td>" . $row['aname'] . "</td>";
                                //echo "<td>" . $row['city'] . "</td>";

                                echo "</tr>";
                            }
                            echo "</tbody>";

                            mysqli_close($con);
                            ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 column" style="background: #0f0f0f; opacity: 0.9; color: #FFF;">
                <div class="row clearfix">
                    <div class="col-md-1 column" >
                    </div>
                    <div class="col-md-10 column" >
                        <div class="carousel slide" id="carousel-327187">
                            <ol class="carousel-indicators">
                                <li data-slide-to="0" data-target="#carousel-327187">
                                </li>
                                <li data-slide-to="1" data-target="#carousel-327187" class="active">
                                </li>
                                <li data-slide-to="2" data-target="#carousel-327187">
                                </li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item">
                                    <img alt="" src="pic/image4.jpg" />
                                    <div class="carousel-caption">
                                        <h4>
                                            F & F MUSIC
                                        </h4>
                                        <p>
                                            Fast & Furious Origin Sound Track.
                                        </p>
                                    </div>
                                </div>
                                <div class="item active">
                                    <img alt="" src="pic/image2.jpg" />
                                    <div class="carousel-caption">
                                        <h4>
                                            KTV Classic
                                        </h4>
                                        <p>
                                            Most Classic KTV Songs.
                                        </p>
                                    </div>
                                </div>
                                <div class="item">
                                    <img alt="" src="pic/image3.jpg" />
                                    <div class="carousel-caption">
                                        <h4>
                                            Animation BGM
                                        </h4>
                                        <p>
                                            Excellent Animation Background Musics.
                                        </p>
                                    </div>
                                </div>
                            </div> <a class="left carousel-control" href="#carousel-327187" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-327187" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>
                        <div class="media" >
                            <br />
                            <a href="#" class="pull-left"><img src="pic/Jay.jpg" class="media-object" height="160" width="160" /></a>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    Today's Recommand
                                </h4> Jay Chou is a Taiwanese musician, singer, songwriter, record producer, film producer, actor and director.

                            </div>

                        </div>
                        <table class="table">
                            <br />
                            <thead>
                            <tr>
                                <th>
                                    编号
                                </th>
                                <th>
                                    产品
                                </th>
                                <th>
                                    交付时间
                                </th>
                                <th>
                                    状态
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    01/04/2012
                                </td>
                                <td>
                                    Default
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    01/04/2012
                                </td>
                                <td>
                                    Approved
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    02/04/2012
                                </td>
                                <td>
                                    Declined
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    3
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    03/04/2012
                                </td>
                                <td>
                                    Pending
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    04/04/2012
                                </td>
                                <td>
                                    Call in to confirm
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <ul class="pagination">
                            <li>
                                <a href="#">Prev</a>
                            </li>
                            <li>
                                <a href="#">1</a>
                            </li>
                            <li>
                                <a href="#">2</a>
                            </li>
                            <li>
                                <a href="#">3</a>
                            </li>
                            <li>
                                <a href="#">4</a>
                            </li>
                            <li>
                                <a href="#">5</a>
                            </li>
                            <li>
                                <a href="#">Next</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-1 column">
                    </div>
                </div>
            </div>
            <div class="col-md-3 column" style="background: #0f0f0f; opacity: 0.9; color: #FFF">
                <div class="row clearfix">
                    <div class="col-md-11 column">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>
                                    编号
                                </th>
                                <th>
                                    产品
                                </th>
                                <th>
                                    交付时间
                                </th>
                                <th>
                                    状态
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    01/04/2012
                                </td>
                                <td>
                                    Default
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    01/04/2012
                                </td>
                                <td>
                                    Approved
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    2
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    02/04/2012
                                </td>
                                <td>
                                    Declined
                                </td>
                            </tr>
                            <tr >
                                <td>
                                    3
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    03/04/2012
                                </td>
                                <td>
                                    Pending
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    4
                                </td>
                                <td>
                                    TB - Monthly
                                </td>
                                <td>
                                    04/04/2012
                                </td>
                                <td>
                                    Call in to confirm
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-1 column">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
