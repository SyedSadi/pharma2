<!DOCTYPE html>
<html>

<head>
    <title>Online Pharmacy - Shop</title>
    <link rel="stylesheet" type="text/css" href="medicine.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>

    <?php
    include "middleware.php";
    $category = "";

    if (isset($_SESSION['id'])) {
        $user_ID = $_SESSION["id"];
    }





    if (isset($_GET["category"])) {
        $category = $_GET["category"];
    }
    $name = "";
    if (isset($_GET["name"])) {
        $name = $_GET["name"];
    }
    $all = getQuery($conn, "select * from product where description like '%$name%' and category like  '%$category%'");


    if (isset($_POST["Add_to_cart"])) {

        if (!isset($_SESSION['id'])) {
            header("location:login.php");
        }


        $product_name = $_POST["product_name"];
        $product_price = $_POST["product_price"];
        $product_image = $_POST["product_image"];
        $product_quantity = $_POST["quantity"];

        $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name='$product_name'
            AND user_id = '$user_ID'") or die('query failed');

        if (mysqli_num_rows($select_cart) > 0) {
            $message[] = "product already added to cart!";
        } else {
            mysqli_query($conn, "INSERT INTO `cart`(user_id,name,price,image,quantity)VALUES
        ('$user_ID','$product_name','$product_price','$product_image','$product_quantity')") or die('query failed');
            $message[] = "product added to cart!";
        }
    }

    ?>


    <?php
    include "navbar.php";
    ?>

    <div class="banner">
        <div class="head">

        </div>

        <div class="search-bar">
            <form id=action="medicine.php" method="GET">
                <input type="text" placeholder="Search for medicine" name="name">
                <button class="search-btn">Search</button>
            </form>

        </div>
    </div>


    <div class="category">

        <?php

        foreach ($all as $item) {
        ?>
            <div class="card">

                <div class="card-image">
                    <img src="<?php echo $item["picture"]; ?>" alt="Medicine 1">
                </div>

                <div class="card-content">
                    <h3><?php echo $item["description"]; ?></h3>
                    <P class="brand"> <?php echo $item["brand_name"]; ?> </P>

                    <p class="price"><?php echo $item["price"]; ?> tk </p>
                    <form method="POST" action="">
                        <input type="hidden" name="product_name" value="<?php echo  $item["description"]; ?>">
                        <input type="hidden" name="product_price" value="<?php echo  $item["price"]; ?>">
                        <input type="hidden" name="product_image" value="<?php echo  $item["picture"]; ?>">

                        <div class="cart-action"><input type="number" min="1" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" name="Add_to_cart" class="btnAddAction" /></div>
                    </form>
                </div>

            </div>

        <?php
        }
        ?>




        <!-- Add more medicine cards here -->
    </div>







    <script src="medicine.js"></script>
</body>

</html>