<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['uname'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$country = $_POST['country'];
	$phoneno = $_POST['phoneno'];
	$password = $_POST['password'];
	$cpassword = $_POST['cpassword'];
	$_SESSION['uname']= $_POST['username'];

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, gender, country, phoneno, pass,status)
					VALUES ('$username', '$email', '$gender', '$country', '$phoneno', '$password','unsubmitted')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				header('location: index.php');
				
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title>Register Form - Fantasy WC 2022</title>
</head>
<body style="justify-content: right; background-size: contain; background-position: left; background-repeat: no-repeat; background-color: #260303;">
	<div class="container" style="background: rgb(255, 255, 255); margin-right: 240px;">
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800; color: #580909;font-family:'myFirstFont'">Register</p>
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
			<select name="gender" id="gender" style="font-size: 15px; width: 100%; height: 100%;border: 2px solid #e7e7e7;padding: 10px 20px; border-radius: 30px;background: transparent;outline: none;transition: .3s;">
			      <option value="" disabled selected hidden>Choose Your Gender</option>
						<option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
        </select>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Country" name="country" value="<?php echo $country; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Phone no." name="phoneno" value="<?php echo $phoneno; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn" style="background: #580909 ;font-family:'myFirstFont'">Register </button>
			</div>
			<p class="login-register-text">Already Have an account? <a href="index.php" style="color: #580909">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>