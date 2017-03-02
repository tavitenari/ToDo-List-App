<?php
/*
Ioane "Tavi" Tenari
3/5/16
CSE 154 AK
Courtney Dowell
HW 7 - todolist.php

todolist.php 
-HTML and PHP which create the todo list and make requests to add/delete entries.
*/

include("common.php");
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
			<h2><?=$_SESSION["name"] ?>'s To-Do List</h2>

			<ul id="todolist">
			
				<?php
				#Entries are created here from each line of todo_*username.txt.
				if(file_exists($todo)){
					$list = file($todo);
					$count = 0;
					foreach($list as $line){
					?>
						<li>
							<form action="submit.php" method="post">
								<input type="hidden" name="action" value="delete" />
								<input type="hidden" name="index" value="<?=$count ?>" />
								<input type="submit" value="Delete" />
							</form>
						<?=$line ?>
						</li>
					<?php
						$count++;
					}
				}
				?>
				
				<li>
					<form action="submit.php" method="post">
						<input type="hidden" name="action" value="add" />
						<input name="item" type="text" size="25" autofocus="autofocus" />
						<input type="submit" value="Add" />
					</form>
				</li>
			</ul>

			<div>
				<a href="logout.php"><strong>Log Out</strong></a>
				<em>(logged in since <?=$_COOKIE["date"] ?>)</em>
			</div>

		</div>

		<div class="headfoot">
			<p>
				&quot;Remember The Cow is nice, but it's a total copy of another site.&quot; - PCWorld<br />
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
