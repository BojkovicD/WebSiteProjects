<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
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
			<h2>Member:</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['name']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
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