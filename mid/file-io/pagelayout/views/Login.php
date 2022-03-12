<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <style type="text/css">
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php include 'include_require/header.php'; ?>
    <?php require 'Navbar.php'; ?>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        header("location:Dashboard.php");
    }
    ?>

    <?php
    $nameErr = $passErr = "";
    $username = $pass = "";
    if (isset($_POST["submit"])) 
    {

        if (empty($_POST["username"])) 
        {
            $nameErr = "Name is required";
        } 
        else if (empty($_POST["password"])) 
        {
            $passErr = "pass is required";
        } 
        else 
        {
            $username = $_POST['username'];
            $file_data = file_get_contents("../model/Data.json");
            $file_data = json_decode($file_data, true);
            foreach ($file_data as $data) 
            {
                if ($data['username'] === $_POST['username'] and $data['password'] === $_POST['password']) 
                {
                    $_SESSION['username'] = $username;
                    header("location:Dashboard.php");

                    if (!empty($_POST['remember']))
                    {
                        setcookie("uname", $_POST['username'], time() + 10);
                        setcookie("pass", $_POST['password'], time() + 10);
                        $_SESSION['username'] = $username;
                    } 
                    else 
                    {
                        setcookie("uname", "");
                        setcookie("pass", "");
                        echo "Cookie not set";
                    }
                }
            }
        }
    }
    ?>
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
        <fieldset>
            <legend>LOGIN</legend>
            User Name: <input type="text" name="username" value="<?php if (isset($_COOKIE['uname'])) {
                                                                        echo $_COOKIE['uname'];
                                                                    } ?>">
            <span class="error">* <?php echo $nameErr ?></span>
            <br><br>
            Password: <input type="password" name="password" value="<?php if (isset($_COOKIE['pass'])) {
                                                                        echo $_COOKIE['pass'];
                                                                    } ?>">
            <span class="error">* <?php echo $passErr; ?></span>
            <br><br>
            <input type="checkbox" name="remember"> Remember me
            <br><br>
            <input type="submit" name="submit" value="Login">
            <!-- <a href="Forgot_password.php">Forgot Password?</a> -->
        </fieldset>
    </form>


    <?php include 'include_require/footer.php'; ?>
</body>

</html>