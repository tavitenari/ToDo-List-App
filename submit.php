<?php
/*
Ioane "Tavi" Tenari
3/5/16
CSE 154 AK
Courtney Dowell
HW 7 - submit.php

submit.php 
-Called when the user wants to add or delete an item to/from the todo list. 
*/

include("common.php");

#Adds entry
if($_POST["action"] == "add"){
	$output = htmlspecialchars($_POST["item"]); #Converts text to encoded HTML
	file_put_contents($todo, $output . "\r\n", FILE_APPEND);
	header("Location: todolist.php");
	die();
}
#Deletes entry
else if(($_POST["action"]) == "delete"){
	$list = file($todo);
	unlink($todo);
	unset($list[($_POST["index"])]);
	$list = array_values($list);
	foreach($list as $line){
		file_put_contents($todo, $line, FILE_APPEND);
	}
	header("Location: todolist.php");
	die();
}
#Error if "action" set to neither add nor delete.
else{
	die("Error: Parameter set at incorrect value.");
}
?>