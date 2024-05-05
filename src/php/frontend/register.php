<?php
    include_once 'header.php';
?>

<div class="container">
    <div class="logo2">OASIS</div>
    <form class="register-form" action="includes/register.inc.php" method="POST">
        <h1 class="login">Register</h1><br>
        <div class="form-group">
            <input type="text" name="name" placeholder="name">
            <input type="text" name="NIC" placeholder="NIC">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwdrepeat" placeholder="Confirm Password">
        </div>
        <div class="form-links">
            <p>Already have an acount?   <a href="login.php">Login</a></p>
        </div>
        <button type="menu">Home</button>
        <button type="submit" name="submit">Register</button>    
    </form>
</div>

<?php
    include_once 'footer.php';
    ?>