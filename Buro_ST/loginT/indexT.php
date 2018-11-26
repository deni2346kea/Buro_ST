<?php
session_id("session1");
session_start();
echo session_id();
$_SESSION["name"] = "1";

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: loginT.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">

    <title>Buro</title>
    <link rel="icon" href="../media/Buro.png" type="image/gif" sizes="16x16">
    <link href="https://fonts.googleapis.com/css?family=Sintony" rel="stylesheet">
    <link rel="stylesheet" href="../src/styleA.css">
    <script src="https://use.fontawesome.com/33c8c94010.js"></script>


    <style>


        ul {

            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #231F20;
        }

        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
            text-decoration: underline;
        }
    </style>


</head>






<body>

<header>
    <div class="container">
        <div id="branding">
            <img id="logo" src="../media/Buro.png" sizes="70%">
            <h1 id="moto">BOOK YOUR DREAM CAR</h1>
        </div>
        <div id="barring">
            <nav>
                <ul id="nav1">
                    <li class="current"><a href="../src/ListCar.php">List your car</a  ></li>
                    <li><a href="blog.html">Learn more</a></li>
                    <li><a href="../loginT/loginT.php">Log in</a></li>
                    <li style="float:right"><a href="../loginT/registerT.php">Sign up</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>


<div class="parallax"></div>

<div style="height:500px;
        background-color:white;
        font-size:36px">
    <a href="../src/BookCar.php"><img src="../media/second.png" , alt="snow" ,height="100%" , width="100%"></a>
</div>


<div style="height:400px;
        background-color:red;
        font-size:36px">
    <img src="../media/three.png" , height="100%" , width="100%">
</div>







</body>
</html>