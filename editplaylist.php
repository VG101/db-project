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
                        <li class="active">
                            <a href="follow.php">Follow</a>
                        </li>
                        <li>
                            <a href="playlist.php">MyList</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">Action</a>
                                </li>
                                <li>
                                    <a href="#">Another action</a>
                                </li>
                                <li>
                                    <a href="#">Something else here</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">Separated link</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="#">One more separated link</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" role="search">
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
        <?php
        $pid = $_GET['pid'];
        $ptitle = $_GET['ptitle'];
        echo"<h2>$ptitle</h2>";
        ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Track Title</th>
                <th>Artist</th>
                <th>Duration</th>
                <th>Genre</th>
                <th>Description</th>
                <!--   <th>City</th> -->
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


            $uname = $_COOKIE['uname'];
            $uid = $_COOKIE['uid'];

            //$result = $con->query("SELECT * FROM playlistdetail where uid='$uid' and privacy='public'");
            $result = $con->query("SELECT * FROM playlistcontents, trackdetail, track, artist where playlistcontents.pid=$pid and trackdetail.tid = playlistcontents.tid and trackdetail.tid = track.tid and track.artistid = artist.artistid");
            //echo "SELECT * FROM playlistdetail where uid=$uid and privacy='public'";

            echo "<tbody>";

            while($row = mysqli_fetch_array($result))
            {
                $temp1 = $row['pid'];
                $temp2 = $row['tid'];
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['aname'] . "</td>";
                echo "<td>" . $row['duration'] . "</td>";
                echo "<td>" . $row['genre'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td><a href='editplaylistcontent.php?pid=$temp1 & tid=$temp2 & ptitle=$ptitle'><button type=\"button\" class=\"btn btn-primary\">Delete</button></a></td>";
                //echo "<td>" . $row['city'] . "</td>";

                echo "</tr>";
            }
            echo "</tbody>";

            mysqli_close($con);
            ?>
        </table>
    </div>
</div>
</body>

</html>