<?php
session_start();

include_once ("../backend/config.php");

// Check connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Check if session data is missing
$Specialized_field = $_SESSION['Specialized_field'] ?? '';
$drName = $_SESSION['drName'] ?? '';
$date = $_SESSION['date'] ?? '';
$time = $_SESSION['time'] ?? '';


if (isset($_POST['submit'])) {
    // Sanitize inputs
    $speciality = mysqli_real_escape_string($conn, $_POST["speciality"]);
    $drName = mysqli_real_escape_string($conn, $_POST["DoctorName"]);
    $age = mysqli_real_escape_string($conn, $_POST["age"]);
    $patient_name = mysqli_real_escape_string($conn, $_POST["patient_name"]);
    $status1 = mysqli_real_escape_string($conn, $_POST["status"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $medicalHistory = mysqli_real_escape_string($conn, $_POST["Describe"]);

    // File upload handling
    if (isset($_FILES['fileToUpload'])) {
        $fileName = $_FILES['fileToUpload']['name'];
        $fileTmpName = $_FILES['fileToUpload']['tmp_name'];
        $fileSize = $_FILES['fileToUpload']['size'];
        $fileError = $_FILES['fileToUpload']['error'];
        $fileType = $_FILES['fileToUpload']['type'];

        $target_dir = "C:\Users\acer\OneDrive - Sri Lanka Institute of Information Technology\IWT\Oasis\src\image";
        $target_file = $target_dir . basename($fileName);

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            exit;
        }

        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            exit;
        }

        // Check file type and size
        $fileExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed = array('pdf', 'doc', 'docx');


        if (in_array($fileExt, $allowed) && $fileError === 0 && $fileSize > 0) {

            //header("Location: ReservationSuccess.html");

            // Move uploaded file to destination
            if (move_uploaded_file($fileTmpName, $target_file)) {
                $Reg_no = $_SESSION["userid"];
                $username = $_SESSION["username"];

                // Insert data into database
                $query = "INSERT INTO booking (Reg_no, username, speciality, doctor_name, age, patient_name, status1, gender, medical_documents, medical_history) 
                VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("ssssssssss", $Reg_no, $username, $speciality, $drName, $age, $patient_name, $status1, $gender, $target_file, $medicalHistory);

                if ($stmt->execute()) {
                    // Redirect after successful submission

                    header("Location: ReservationSuccess.html");
                    exit;

                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "There was an error uploading your file.";
            }
        } else {
            echo "You cannot upload files of this type.";
        }

    }
}
// Close database connection
$conn->close();

?>

<html>

<head>
    <title>Consultation Information</title>
    <link rel="stylesheet" href="../../css/consult.css">
    <link rel="stylesheet" href="../../css/header_footer.css">
    <link rel="stylesheet" href="../../css/fa/css/font-awesome.min.css">

</head>

<body>
    <?php include_once("header.php"); ?>
    <br><br><br><br><br>
    <form action="consult.php" method="post" enctype="multipart/form-data">


        <h1>Consultation Information</h1>

        <div class="input-row">

            <div class="left-input">
                <label> SPECIALITY</label><br>
                <input type="text" name="speciality" id="Speciality" style="width:  250px; height: 30px;"
                    value="<?php echo $Specialized_field ?>"><br><br>


                <label>DOCTOR NAME</label><br>
                <input type="text" name="DoctorName" id="DrName" style="width: 250px; height: 30px;"
                    value="<?php echo $drName ?>"><br><br>

                <label>PATIENT NAME</label><br>
                <input type="text" name="patient_name" style="width:  250px; height: 30px;"><br><br>

                <label>AGE</label><br>
                <input type="text" name="age" style="width:  250px; height: 30px;"><br><br>

                <label for="Status">STATUS</label><br>

                <select id="Status" style="width:  250px; height: 30px;" name="status">
                    <option name="">Select</option>
                    <option value="Married">Married</option><br>
                    <option value="Unmarried">Unmarried</option><br>
                </select>
                <br>


                <br><br>

                <label>GENDER</label><br>
                <input type="radio" id="male" name="gender" value="male" required>Male<br>
                <input type="radio" id="female" name="gender" value="female">Female<br>
                <input type="radio" id="Other" name="gender" value="other">Other<br><br><br>



                <label>UPLOAD YOUR MEDICALS </label><br>
                <input type="file" id="fileToUpload" name="fileToUpload" class="input-box2">


                <br><br><br>





            </div>


            <div class="right-input">

                <br>
                <img src="../../image/Consulting2.png" width="300px" height="200px"><br><br><br>
                <input type="submit" value="Submit" id="submit" name="submit">


            </div>

        </div>

        <label>DESCRIBE YOUR MEDICAL HISTORY </label><br><br>
        <textarea id="address" name="Describe" id="Describe" rows="8" cols="65" required></textarea><br><br>
    </form>
    <br>
    <br>
    <br>

    <?php include_once ("footer.php"); ?>
    <script src="../../js/consult.js"></script>

</body>

</html>