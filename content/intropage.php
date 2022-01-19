<?php

session_start();

if(!isset($_SESSION["session_username"])):
	header("location:login.php");
else:
	?>
	
	<?php include("../includes/header_main.php"); ?>

	<div id="welcome">
		<h2>Добро пожаловать к нам в ресторан!<span></h2>
		<nav>
			<ul id="menu">
				<li><p><a href="allProducts.php">Меню</a></p></li>
				<li><p><a href="employees.php">Работники</a></p></li>
				<li><p><a href="purchases.php">История покупок</a></p></li>
				<li><p><a href="warehouse.php">Склад</a></p></li>
			</ul>
		</nav>
		<img src="restoran.jpg" alt="ресторан">
	</div>

	<div id="logout">
		<p><a href="logout.php">Выйти</a> из системы</p>
	</div>
	
	<?php include("../includes/footer.php"); ?>
	<?php endif; ?>