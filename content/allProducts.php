<?php include("../includes/header_menu.php"); ?>


	<div id="products">
		<h2>МЕНЮ</h2>

		<?php 
		$query =mysqli_query($con, "SELECT * FROM menu");
		echo "<table border='1' align = 'center'>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Weight</th>
		<th>Price</th>
		<th>Cooking time</th>
		</tr>";
		$med = array();
		while($row=mysqli_fetch_assoc($query))
			{
				array_push($med, $row['name'] . ".php");
				echo "<tr>";
				echo "<td>" . $row['id_dish'] . "</td>";
				echo "<td>" . "<p><a href=". "../menu/" . $row['id_dish'] .".php" . ">" . $row['name'] . "</a></p>" . "</td>";
				echo "<td>" . $row['weight'] . "</td>";
				echo "<td>" . $row['cost'] . "</td>";
				echo "<td>" . $row['cooking_time'] . "</td>";
			}
		echo "</table>";
		?>
	</div>

	<div id="logout">
		<p><a href="intropage.php">На главную</a></p>
	</div>
	
	<?php include("../includes/footer.php"); ?>