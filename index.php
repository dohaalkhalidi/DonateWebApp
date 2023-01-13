<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/scripts.js" defer></script>

    <title>Donate</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="#home">

                        HOME
                    </a>
                </li>
                <li>
                    <a href="#welcome">

                        SERVICES
                    </a>
                </li>
                <li><a href="#welcome">

                        WHAT WE DO
                    </a>
                </li>
                <li><a href="#welcome">

                        CONTACT
                    </a>
                </li>
                <li><a href="#welcome">

                        DONATE
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Hero -->
    <section class="hero" >
        
        <img id="home" src="./assets/donate for you.png" alt="">
        <!-- <div class="text">
            <h1>Donate for <br> <span>You</span></h1>
        </div> -->
    </section>
    <!-- /Hero -->

    <!-- Welcome -->
    <section class="welcome" id="welcome">
        <div class="text">

            <div class="heading">
                <h1>WELCOME...</h1>
                <h2>ABOUT US</h2>
            </div>
            <div class="paragraph">
                <p>
                    Welcome to our site <br>
                    Through this site, you can reach your donations to every poor person around the world
                    You can see our work and projects on our page
                    We share everything with you to be worthy of your trust and love
                    Thank you for visiting our site
                    We hope to be your trust
                </p>
            </div>
        </div>

        <form action="./payment proccessor/payment.php" method="POST">
        <div class="cards">
            <div class="card">
                <div class="card-title">
                    <h4>Who's giving today .... ?</h4>
                </div>
                <div class="card-body">
                    <div class="form">
                            <div class="form-group">
                                <div class="name">
                                    <input type="text" class="form-control" placeholder="FIRST NAME" name="fname" required>

                                    <input type="text" class="form-control" placeholder="LAST NAME" name="lname" required>
                                </div>

                                <div class="name">
                                    <input type="text" class="form-control" placeholder="COUNTRY" name="country" required>

                                    <input type="text" class="form-control" placeholder="CITY" name="city" required>
                                </div>

                                <div class="name">
                                    <input type="text" class="form-control" placeholder="IDENTITY NUMBER" name="id" required>

                                    <input type="email" name="email" placeholder="EMAIL ADDRESS..." name="email" required>
                                </div>
                                
                                <input type="text" class="form-control" id="big" name="regaddress" placeholder="REGISTERATION ADDRESS" requireds>
                            </div>
                    </div>
                </div>
                <div class="card-footer">
                    <H4>We’ll never share this
                        information with anyone.</H4>
                </div>
            </div>
            <div class="card">
                <div class="card-title">
                    <h4>Donate ... <br>
                        How match would you like to donate</h4>
                </div>
                <div class="card-body">
                    <div class="form">
                        <form>
                            <input type="hidden" id="amount" name="amount" >
                            <div class="amounts">
                                <a style="cursor: pointer;" onclick="document.querySelector('input#amount').value = 25" class="btn">25 TL</a>
                                <a style="cursor: pointer;" onclick="document.querySelector('input#amount').value = 50" class="btn">50 TL</a>
                                <a style="cursor: pointer;" onclick="document.querySelector('input#amount').value = 75" class="btn">75 TL</a>
                                <a style="cursor: pointer;" onclick="document.querySelector('input#amount').value = 100" class="btn">100 TL</a>
                                <a style="cursor: pointer;" onclick="document.querySelector('input#amount').value = 150" class="btn">150 TL</a>
                                <a style="cursor: pointer;" onclick="document.querySelector('input#amount').value = 200" class="btn">200 TL</a>
                            </div>
                            <div class="customPay">
                                <a id="custom" onclick="document.querySelector('input#custom').style.display=''; document.querySelector('a#custom').style.display='none'" class="btn">Custom Amount</a>
                                <input onchange="document.querySelector('input#amount').value = event.target.value" id="custom" class="btn"  style="display: none;">
                                <a onclick="document.querySelector('form').submit()" class="btn">Go To Pay</a>
                            </div>
                    </div>
                </div>
                <div class="card-footer">
                    <H4>We’ll never share this
                        information with anyone.</H4>
                </div>
            </div>
        </div>
        </form>

    </section>
    <!-- /Welcome -->

    <!-- Footer -->
    <footer>
        <div class="row">

            <div class="col">
                <ul>
                    <li>

                        <p>
                            Please contact us for information
                        </p>
                    </li>
                    <li>

                        <p>

                            (539) 588 70 22
                        </p>
                    </li>
                    <li>

                        <p>

                            (552) 373 04 91
                        </p>
                    </li>
                    <li>

                        <a href="mailto:dohakhaa@gmail.com">dohakhaa@gmail.com</a>
                    </li>
                </ul>
            </div>
            <div class="col">
                <ul>
                    <li>
                        <p>Quick Menu:</p>
                    </li>
                    <li>
                        <a href="#home">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#welcome">
                            Welcome
                        </a>
                    </li>
                    <li>
                        <a href="#welcome">
                            About Us
                        </a>
                    </li>
                    <li>
                        <a href="#welcome">
                            Who is giving today
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </footer>
</body>

</html>