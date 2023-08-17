<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" href="register.css">
    <link rel="shortcut icon" type="image/png" href="bwm1.png">
</head>
	<body>
	<header>
            <div class="wrapper">
                <div class="logo">
                    <img src="bmwlogo.png" alt="">
                    
                </div>
                <ul class="nav-area">
                    <li><a href="index.php">home</a></li>
                    <li><a href="About.php">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </header>
		<div class="register">
			<h1>Register</h1>
			<form action="registracija.php" method="post" autocomplete="off">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="email" name="email" placeholder="Email" id="email" required>
				<input type="submit" value="Register">
			</form>
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