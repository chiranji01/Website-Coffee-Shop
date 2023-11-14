<?php session_start() ?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Coffee Express login</title>
	<link rel="stylesheet" type="text/css" href="login.css" />
	<link rel="stylesheet" href="style.css">
</head>
<style>
	.center {
		width: 300px;
		margin-left: auto;
		margin-right: auto;
	}

	.container {

		width: 50%;
		/* margin: 2% 40%; */
		/* center align */
		margin-left: auto;
		margin-right: auto;


	}
</style>

<body>
	<!--header section starts-->
	<header class="header">
		<section class="flex">
			<a href="#home" class="logo"><img src="Images/logo.png" alt=""></a>
			<nav class="navbar">
				<a href="Home.php">home</a>
				<a href="login.php">login</a>
				<a href="#about">about</a>
				<a href="#menu">menu</a>
				<a href="#gallery">gallery</a>
				<a href="#contact">contact</a>
			</nav>
			<div id="menu-btn" class="fas fa-bars"></div>
		</section>
	</header>

<div>
		<form method="post" action="login.php">
			<!-- center image -->
			<div class="center" style="padding-top:3%">
				<img src="images/login.png" alt="login" class="img-center" width="300" height="200">
			</div>
			<!-- Input  -->
			<div class="container">
				<label for="uname"><b>Username</b></label>
				<input type="text" placeholder="Enter Username" name="uname" required>
				<label for="psw"><b>Password</b></label>
				<input type="password" placeholder="Enter Password" name="psw" required>
				<button type="submit" name="login">Login
				
				</button>
				
			  <button type="button" class="signUp" style="margin-top: 2%;" onclick="window.location='signup.php'">Sign Up</button>
			</div>

		</form>
	</div>
	<!--footer section starts-->

	<section class="footer">
		<div class="box-container">
			<div class="box">
				<i class="fas fa-envelope"></i>
				<h3>our email</h3>
				<p>coffeeexpress@gmail.com</p>
			</div>
			<div class="box">
				<i class="fas fa-clock"></i>
				<h3>opening hours</h3>
				<p>07:00am to 09:00pm</p>
			</div>
			<div class="box">
				<i class="fas fa-map-marker-alt"></i>
				<h3>location</h3>
				<p>colombo 3, sri lanka</p>
			</div>
			<div class="box">
				<i class="fas fa-phone"></i>
				<h3>our number</h3>
				<p>+11 245 8925</p>
				<p>+11 100 8342</p>
			</div>
		</div>
		<div class="credit"> &copy; copyright @ 2022 by <span>web designer</span>|all rights reserved! </div>
	</section>
	<!--footer section ends-->
</body>
<?php
if (isset($_POST['login'])) {
	$uname = $_POST['uname'];
	$psw = $_POST['psw'];
	$connection = mysqli_connect("localhost", "root", "", "coffeeexpress");
	$query = "SELECT * FROM User WHERE Uname='$uname' AND Password='$psw'";
	$result = mysqli_query($connection, $query);
	if (mysqli_num_rows($result) > 0) {
		//check the user type
		$row = mysqli_fetch_assoc($result);
		$type = $row['Utype'];
		if ($type == 'admin') {
			$_SESSION['admin'] = $uname;
			header("Location: admin.php");
		} else {
			$_SESSION['user'] = $uname;
			header("Location: customer.php");
		}
	} else {
		echo "<script>alert('Invalid username or password')</script>";
	}
}
?>
	

</html>