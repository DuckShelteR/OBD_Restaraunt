	<?php include("../includes/header.php"); ?>

	<?php 
	$query =mysqli_query($con, "SELECT * FROM menu WHERE id_dish = 1");
	$row=mysqli_fetch_assoc($query);
	?>

	<div id="welcome">
		<h2><?php echo $row['name'];?></h2>

	<?php 
	$query =mysqli_query($con, "SELECT name FROM store WHERE id_ingredient = '".$row['id_ingredient']."'");
	$first=mysqli_fetch_assoc($query);
	$query =mysqli_query($con, "SELECT name FROM store WHERE id_ingredient = '".$row['id_ingredient_2']."'");
	$second=mysqli_fetch_assoc($query);
	$query =mysqli_query($con, "SELECT name FROM store WHERE id_ingredient = '".$row['id_ingredient_3']."'");
	$third=mysqli_fetch_assoc($query);
	?>

		<h2>Состав: <?php echo $first['name'] . ", " . $second['name'] . ", " . $third['name'] . "."; ?></h2>
		<img src="1.jpg" alt="суп">
	</div>

	<div id="logout">
		<p><a href="../content/intropage.php">На главную</a></p>
	</div>
	<?php include("../includes/footer.php"); ?>