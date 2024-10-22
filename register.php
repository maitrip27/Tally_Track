<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Register
	</div>
	<div class="content">
		<a href="index.php">Home</a>
		<?php
		include("connection.php");

		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$user = $_POST['username'];
			$pass = $_POST['password'];

			if ($user == "" || $pass == "" || $name == "" || $email == "") {
				echo "<div class='message error'>All fields should be filled. Either one or many fields are empty.</div>";
				echo "<a href='register.php'>Go back</a>";
			} else {
				mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
					or die("Could not execute the insert query.");

				echo "<div class='message success'>Registration successful</div>";
				echo "<a href='login.php'>Login</a>";
			}
		} else {
			?>
			<form name="form1" method="post" action="" style="width: 100%;">
				<table>
					<tr>
						<td>Full Name</td>
						<td><input type="text" name="name"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="email"></td>
					</tr>
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