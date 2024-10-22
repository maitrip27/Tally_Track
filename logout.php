<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="header">
        Logout
    </div>
    <div class="content">
        <div class="message success">You have been logged out successfully.</div>
        <br />
        <a href="index.php">Home</a>
    </div>
    <div id="footer">
    Created by Maitri Pandya(IT - B 1082)
    </div>
</body>

</html>