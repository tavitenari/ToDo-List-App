<?php
/*
Ioane "Tavi" Tenari
3/5/16
CSE 154 AK
Courtney Dowell
HW 7 - logout.php

logout.php 
-Called when a user clicks "logout" and ends a session. Reroutes back to start.php.
*/

include("common.php");
session_destroy();
header("Location: start.php");
die();
?>