<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>View Products</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	if (!isset($_SESSION['valid'])) {
		header('Location: login.php');
	}
	?>

	<div id="header">
		View Products
	</div>
	<div class="content">
		<a href="index.php">Home</a> | <a href="add.html">Add New Data</a> | <a href="logout.php">Logout</a>
		<br /><br />

		<?php
		//including the database connection file
		include_once("connection.php");

		//fetching data in descending order (lastest entry first)
		$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=" . $_SESSION['id'] . " ORDER BY id DESC");
		?>

		<table>
			<tr bgcolor='#CCCCCC'>
				<th>Name</th>
				<th>Quantity</th>
				<th>Price (euro)</th>
				<th>Update</th>
			</tr>
			<?php
			while ($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>" . $res['name'] . "</td>";
				echo "<td>" . $res['qty'] . "</td>";
				echo "<td>" . $res['price'] . "</td>";
				echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
			}
			?>
		</table>
	</div>
	<div id="footer">
	Created by Maitri Pandya(IT - B 1082)
	</div>
</body>

</html>