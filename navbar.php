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
                <li><a href="profile.php"><?php echo $user["username"]; ?></a></li>
                <li><a href="logout.php">Lougout</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>

            <?php } ?>

            <li><a href="cart.php"> <i class="fa-solid fa-cart-shopping"></i></a></li>




        </ul>

    </div>

</nav>