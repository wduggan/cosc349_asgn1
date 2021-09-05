<!DOCTYPE html>
<html lang="en">

<head>
	<title>Customer Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>



<body>
	<section class="top-box">
		<a href="">Admin</a>
	</section>

	<header>
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a>View Products</a></li>
			</ul>
		</nav>
	</header>


	<main>
		<section class="boxes">

			<h2>View Products:</h2>

			<table>
				<thead>
					<tr>
						<th>Product-ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>Quantity</th>
						<th></th>
					</tr>
				</thead>
				<tbody>

					<?php

					$servername = "192.168.2.13";
					$username = "admin";
					$password = "admin";
					$dbname = "business";
					// Create connection
					$con = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($con->connect_error) {
						die("Connection failed: " . $con->connect_error);
					}


					$sql = "SELECT * FROM products;";
					$result = $con->query($sql);

					echo "<script>console.log($result);</script>";

					while ($row = $result->fetch_assoc()) {
						echo "<tr>";
						echo "<td>" . $row['productId'] . "</td>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['description'] . "</td>";
						echo "<td>" . $row['price'] . "</td>";
						echo "<td>" . $row['quantity'] . "</td>";
						echo "<td><button>Buy</button></td>";
						echo "</tr>";
					}
					?>

				</tbody>
			</table>

		</section>
	</main>

	<footer class="boxes">
		<p>We sell stuff</p>
	</footer>

</body>

</html>