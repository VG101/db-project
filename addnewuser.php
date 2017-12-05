<?php
session_start();

$dbhost = '127.0.0.1';
$dbuser = 'root';
$password = '12345678';
$dbname = 'project';

$link = mysqli_connect($dbhost, $dbuser, $password, $dbname);
if(mysqli_connect_errno($link)) {
    echo "Connection fail: " . mysqli_connect_error();
}

$email = $_POST['email'];
$pwd = $_POST['pwd'];
$username = $_POST['username'];
//echo $pwd;
//echo "INSERT INTO User(uname, realname, email, city, password) Values ('".$username."', '".$realname."', '".$email."', '".$city."', '".$pwd."')";


?>



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
                $query1 = "SELECT * FROM User WHERE uname = '".$username."'";
                $result1 = mysqli_query($link,$query1);
                $row1 = mysqli_fetch_array($result1);

                if($row1[0]==null){
                    $insertnew = "INSERT INTO User(uname, email, password) Values ('".$username."', '".$email."', '".$pwd."')";
                    $result_insertnew = mysqli_query($link,$insertnew);
                    if($result_insertnew){
                        echo "<h1>You have successfully registered</h1>";
                    }
                    else{
                        echo "<h1>Something wrong happened, please try again later.</h1>";
                    }
                }

                else{
                    echo "<h1>The username has been registered, Please try again!</h1>";
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


