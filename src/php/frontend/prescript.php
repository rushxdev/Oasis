<!DOCTYPE HTML>
<html>

<head>
    <title>
        Prescription Refill
    </title>
    <link rel="stylesheet" href="prescriptstyle.css">
</head>

<body>
    <div class="navbar">
        <div class="logo"><a href="index.php">OASIS</a></div>
        <div class="nav-items">
            <a href="index.php" class="active">Home</a>
            <a href="#">About Us</a>
            <a href="#">Branch Locator</a>
            <a href="#">Health Blog</a>
            <a href="#">Contact Us</a>
        </div>
        <div class="accounts">
        </div>
    </div>
    <div class="header">
        <h1>Prescription Refill Requests</h1>
    </div>
    <div>
        <form method="post" action="prescript_form.php">
            <label for="reg_number">Registered Number:</label>
            <input type="number" id="reg_number" name="reg_number" required>
            <br><br>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <br><br>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" required>
            <br><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <br><br>

            <label for="address">Home Address:</label>
            <input type="text" id="address" name="address" required>
            <br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br><br>

            <label for="contact_number">Contact Number:</label>
            <input type="tel" id="contact_number" name="contact_number" required>
            <br><br>

            <label for="speciality">Speciality:</label>
            <select type="text" id="speciality" name="speciality" required>

            </select>
            <br><br>

            <label for="doctor">Doctor:</label>
            <select type="text" id="doctor" name="doctor" required>
                <option value="doctor1">Amal</option>
                <option value="doctor2">Kamal</option>
                <option value="doctor3">Nimal</option>
                <option value="doctor4">Sunimal</option>
                <option value="doctor5">Sunil</option>
            </select>
            <br><br>

            <label for="branch">Collecting Branch:</label>
            <select id="branch" name="branch" required>
                <option value="branch1">Colombo</option>
                <option value="branch2">Kandy</option>
                <option value="branch3">Galle</option>
                <option value="branch3">Kurunegala</option>
                <option value="branch3">Jaffna</option>
            </select>
            <br><br>

            <input type="submit" value="Submit">

        </form>
    </div>
    <br>
    <footer class="footer">
        <p>&copy; 2024 Oasis Medical Center. All rights reserved.</p>
    </footer>
</body>

</html>