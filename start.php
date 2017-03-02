<?php
/*
Ioane "Tavi" Tenari
3/5/16
CSE 154 AK
Courtney Dowell
HW 7 - start.php

start.php 
-HTML and PHP which create the login page.
*/

if(isset($_SESSION["name"])){
	header("Location: todolist.php");
	die();
}
#last login available if a cookie exists.
if(isset($_COOKIE["date"])){
	$date = "(last login from this computer was " . $_COOKIE["date"] . ")";
}
else{
	$date="";
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remember the Cow</title>
		<link href="https://webster.cs.washington.edu/css/cow-provided.css" type="text/css" rel="stylesheet" />
		<link href="https://webster.cs.washington.edu/images/todolist/favicon.ico" type="image/ico" rel="shortcut icon" />
	</head>

	<body>
		<div class="headfoot">
			<h1>
				<img src="https://webster.cs.washington.edu/images/todolist/logo.gif" alt="logo" />
				Remember<br />the Cow
			</h1>
		</div>

		<div id="main">
			<p>
				The best way to manage your tasks. <br />
				Never forget the cow (or anything else) again!
			</p>

			<p>
				Log in now to manage your to-do list. <br />
				If you do not have an account, one will be created for you.
			</p>

			<form id="loginform" action="login.php" method="post">
				<div><input name="name" type="text" size="8" autofocus="autofocus" /> <strong>User Name</strong></div>
				<div><input name="password" type="password" size="8" /> <strong>Password</strong></div>
				<div><input type="submit" value="Log in" /></div>
			</form>

			<p>
				<em><?=$date ?></em>
			</p>
		</div>

		<div class="headfoot">
			<p>
				<q>Remember The Cow is nice, but it's a total copy of another site.</q> - PCWorld<br />
				All pages and content &copy; Copyright CowPie Inc.
			</p>

			<div id="w3c">
				<a href="https://webster.cs.washington.edu/validate-html.php">
					<img src="https://webster.cs.washington.edu/images/w3c-html.png" alt="Valid HTML" /></a>
				<a href="https://webster.cs.washington.edu/validate-css.php">
					<img src="https://webster.cs.washington.edu/images/w3c-css.png" alt="Valid CSS" /></a>
			</div>
		</div>
	</body>
</html>
