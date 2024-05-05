<!DOCTYPE html>
<html>

<head>
    <title>Oasis</title>
    <link rel="stylesheet" href="../../css/header_footer.css" />
    <link rel="stylesheet"href="../../css/login.css" />
</head>

<body>
    <?php include_once ("header.php"); ?>
    <div class="container">
        <div class="logo1">OASIS</div>
        <form class="login-form" action="../backend/login.inc.php" method="POST">
            <h1 class="login">LOGIN</h1><br>
            <div class="form-group">
                <input type="text" name="username" placeholder="Email or Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password">
            </div>
            <div class="form-links">
                <a href="#">Forgot Password?</a><br>
                <p>New to page?<a href="register.php">Register</a></p>
            </div>
            <button name="submit" type="submit">Login</button>
        </form>
    </div>
    <?php include_once 'footer.php' ?>
</body>

</html>