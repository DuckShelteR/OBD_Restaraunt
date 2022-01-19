<?php

session_start();

if(!isset($_SESSION["session_username"])):
	header("location:content/login.php");
else:
	?>
	
	<?php include("includes/header_main.php"); ?>

	<link href="css/style.css" 
media="screen" rel="stylesheet">

	<div id="welcome">
		<h2>Добро пожаловать в ресторан!<span></h2>
		<nav>
			<ul id="menu">
				<li><p><a href="content/allProducts.php">Меню</a></p></li>
				<li><p><a href="content/employees.php">Работники</a></p></li>
				<li><p><a href="content/purchases.php">История покупок</a></p></li>
				<li><p><a href="content/warehouse.php">Склад</a></p></li>
			</ul>
		</nav>
		<img src="content/restoran.jpg" alt="ресторан">
	</div>

	<div id="logout">
		<p><a href="content/logout.php">Выйти</a> из системы</p>
	</div>
	
	<?php include("includes/footer.php"); ?>
	<?php endif; ?>