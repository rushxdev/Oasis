<?php
session_start();
include_once ("../backend/config.php");

$sql = "SELECT * FROM prescription WHERE registered_number = " . $_SESSION["userid"];
$result = $conn->query($sql);

$appointment_query = "SELECT * FROM appointment WHERE user_id=" . $_SESSION["userid"];
$appointment_result = $conn->query($appointment_query);

?>
<!DOCTYPE html>
<html>

<head>
    <title>Oasis</title>
    <link rel="stylesheet" href="../../css/header_footer.css" />
    <link rel="stylesheet" href="../../css/profile.css" />
</head>

<body>
    <?php include_once ("header.php"); ?>
    <div class="grid-container">
        <div class="grid-item profile-left">
            <div>
                <img id="profile-image" src="../../image/profile.png" />
            </div>
            <div class="user-details">
                <div class="user-data">
                    Username: <?php echo $_SESSION["username"]; ?>
                </div>
                <div class="user-data">
                    Name: <?php echo $_SESSION["name"]; ?>
                </div>
                <div class="user-data">
                    Age: <?php echo $_SESSION["age"]; ?>
                </div>
                <div class="user-data">
                    Email: <?php echo $_SESSION["email"]; ?>
                </div>
                <div class="user-data">
                    NIC: <?php echo $_SESSION["nic"]; ?>
                </div>
                <div class="user-data">
                    Contact Number: <?php echo $_SESSION["contact"]; ?>
                </div>
            </div>
        </div>
        <div class="grid-item profile-right">
            <div id="prescription-table" class="table-div">
                <table class="profile-table">
                    <thead>
                        <tr>
                            <th>Prescription ID</th>
                            <th>Doctor</th>
                            <th>Specialty</th>
                            <th>Collection Date</th>
                            <th>Branch</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['prescription_id'] . "</td>";
                            echo "<td>" . $row['speciality'] . "</td>";
                            echo "<td>" . $row['doctor'] . "</td>";
                            echo "<td>" . $row['need_before'] . "</td>";
                            echo "<td>";
                            echo "<form action='../backend/edit_prescription.php' method='post'>";
                            echo "<input type='hidden' name='prescription_id' value='" . $row['prescription_id'] . "'>";
                            echo "<select id='branch' name='branch' required>";
                            echo "<option value='Colombo' " . ($row['branch'] == 'Colombo' ? 'selected' : '') . ">Colombo</option>";
                            echo "<option value='Kandy' " . ($row['branch'] == 'Kandy' ? 'selected' : '') . ">Kandy</option>";
                            echo "<option value='Galle' " . ($row['branch'] == 'Galle' ? 'selected' : '') . ">Galle</option>";
                            echo "<option value='Kurunegala' " . ($row['branch'] == 'Kurunegala' ? 'selected' : '') . ">Kurunegala</option>";
                            echo "<option value='Jaffna' " . ($row['branch'] == 'Jaffna' ? 'selected' : '') . ">Jaffna</option>";
                            echo "</select>";
                            echo "<button type='submit' class='edit' name='edit_prescription'>Edit</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "<td>";
                            echo "<form action='../backend/delete_prescription.php' method='post'>";
                            echo "<input type='hidden' name='prescription_id' value='" . $row['prescription_id'] . "'>";
                            echo "<button type='submit' class='delete' name='delete_prescription'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="appointment-table" class="table-div">

            </div>
        </div>
    </div>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const errorParam = urlParams.get('success');

        if (errorParam === 'true') {
            alert('Updated Successfully.');
            urlParams.delete('success');
        } else if (errorParam === 'deleted') {
            alert('Deleted Successfully.');
            urlParams.delete('success');
        }

        history.replaceState(null, '', window.location.pathname + '?' + urlParams.toString());
    </script>
    <?php include_once 'footer.php' ?>
</body>

</html>