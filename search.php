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

$keyword = $_POST['keyword'];
$uname = $_COOKIE['uname'];
$uid = $_COOKIE['uid'];

//$trackresult = $con->query("SELECT * FROM trackdetail where title like '%$keyword%'");
$artistresult = $con->query("SELECT * FROM artist where aname like '%$keyword%'");
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
                        <li >
                            <a href="playlist.php">My List</a>
                        </li>
                        <li class="active">
                            <a href="history.php">History</a>
                        </li>
                    </ul>
                    <form method="POST" action="search.php" class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" />
                        </div> <button type="submit" class="btn btn-default">Submit</button>
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
            <div class="col-md-1 column">
            </div>
            <div class="col-md-10 column">
                <div class="tabbable" id="tabs-736642">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#panel-695670" data-toggle="tab">Track</a>
                        </li>
                        <li>
                            <a href="#panel-515410" data-toggle="tab">Artist</a>
                        </li>
                        <li>
                            <a href="#panel-595959" data-toggle="tab">User</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="panel-695670">
                            <br />
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Artist</th>
                                    <th>Duration</th>
                                    <th>Genre</th>
                                </tr>
                                </thead>
                                <?php
                                $trackresult = $con->query("SELECT * FROM trackdetail NATURAL left JOIN track NATURAL LEFT JOIN artist where title like '%$keyword%'");
                                echo "<tbody>";

                                while($row = mysqli_fetch_array($trackresult))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row['title'] . "</td>";
                                    echo "<td>" . $row['aname'] . "</td>";
                                    echo "<td>" . $row['duration'] . "</td>";
                                    echo "<td>" . $row['genre'] . "</td>";
                                    echo "<td><a href='editfollow.php?fid=$temp1'><button type=\"button\" class=\"btn btn-primary\">Unfollow</button></a></td>";
                                    //echo "<td>" . $row['city'] . "</td>";

                                    echo "</tr>";
                                }
                                echo "</tbody>";

                                mysqli_close($con);
                                ?>
                            </table>
                        </div>
                        <div class="tab-pane" id="panel-515410">
                            <br />
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Artist Name</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <?php
                                $trackresult = $con->query("SELECT * FROM artist where aname like '%$keyword%'");
                                echo "<tbody>";

                                while($row = mysqli_fetch_array($trackresult))
                                {
                                    echo "<tr>";
                                    echo "<td>" . $row['aname'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td><a href='editfollow.php?fid=$temp1'><button type=\"button\" class=\"btn btn-primary\">Unfollow</button></a></td>";
                                    //echo "<td>" . $row['city'] . "</td>";

                                    echo "</tr>";
                                }
                                echo "</tbody>";

                                mysqli_close($con);
                                ?>
                            </table>
                        </div>
                        <div class="tab-pane" id="panel-595959">
                            <br />
                            <p>
                               Place for user.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 column">
            </div>
        </div>
    </div>
</div>
</body>

</html>