<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Welcome to my page!
	</div>
	<div class="content">
		<?php
		if (isset($_SESSION['valid'])) {
			include("connection.php");
			$result = mysqli_query($mysqli, "SELECT * FROM login");
			?>
			<p>Welcome <?php echo $_SESSION['name'] ?>! <a href='logout.php'>Logout</a></p>
			<p><a href='view.php'>View and Add Products</a></p>
			<?php
		} else {
			echo "<p>You must be logged in to view this page.</p>";
			echo "<p><a href='login.php'>Login</a> | <a href='register.php'>Register</a></p>";
		}
		?>
	</div>
	<div id="footer">
		Created by Maitri Pandya(IT - B 1082)
	</div>
</body>

</html>