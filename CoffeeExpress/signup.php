<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>SignUp coffeeexpress</title>
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
        <a href="#home">home</a>
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
    <form method="post" action="signUp.php">
      <!-- center image -->
      <div class="center" style="padding-top:3%">
        <img src="images/login.png" alt="login" class="img-center" width="300" height="200">
      </div>
      <!-- Input  -->
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
        <label for="phone"><b>Phone</b></label>
        <input type="text" placeholder="Enter Phone" name="phone" required>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
        <button type="submit" name="signUp">Sign Up</button>
        <button type="button" class="login" style="margin-top: 2%;" onclick="window.location='login.php'">Login</button>
      </div>
    </form>
  </div>
</body>
<?php 
    $con = mysqli_connect("localhost","root","","coffeeexpress");
    if(isset($_POST['signUp'])){
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $psw = $_POST['psw'];
        $psw_repeat = $_POST['psw-repeat'];
        if($psw == $psw_repeat){
            $query = "INSERT INTO `User`(`Uname`, `Email`, `Phone`, `Password`,`Utype`) VALUES ('$uname','$email','$phone','$psw','customer')";
            $query_run = mysqli_query($con,$query);
            if($query_run){
                echo '<script type="text/javascript"> alert("User Registered") </script>';
            }
            else{
                echo '<script type="text/javascript"> alert("Error") </script>';
            }
        }
        else{
            echo '<script type="text/javascript"> alert("Password and Confirm Password does not match") </script>';
        }
    }
?>
    
</html>