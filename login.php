<?php
/*
Ioane "Tavi" Tenari
3/5/16
CSE 154 AK
Courtney Dowell
HW 7 - login.php

login.php 
-Called when a user attempts to log in to the todo list site.
*/

#Error if either the username or password is empty.
if(($_POST["name"] == "") || ($_POST["password"] == "")){
	die("Error: Invalid Entry");
}
else{
	#constant used to set timeout for cookie at 7 days.
	$EXPIRE = time() + (60*60*24*7);
	
	#Regex validation for username and password.
	$namegate = preg_match("/^[a-z][a-z0-9]{2,7}$/", $_POST["name"]);
	$passwordgate = preg_match("/^\d.{4,10}[^a-zA-Z0-9]$/", $_POST["password"]);
	
	#Will either log back into existing account or create new account.
	#Also will set cookie for time upon a successful login.
	if($namegate && $passwordgate){
		if(!userExists($_POST["name"])){
			setcookie("date", date("D y M d, g:i:s a"), $EXPIRE);
			session_start();
			$_SESSION["name"] = $_POST["name"];
			$_SESSION["password"] = $_POST["password"];
			$userinput = $_POST["name"] . ":" . $_POST["password"] . "\r\n";
			file_put_contents("users.txt", $userinput, FILE_APPEND);
			header("Location: todolist.php");
			die();
		}
		else{
			if(correctCombo()){
				setcookie("date", date("D y M d, g:i:s a"), $EXPIRE);
				session_start();
				$_SESSION["name"] = $_POST["name"];
				$_SESSION["password"] = $_POST["password"];
				header("Location: todolist.php");
				die();
			}
			else{
				session_destroy();
				header("Location: start.php");
				die();
			}
		}
	}
	else{
		header("Location: start.php");
	}
}

#Returns boolean for whether a username already exists.
function userExists($name){
	if(file_exists("users.txt")){
		$users = file("users.txt");
		foreach($users as $user){
			$test = substr($user, 0, strlen($name));
			if($name == $test){
				return true;
			}
		}
	}
	return false;
}

#Returns boolean for whether username is paired with the correct password.
function correctCombo(){
	$users = file("users.txt");
	foreach($users as $user){
		$user = preg_replace('/\s+/', '', $user);
		if(($_POST["name"] . ":" . $_POST["password"]) == $user){
			return true;
		}	
	}
	return false;
}
?>