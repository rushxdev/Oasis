<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Oasis</title>
    <link rel="stylesheet" href="../../css/header_footer.css" />
    <link rel="stylesheet" href="../../css/channeling.css" />
</head>

<body>
    <?php include_once ("header.php"); ?>
    <div class="channeling-container">
        <div class="left-panel">
            <h2>Channeling</h2>

            <form class="channeling-form" action="includes/channeling.inc.php" method="POST">
                <div class="CHform-group">
                    <div class="CHform-group">

                        <input type="hidden" name="userid" id="userid" value="<?php
                        echo $_SESSION["userid"];
                        ?>">
                    </div>
                    <label for="branch">Branch:</label>
                    <select name="branch" id="branch">
                        <option value="Colombo">Colombo</option>
                        <option value="Kandy">Kandy</option>
                        <option value="Galle">Galle</option>
                        <option value="Kurunegala">Kurunegala</option>
                        <option value="Jaffna">Jaffna</option>
                    </select>
                </div>
                <div class="CHform-group">
                    <label for="specialization">Specialization:</label>
                    <select name="specialization" id="specialization">
                        <option value="Cardiologist">Cardiologist</option>
                        <option value="Endocrinologist">Endocrinologist</option>
                        <option value="Gynaecologist">Gynaecologist</option>
                        <option value="Gastrologist">Gastrologist</option>
                        <option value="Nephrologist">Nephrologist</option>
                        <option value="Dentist">Dentist</option>
                        <option value="Diabetalogist">Diabetalogist</option>
                    </select>
                </div>
                <div class="CHform-group">
                    <label for="doctor">Doctor:</label>
                    <select name="doctor" id="doctor">
                        <option value="Amal">Amal</option>
                        <option value="Kamal">Kamal</option>
                        <option value="Nimal">Nimal</option>
                        <option value="Sapumal">Sapumal</option>
                        <option value="Animal">Animal</option>
                        <option value="Rathumal">Rathumal</option>
                        <option value="Sapaththumal">Sapaththumal</option>
                    </select>
                </div>
                <div class="CHform-group">
                    <label for="chaneldate">Date</label>
                    <input type="date" id="chaneldate" name="chaneldate" required>
                </div>
                <div class="CHform-group">
                    <label for="chaneltime">Time</label>
                    <input type="time" id="chaneltime" name="chaneltime" required>
                </div>
                <!-- </form> -->
        </div>
        <div class="vertical-line"></div>
        <div class="right-panel">
            <h2>Patient Details</h2>
            <!-- <form class="patient-form" action="includes/channeling.inc.php" method="POST"> -->
            <div class="CHform-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="fullname" required>
            </div>
            <div class="CHform-group">
                <label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div>
                <p></p>Gender:</p>
                <input type="radio" id="male" name="gender" value="Male">
                <label for="male">Male</label>
                <input type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label>
                <input type="radio" id="other" name="gender" value="other">
                <label for="other">Other</label> <br><br>
            </div>
            <div class="CHform-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="CHform-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div class="CHbtn">
                <button type="menu" name="menu">Cancel</button>
                <button type="submit" name="submit">Confirm</button>
            </div>
            </form>
        </div>
    </div>
    <?php include_once 'footer.php' ?>
</body>

</html>
