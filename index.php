<html>

<head>
    <meta charset="utf-8">
    <title>MILITARYSHOP - Home</title>
    <meta name="viewport" content="width=device-width, inital=scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <div class="loader">
        <div></div>
    </div>
    <div class="content">
        <header>
            <a href="index.php"><img src="img/military.png" id="military"></a>
        </header>
        <section class="main-part">
            <video class="background-video" autoplay loop muted>
                <source src="img/test.mp4" type="video/mp4">
            </video>
            <img src="img/black.png" id="black"></img>
            <h2 id="text1">MilitaryShop</h2>
            <h3 id="text2">Let's begin your adventure!!</h3>
            <a href="register.php" id="button-reglog">Register</a>
            <a href="login.php" id="button-reglog">Log in</a>
        </section>

    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>About</h4>
                    <p>... is simple company that sells military equipment 😊</p>
                </div>
                <div class="footer-col">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-discord"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </footer>
    </div>
    <script>
        $(window).on('load', function() {
            $(".loader").fadeOut(1000);
            $(".content").fadeIn(1000);
        })
    </script>
    <a href="#"><img class="gototop" src="img/top_arrow.png" /></a>

</body>

</html>