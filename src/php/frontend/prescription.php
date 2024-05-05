<?php
session_start();
include_once ("../backend/config.php");

$doctor_query = "Select doctor_name, doctor_specialty from doctors;";
$special_query = "select distinct doctor_specialty from doctors;";

$doctors_result = $conn->query($doctor_query);
$specialties_result = $conn->query($special_query);

$doctors = array();
if ($doctors_result->num_rows > 0) {
    while ($row = $doctors_result->fetch_assoc()) {
        $doctor_row = $row['doctor_name'] . " - " . $row['doctor_specialty'];
        $doctors[] = $doctor_row;
    }
}

$specialties = array();
if ($specialties_result->num_rows > 0) {
    while ($row = $specialties_result->fetch_assoc()) {
        $specialties[] = $row['doctor_specialty'];
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>
        Prescription Refill
    </title>
    <link rel="stylesheet" href="../../css/prescriptstyle.css">
    <link rel="stylesheet" href="../../css/header_footer.css" />
</head>

<body>
    <?php include_once ("header.php"); ?>
    <div class="header">
        <h1>Prescription Refill Requests</h1>
    </div>
    <div>
        <form method="post" action="../backend/prescript_form.php">
            <label for="speciality">Speciality:</label>
            <select type="text" id="speciality" name="speciality" required>
                <?php
                foreach ($specialties as $specialty) {
                    echo "<option value='" . $specialty . "'>" . $specialty . "</option>";
                }
                ?>
            </select>
            <br><br>

            <label for="doctor">Doctor:</label>
            <select type="text" id="doctor" name="doctor" required>
                <?php
                foreach ($doctors as $doctor) {
                    $doctor_parts = explode(" - ", $doctor);
                    $doctor_name = $doctor_parts[0];
                    echo "<option value='" . $doctor . "'>" . $doctor_name . "</option>";
                }
                ?>
            </select>
            <br><br>

            <label for="branch">Collecting Branch:</label>
            <select id="branch" name="branch" required>
                <option value="Colombo">Colombo</option>
                <option value="Kandy">Kandy</option>
                <option value="Galle">Galle</option>
                <option value="Kurunegala">Kurunegala</option>
                <option value="Jaffna">Jaffna</option>
            </select>
            <br><br>

            <label for="need_before">Need Before: </label>
            <input type="date" id="need_before" value="" name="need_before" min="<?php echo date('Y-m-d'); ?>">

            <input type="submit" value="Submit">

        </form>
    </div>
    <br>
    <?php include_once ("footer.php"); ?>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const errorParam = urlParams.get('error');

        if (errorParam === 'submissionFailed') {
            alert('Prescription submission failed. Please try again.');

            urlParams.delete('error');

            history.replaceState(null, '', window.location.pathname + '?' + urlParams.toString());
        }

        document.getElementById('speciality').addEventListener('change', function () {
            var specialty = this.value;
            var doctors = document.getElementById('doctor').getElementsByTagName('option');
            var firstVisibleDoctor = null;
            for (var i = 0; i < doctors.length; i++) {
                var doctorSpecialty = doctors[i].value.split(' - ')[1];
                if (doctorSpecialty === specialty) {
                    doctors[i].style.display = 'block';
                    if (!firstVisibleDoctor) {
                        firstVisibleDoctor = doctors[i];
                    }
                } else {
                    doctors[i].style.display = 'none';
                }
            }
            if (firstVisibleDoctor) {
                firstVisibleDoctor.selected = true;
            }
        });
    </script>
</body>

</html>