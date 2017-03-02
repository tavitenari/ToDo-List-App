<?php
/*
Ioane "Tavi" Tenari
3/5/16
CSE 154 AK
Courtney Dowell
HW 7 - common.php

common.php 
-This brief code is used in muiltiple other pages.
*/

session_start();
if(!isset($_SESSION["name"])){
	header("Location: start.php");
	die();
}
else{
	$todo = "todo_" . $_SESSION["name"] . ".txt";
}
?>