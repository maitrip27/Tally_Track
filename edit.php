<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	if (!isset($_SESSION['valid'])) {
		header('Location: login.php');
	}
	?>

	<div id="header">
		Edit Product
	</div>
	<div class="content">
		<a href="index.php">Home</a> | <a href="view.php">View Products</a> | <a href="logout.php">Logout</a>
		<br /><br />

		<?php
		// including the database connection file
		include_once("connection.php");

		if (isset($_POST['update'])) {
			$id = $_POST['id'];

			$name = $_POST['name'];
			$qty = $_POST['qty'];
			$price = $_POST['price'];

			// checking empty fields
			if (empty($name) || empty($qty) || empty($price)) {
				if (empty($name)) {
					echo "<div class='message error'>Name field is empty.</div>";
				}

				if (empty($qty)) {
					echo "<div class='message error'>Quantity field is empty.</div>";
				}

				if (empty($price)) {
					echo "<div class='message error'>Price field is empty.</div>";
				}
			} else {
				//updating the table
				$result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");

				//redirecting to the display page. In our case, it is view.php
				header("Location: view.php");
			}
		}
		?>
		<?php
		//getting id from url
		$id = $_GET['id'];

		//selecting data associated with this particular id
		$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id=$id");

		while ($res = mysqli_fetch_array($result)) {
			$name = $res['name'];
			$qty = $res['qty'];
			$price = $res['price'];
		}
		?>
		<form name="form1" method="post" action="edit.php" style="width: 100%;">
			<table border="0">
				<tr>
					<td>Name</td>
					<td><input type="text" name="name" value="<?php echo $name; ?>"></td>
				</tr>
				<tr>
					<td>Quantity</td>
					<td><input type="text" name="qty" value="<?php echo $qty; ?>"></td>
				</tr>
				<tr>
					<td>Price</td>
					<td><input type="text" name="price" value="<?php echo $price; ?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
					<td><input type="submit" name="update" value="Update"></td>
				</tr>
			</table>
		</form>
	</div>
	<div id="footer">
	Created by Maitri Pandya(IT - B 1082)
	</div>
</body>

</html>