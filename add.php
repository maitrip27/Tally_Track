<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add Data</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php
	if (!isset($_SESSION['valid'])) {
		header('Location: login.php');
	}
	?>

	<div id="header">
		Add New Product
	</div>
	<div class="content">
		<?php
		//including the database connection file
		include_once("connection.php");

		if (isset($_POST['Submit'])) {
			$name = $_POST['name'];
			$qty = $_POST['qty'];
			$price = $_POST['price'];
			$loginId = $_SESSION['id'];

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

				echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
			} else {
				// if all the fields are filled (not empty) 
		
				//insert data to database	
				$result = mysqli_query($mysqli, "INSERT INTO products(name, qty, price, login_id) VALUES('$name','$qty','$price', '$loginId')");

				//display success message
				echo "<div class='message success'>Data added successfully.</div>";
				echo "<br/><a href='view.php'>View Result</a>";
			}
		}
		?>
	</div>
	<div id="footer">
	Created by Maitri Pandya(IT - B 1082)
	</div>
</body>

</html>