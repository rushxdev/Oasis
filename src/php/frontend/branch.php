<?php include_once ("../backend/config.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Branch Locator</title>
    <link rel="stylesheet" href="../../css/branch.css">
    <link rel="stylesheet" href="../../css/header_footer.css" />
</head>

<body>
    <?php include_once ("header.php"); ?>
    <div class="blank">
        <div class="container">
            <div class="form-container">
                <div class="left-container">
                    <div class="turnOnGPS">
                        <h2>Turn On GPS</h2>
                        <!-- <button class="gpsBtn" onclick="toggleButton()"> GPS icon </button> -->
                        <!--<div class="box"> nothing</div>-->
                        <label class="switch">
                            <input type="checkbox" id="toggleButton">
                            <span class="slider"></span>
                        </label>
                        <span>&#128205;</span>
                    </div>
                    <div class="left-upper-map-container">
                        <div class="mapContainer">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.8622368359017!2d80.77180691467422!3d7.873054994290563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae45b886818f403%3A0x84b566be0c9e2f0!2sSri%20Lanka!5e0!3m2!1sen!2sus!4v1643458795197!5m2!1sen!2sus"
                                name="googlemap" height="100%" width="100%" title="googlemap"></iframe>
                        </div>
                    </div>
                    <div class="left-lower-btn-container">
                        <form method="post" action="">
                            <!-- Drop down button -->
                            <div class="disDropDown">
                                <label for="district">District</label>
                                <select id="district" name="district" required>
                                    <option value="">Select your District</option>
                                    <option value="Ampara District">Ampara District</option>
                                    <option value="Anuradhapura District">Anuradhapura District</option>
                                    <option value="Badulla District">Badulla District</option>
                                    <option value="Batticaloa District">Batticaloa District</option>
                                    <option value="Colombo District">Colombo District</option>
                                    <option value="Galle District">Galle District</option>
                                    <option value="Gampaha District">Gampaha District</option>
                                    <option value="Hambantota District">Hambantota District</option>
                                    <option value="Jaffna District">Jaffna District</option>
                                    <option value="Kalutara District">Kalutara District</option>
                                    <option value="Kegalla District">Kegalla District</option>
                                    <option value="Killinichchi District">Killinichchi District</option>
                                    <option value="Kurunegala District">Kurunegala District</option>
                                    <option value="Mannar District">Mannar District</option>
                                    <option value="Matale District">Matale District</option>
                                    <option value="Matara District">Matara District</option>
                                    <option value="Monaragala District">Monaragala District</option>
                                    <option value="Mullaitvu District">Mullaitvu District</option>
                                    <option value="Nuwara Eliya District">Nuwara Eliya District</option>
                                    <option value="Polonnaruwa District">Polonnaruwa District</option>
                                    <option value="Puttalam District">Puttalam District</option>
                                    <option value="Ratnapura District">Ratnapura District</option>
                                    <option value="Trincomalee District">Trincomalee District</option>
                                    <option value="Vavuniya District">Vavuniya District</option>
                                </select>
                            </div>
                            <div class="btns">
                                <button type="submit" value="search" id="searchBtn">Search</button>
                                <button type="clear" name="clear">Clear</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="right-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="tbname">Branch Name</th>
                                <th class="tcno">Contact No</th>
                                <th class="taddress">Address</th>
                            </tr>
                        </thead>
                        <tbody id="branchDetails">
                            <!-- <tr><th>Ampara Hospital Branch</th>
                        <th>0710258369</th>
                        <th>Ampara, Sri Lanka</th>
                    </tr>
                    <tr><th>Ampara Hospital Branch</th>
                        <th>0710258369</th>
                        <th>Ampara, Sri Lanka</th>
                    </tr>
                    <tr><th>Ampara Hospital Branch</th>
                        <th>0710258369</th>
                        <th>Ampara, Sri Lanka</th>
                    </tr> -->
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                if (isset($_POST['district']) && $_POST['district'] !== '') {
                                    $district = mysqli_real_escape_string($conn, $_POST['district']);
                                    $sql = "SELECT * FROM branches WHERE district = '$district'";
                                    $result = mysqli_query($conn, $sql);

                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";
                                            echo "<td>" . $row["branch_name"] . "</td>";
                                            echo "<td>" . $row["mobile"] . "</td>";
                                            echo "<td>" . $row["location_link"] . "</td>";
                                            echo "</tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='3'>No branches found in selected district</td></tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='3'>Please select a district</td></tr>";
                                }
                                mysqli_close($conn);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- JavaScript connection -->
    <script src="script.js"></script>
    <?php include_once ("footer.php"); ?>
</body>

</html>