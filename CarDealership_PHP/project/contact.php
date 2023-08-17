    <?php include 'sendemail.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="shortcut icon" type="image/png" href="bwm1.png">
</head>
<body>
  
    <!--alert poruka poslata-->
    <?php echo $alert; ?>
    <!--alert message end-->
        <div class="contact-section">
            <div class="contact-info">
                <div><i class="fas fa-map-marker-alt"></i>Belgrade,Belgrade,Serbia</div>
                <div><i class="fas fa-envelope"></i>dejanbojkovic1999@gmail.com</div>
                <div><i class="fas fa-phone"></i>+381691781524</div>
                <div><i class="fas fa-clock"></i>24/7</div>
            </div>
            <div class="contact-form">
                <h2>Contact Us</h2>
                <form class="contact" action="" method="POST">
                    <input type="text" name="name" class="text-box" placeholder="Your Name" required>
                    <input type="email" name="email" class="text-box" placeholder="Your Email" required>
                
                    <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
                    <input type="submit" name="submit" class="send-btn" value="Send">
                </form>
            </div>
        </div>
    
    <script type="text/javascript">
        if(window.history.replaceState){
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    <footer>
        <div class="footer-content">
            <h3>Ask us everything</h3>
            <p>If you have any question feel free to contact us on social media</p>
        <ul class="socials">
            <li><a href="https://www.facebook.com/dejan.bojkovic.5891/">Dejan-fb</a></li>
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
