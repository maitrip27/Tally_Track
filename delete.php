<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Delete Product</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	if (!isset($_SESSION['valid'])) {
		header('Location: login.php');
	}
	?>

	<div id="header">
		Delete Product
	</div>
	<div class="content">
		<?php
		//including the database connection file
		include("connection.php");

		//getting id of the data from url
		$id = $_GET['id'];

		//deleting the row from table
		$result = mysqli_query($mysqli, "DELETE FROM products WHERE id=$id");

		//redirecting to the display page (view.php in our case)
		header("Location:view.php");
		?>
	</div>
	<div id="footer">
	Created by Maitri Pandya(IT - B 1082)
	</div>
</body>

</html>