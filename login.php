<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <title>Responsive Login and Registration Form</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php
    include "middleware.php";
    if ($authenticated) {
        header("location: main.php");
    }
    $login_error_message = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "select * from user where email = '$email' and password = '$password'";
        $result = getQuery($conn, $sql);
        $dataLen = count($result);
        if ($dataLen == 1) {
            $result = $result[0];
            $_SESSION["authenticated"] = true;
            $_SESSION["id"] = $result["id"];
            header("location: main.php");
        } else {
            $_SESSION["authenticated"] = false;
            $login_error_message = "Please correct email and password";
        }
    }

    dbClose($conn);
    ?>

    <section>
        <div class="container">
            <div class="user signinBox">
                <div class="imgBox">
                    <img src="image/medi1.jpg" alt="">
                </div>
                <div class="formBox">
                    <form action="login.php" method="POST">
                        <h2>Sign In</h2>
                        <input type="email" name="email" placeholder="email"> <input type="password" name="password" placeholder="Password">
                        <button type="submit">Login</button>
                        <p><?php echo $login_error_message; ?></p>
                        <p class="signup">Don't have an account? <a href="register.php">Sign Up.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>