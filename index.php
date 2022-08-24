<?php 

include 'config.php';

session_start();

error_reporting(0);
if (isset($_SESSION['username'])) {
    header("Location: home.php");
}


if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$_SESSION['email-log'] = $email;
	$sql = "SELECT * FROM users WHERE email='$email' AND pass='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: home.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form - Fantasy WC 2022</title>
</head>
<body style="justify-content: right; background-size: contain; background-position: left; background-repeat: no-repeat; background-color: #260303;">
	<div class="container" style="background: rgb(255, 255, 255); margin-right: 240px;">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800; color: #580909;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn" style= "background: #580909;">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php" style="color: #580909;">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>