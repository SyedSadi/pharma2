<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Medeasy</title>
    <link rel="stylesheet" href="sliderc.css">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="sliderj.js" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />






</head>

<body>
    <?php
    include "middleware.php";
    ?>

    <nav class="navbar">

        <div class="left">

            <h1>Medeasy</h1>

        </div>

        <div class="right">

            <input type="checkbox" id="check">

            <label for="check" class="checkBtn">

                <i class="fa fa-bars"></i>

            </label>

            <ul class="list">

                <li><a href="main.php">Home</a></li>

                <li><a href="medicine.php">Medicines</a></li>

                <li><a href="doctor.php">Doctors</a></li>


                <li><a href="#">About Us</a></li>



                <?php if ($authenticated) { ?>
                    <li><a href="profile.php"> Hi,<?php echo $user["username"]; ?>!</a></li>
                    <li><a href="logout.php">Lougout</a></li>
                <?php } else { ?>
                    <li><a href="login.php">Login</a></li>

                <?php } ?>

                <li><a href="cart.php"> <i class="fa-solid fa-cart-shopping"></i></a></li>




            </ul>

        </div>

    </nav>
    <section class="first">
        <div class="container">

            <div class="write">



                <div class="write1">
                    <h2>
                        Your convenient and trusted source for <br>
                        affordable
                        medications.

                    </h2>
                </div>

                <div class="write2">
                    <p>Online purchase </p>
                    <div class="circle">

                    </div>
                    <p>
                        Free delivery
                    </p>
                </div>
                <div class="write3">

                    <a href="medicine.php"> Search medicine</a>

                    <div class="circle">

                    </div>
                    <a href="doctor.php" class="do">Doctor's consultation</a>
                </div>
            </div>

            <div class="image">
                <img src="image/Pharmacist-bro.svg" alt="" \>

            </div>
        </div>
    </section>

    <section class="slider">
        <div class="heading">
            <h1>OTP Medicines</h1>
        </div>

        <div class="wrapper">
            <i id="left" class="fa-solid fa-angle-left"></i>
            <ul class="carousel">
                <li class="card">
                    <a href="medicine.php?category=eczema">
                        <div class="img"><img src="image/eczema.jpg" alt="img" draggable="false"></div>

                        <span>Eczema</span>
                    </a>
                </li>
                <li class="card">
                    <a href="medicine.php?category=fever">
                        <div class="img"><img src="image/fever.jpg" alt="img" draggable="false"></div>

                        <span>Fever</span>
                    </a>

                </li>
                <li class="card">
                    <a href="medicine.php?category=headache">
                        <div class="img"><img src="image/headache.jpg" alt="img" draggable="false"></div>

                        <span>Headache</span>
                    </a>

                </li>
                <li class="card">
                    <a href="medicine.php?category=nasal">
                        <div class="img"><img src="image/nasal.jpg" alt="img" draggable="false"></div>

                        <span>Nasal</span>
                    </a>

                </li>
                <li class="card">
                    <a href="medicine.php?category=vitamin">
                        <div class="img"><img src="image/vitamins.jpg" alt="img" draggable="false"></div>

                        <span>Vitamins</span>

                    </a>

                </li>
                <li class="card">
                    <a href="medicine.php?category=gastric">
                        <div class="img"><img src="image/gastric.webp" alt="img" draggable="false"></div>

                        <span>Gastric</span>
                    </a>

                </li>
            </ul>
            <i id="right" class="fa-solid fa-angle-right"></i>
        </div>



    </section>



    <div class="section-service">
        <div class="heading">
            <h3> What do you need?</h3>
        </div>

        <div class="card-holder">
            <div class="card">
                <img src="image/medi.jpg" alt="Card 1">
                <div class="card-content">

                    <p>Our company offers all customers prescription drugs at the best prices</p>
                </div>
            </div>

            <div class="card">
                <img src="image/delivery.jpg" alt="Card 2">
                <div class="card-content">

                    <p> We will deliver your goods to your door or to the nearby locations desired by you</p>
                </div>
            </div>

            <div class="card">
                <img src="image/consul.jpg" alt="Card 3">
                <div class="card-content">


                    <p> We may provide you with the place for your regular health checkup</p>
                </div>
            </div>

            <div class="card">
                <img src="image/bloodp.jpg" alt="Card 4">
                <div class="card-content">

                    <p> Our pharmacists will help you with measuring your blood pressure. </p>
                </div>
            </div>
        </div>


    </div>




    <div class="footcontainer">
        <footer class="last">
            <div class="about">
                <h2>
                    Medeasy
                </h2>

                <p> medeasy provides the best pharmacy solution online. We are focused on getting you the healthcare support & help you need so that you can enjoy your best health. Find your required medications at medeasy</p>

            </div>


            <div class="aboutus">
                <ul class="aboutuslist">

                    <li>
                        <h3> Our Company</h3>
                    </li>

                    <li><a href="#">Terms and Conditions</a></li>

                    <li><a href="#">Refund and Return Policy</a></li>

                    <li><a href="#"> Privacy Policy</a></li>








                </ul>

            </div>
            <div class="contact">
                <h3>Get in touch</h3>
                <p>Questions or feedback?</p>
                <p>We'd like to hear from you</p>
            </div>


        </footer>


    </div>

</body>

</html>