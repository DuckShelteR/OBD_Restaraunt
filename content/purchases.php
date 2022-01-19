	<?php include("../includes/header_pok.php"); ?>


	<div id="products">
		<h2>ИСТОРИЯ ПОКУПОК</h2>

		<?php

		$query =mysqli_query($con, "SELECT * FROM oder");
		echo "<table border='1' align = 'center'>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Phone number</th>
		<th>Total price</th>
		</tr>";
		$med = array();
		while($row=mysqli_fetch_assoc($query))
			{
				echo "<tr>";
				echo "<td>" . $row['id_order'] . "</td>";
				echo "<td>" . $row['customer'] . "</td>";
				echo "<td>" . $row['customer_phone'] . "</td>";
				echo "<td>" . $row['total_cost'] . "</td>";
			}
		echo "</table>";
		?>
	</div>

	<div id="logout">
		<p><a href="intropage.php">На главную</a></p>
	</div>
	
	<?php include("../includes/footer.php"); ?>