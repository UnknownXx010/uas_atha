<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<h2>Login Dealer</h2>

<form method="POST" action="cek_login.php">
Username <br>
<input type="text" name="username" required><br><br>

Password <br>
<input type="password" name="password" required><br><br>

<button type="submit">Login</button>
</form>

</body>
</html>