



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign-Up/Login Form</title>
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="css/style.css">


</head>

<body>
<div class="form">

	<div class="main">
		<div class="login-form">

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

            $pwdin = $_POST['pwdin'];
            $uname = $_POST['uname'];
            //echo $uname;

            $query1 = "SELECT * FROM User WHERE uname = '".$uname."'";
            $result1 = mysqli_query($link,$query1);
            $row1 = mysqli_fetch_array($result1);

            if($row1[0]==null){
                echo "<h1>Username does not exist, please register first.</h1>";
            }
            else {


                $query2 = "SELECT * FROM User WHERE uname = '" . $uname . "' and password = '" . $pwdin . "'";

                $result2 = mysqli_query($link, $query2);

                $row2 = mysqli_fetch_array($result2);

                $query3 = "SELECT * FROM User WHERE uname = '" . $uname . "'";
                $result3 = mysqli_query($link, $query3);
                $row3 = mysqli_fetch_row($result3);
                $uid = $row3[0];
                $uname = $row3[1];

                //if($count >0)


                if ($row2[0]==null) {
                    echo "<h1>Incorrect Password!</h1>";
                    //echo"<script> document.getElementById(\"info\").style.display='block';
                    //document.getElementById(\"info\").innerHTML='Your information is wrong, please try again! ';
                    //                               </script > ";
                }
                else {

                    $_SESSION['loggedin'] = 1;
                    setcookie("uid", "$uid");
                    setcookie("uname", "$uname");
                    exit(header("Location:index.php"));

                }
            }

            ?>

				<form method="POST" action="login.php">
					<div class="submit">
						<input type="submit" value="Back to login page">
					</div>
				</form>

		</div>
	</div>


</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="js/index.js"></script>
</body>
</html>


