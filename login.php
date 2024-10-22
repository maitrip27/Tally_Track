<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Login
	</div>
	<div class="content">
		<a href="index.php">Home</a>
		<?php
		include("connection.php");

		if (isset($_POST['submit'])) {
			$user = mysqli_real_escape_string($mysqli, $_POST['username']);
			$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

			if ($user == "" || $pass == "") {
				echo "<div class='message error'>Either username or password field is empty.</div>";
				echo "<a href='login.php'>Go back</a>";
			} else {
				$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");

				$row = mysqli_fetch_assoc($result);

				if (is_array($row) && !empty($row)) {
					$validuser = $row['username'];
					$_SESSION['valid'] = $validuser;
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
				} else {
					echo "<div class='message error'>Invalid username or password.</div>";
					echo "<a href='login.php'>Go back</a>";
				}

				if (isset($_SESSION['valid'])) {
					header('Location: index.php');
				}
			}
		} else {
			?>
			<form name="form1" method="post" action="" style="width: 100%;">
				<table>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="submit" value="Submit"></td>
					</tr>
				</table>
			</form>
			<?php
		}
		?>
	</div>
	<div id="footer">
	Created by Maitri Pandya(IT - B 1082)
	</div>
</body>

</html>