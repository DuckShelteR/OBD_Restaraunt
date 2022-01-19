	<?php include("../includes/header_rab.php"); ?>


	<div id="products">
		<h2>РАБОТНИКИ</h2>

		<?php

		$query =mysqli_query($con, "SELECT * FROM employees");
		echo "<table border='1' align = 'center'>
		<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Phone number</th>
		<th>Age</th>
		</tr>";
		$med = array();
		while($row=mysqli_fetch_assoc($query))
			{
				echo "<tr>";
				echo "<td>" . $row['id_employees'] . "</td>";
				echo "<td>" . $row['name'] . "</td>";
				echo "<td>" . $row['phone_number'] . "</td>";
				echo "<td>" . $row['age'] . "</td>";

				
			}
		echo "</table>";
		?>
	</div>

	<div id="logout">
		<p><a href="intropage.php">На главную</a></p>
	</div>
	
	<?php include("../includes/footer.php"); ?>