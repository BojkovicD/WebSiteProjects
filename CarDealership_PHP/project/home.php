<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link href="style2.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="shortcut icon" type="image/png" href="bwm1.png">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Membership</h1>
                <a href="store.php">Store</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
                
			</div>
		
		</nav>
		<div class="content">
			<h2>You are in!</h2>
			<p>Welcome back, <?=$_SESSION['name']?>!</p>
		</div>
	
	
        <footer>
            <div class="footer-content">
                <h3>Ask us everything</h3>
                <p>If you have any question feel free to contact us on social media</p>
            <ul class="socials">
                <li><a href="#">Dejan-fb</a></li>
                <li><a href="#">Dejan-ig</a></li>
                <li><a href="#">Dejan-tele </a></li>
            </ul>
            </div>
            <div class="footer-bottom">
                <p>copyright &copy;2021 codeOpacity. designed by <span>Dejan Bojkovic 4673</span></p>
            </div>
        </footer>
	</body>
</html>