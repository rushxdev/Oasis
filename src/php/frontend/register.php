<!DOCTYPE html>
<html>

<head>
    <title>Oasis</title>
    <!-- Link to CSS files -->
    <link rel="stylesheet" href="../../css/header_footer.css" />
    <link rel="stylesheet" href="../../css/login.css" />
</head>

<body>
<!-- Including header -->
    <?php include_once ("header.php"); ?>
    <div class="container">
    <!-- Oasis logo and welcome message -->
        <div class="logo2">OASIS</div>
        <div class="logo3">Welcome to our online customer support service</div>
        <!-- Registration form -->
        <form id="register_form" class="register-form" action="../backend/register.inc.php" method="POST">
            <h1 class="login">Register</h1><br>
            <div class="form-group">
            <!-- Input fields for registration information -->
                <input type="text" name="name" placeholder="Name" required>
                <input type="text" name="nic" placeholder="NIC" maxlength="12" minlength="11" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="username" placeholder="Username" required>
                <input type="number" name="age" placeholder="Age" min="16" max="100" required>
                <select name="gender" id="gender">
                <!-- Dropdown for selecting gender -->
                    <option value="">Please Select Your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <textarea name="address" placeholder="Address" required></textarea>
                <input type="text" name="contact" pattern="[0-9]{10}" title="Mobile number cannot contain letters" placeholder="Contact" maxlength="10" minlength="10" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="password_repeat" placeholder="Confirm Password" required>

            </div>
            <div class="form-links"> <!-- Link to login page for existing users -->
                <p>Already have an acount? <a href="login.php">Login</a></p>
            </div>
            <!-- Home button and registration submission button -->
            <button type="menu">Home</button>
            <button type="submit" name="submit">Register</button>
        </form>
    </div>
    <!-- Including footer -->
    <?php include_once 'footer.php' ?>
     <!-- JavaScript to validate gender selection -->
    <script>
        document.getElementById("register_form").addEventListener("submit", function (event) {
            var selectedOption = document.getElementById("gender").value;
            if (selectedOption === "") {
                event.preventDefault(); // Prevent form submission
                alert("Please select your gender before submitting.");
            }
        });
    </script>
</body>

</html>