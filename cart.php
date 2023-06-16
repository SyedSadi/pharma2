<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shoppin cart</title>
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" type="text/css" href="medicine.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="cart.css">

</head>

<body>
    <?php
    include "middleware.php";
    include "navbar.php";
    if (!isset($_SESSION['id'])) {
        header("location:login.php");
    }


    ?>

    <?php



    $user_ID = $_SESSION["id"];

    if (isset($_POST['update_cart'])) {
        $update_quantity = $_POST['cart_quantity'];
        $update_id = $_POST['cart_id'];
        mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
        $message[] = 'cart quantity updated successfully!';
    }

    if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
        header('location:cart.php');
    }

    if (isset($_GET['delete_all'])) {
        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_ID'") or die('query failed');
        header('location:cart.php');
    }


    ?>



    <div class="shopping-cart">

        <h1 class="heading">shopping cart</h1>

        <table>
            <thead>
                <th>image</th>
                <th>name</th>
                <th>price</th>
                <th>quantity</th>
                <th>total price</th>
                <th>action</th>
            </thead>
            <tbody>
                <?php
                $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_ID'") or die('query failed');
                $grand_total = 0;
                if (mysqli_num_rows($cart_query) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                ?>
                        <tr class="table-row">
                            <td><img src="<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                            <td><?php echo $fetch_cart['name']; ?></td>

                            <td><?php echo $fetch_cart['price']; ?>tk</td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                    <input type="number" min="1" name="cart_quantity" class="quantity-input" value="<?php echo $fetch_cart['quantity']; ?>">
                                    <input type="submit" name="update_cart" value="update" class="option-btn">
                                </form>
                            </td>
                            <td><?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>tk</td>
                            <td><a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn">remove</a></td>
                        </tr>
                <?php
                        $grand_total += $sub_total;
                    }
                } else {
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                }
                ?>
                <tr class="table-bottom">
                    <td colspan="4" class="total">grand total :</td>
                    <td><?php echo $grand_total; ?>tk</td>
                    <td><a href="cart.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a></td>
                </tr>
            </tbody>
        </table>

        <div class="cart-btn">
            <a href="#" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
        </div>

    </div>

    </div>



</body>

</html>