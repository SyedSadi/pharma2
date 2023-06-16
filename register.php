<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=">
    <title>Responsive Login and Registration Form</title>
    <link rel="stylesheet" href="css/register.css">
</head>

<body>
    <?php
    include "middleware.php";
    include "validation.php";
    if ($authenticated) {
        header("location: profile.php");
    }
    $username = "";
    $email = "";
    $password = "";
    $confirm_password = "";
    $error_message = null;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];

        if (!empty($username) && !empty($password) && !empty($confirm_password) && !empty($email)) {
            if ($password != $confirm_password) {
                $error_message = "Password not match";
            } else if (isEmailExist($conn, $email)) {
                $error_message = "Email already exist";
            } else {
                $sql = "INSERT INTO user (username, email, password) values ('$username', '$email', '$password')";
                $result = insertQuery($conn, $sql);
                if ($result) {
                    $_SESSION["authenticated"] = true;
                    $_SESSION["id"] = $result;
                    header("location: main.php");
                } else {
                    $_SESSION["authenticated"] = false;
                    $error_message = "error";
                }
            }
        } else {
            $error_message = "Please enter some valid information";
        }
    }

    dbClose($conn);
    ?>

    <section>
        <div class="container">
            <div class="user signinBox">
                <div class="formBox">
                    <form action="register.php" method="POST">
                        <h2>Create an account</h2>
                        <input type="text" name="username" placeholder="Username">
                        <input type="email" name="email" placeholder="Email">
                        <input type="password" name="password" placeholder="Create Password">
                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                        <label><?php echo $error_message ?></label>
                        <button type="submit">Sign Up</button>
                        <p class="signup">Already have an account? <a href="login.php">Sign In.</a></p>
                    </form>
                </div>

                <div class="imgBox">
                    <img src="image/medi2.jpg" alt="">
                </div>
            </div>
        </div>
    </section>
</body>

</html>