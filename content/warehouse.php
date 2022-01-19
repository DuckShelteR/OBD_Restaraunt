	<?php include("../includes/header_skl.php"); ?>


	<div id="products">
		<h2>СКЛАД</h2>

		<?php 
		$query =mysqli_query($con, "SELECT * FROM store");
		echo "<table border='1' align = 'center'>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Purchase date</th>
		<th>Amount</th>
		<th>Purveyor</th>
		</tr>";
		$med = array();
		while($row=mysqli_fetch_assoc($query))
			{
				echo "<tr>";
				echo "<td>" . $row['id_ingredient'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['purchase_date'] . "</td>";
				echo "<td>" . $row['amount'] . "</td>";
				echo "<td>" . $row['purveyor'] . "</td>";
			}
		echo "</table>";
		?>
	</div>

	<div id="logout">
		<p><a href="intropage.php">На главную</a></p>
	</div>
	
	<?php include("../includes/footer.php"); ?>