<?php 

	include '../Include/DB.php';
	
	//error_reporting(0);
	
	session_start();

// if (isset($_SESSION['Email'])) {
    // header("Location: donar-dashboard.php");
// }

if (isset($_POST['signin'])) {

	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM seller WHERE Email='$email' AND Password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		
        

		$_SESSION['Identity'] = $row['Identity'];
		$_SESSION['Email'] = $row['Email'];
		$_SESSION['Username'] = $row['Username'];
		$_SESSION['Logged'] = 'true';
		$_SESSION['Time'] = time();
        
		
		header("Location: ../seller.php?username={$_SESSION['Username']}&identity={$_SESSION['Identity']}");
		//header("Location: donar-dashboard.php");
	}
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Just Bid It!</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
  
    <link rel="stylesheet" href="../css/style.css">
    <!-- Custom css -->
    <link rel="stylesheet" type="text/css" href="../css/custom.css">
    <script src="https://kit.fontawesome.com/744d788fd4.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../images/Mobile-login.jpg" alt="sing up image"></figure>
                        <a href="../Registration/Seller.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Just Bid It!</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" >
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" >
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" >
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" >
                                <a href="Bidder.php" style="margin-left: 2px;">Not a Seller</a>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>