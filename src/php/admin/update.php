<?php
include '../backend/config.php';
$id = $_POST['branch_id'];
$bname = $_POST["bname"];
$district = $_POST["district"];
$mobile = $_POST["mobile"];
$l_link = $_POST["l_link"];
$sql = "UPDATE branch_details set bname='$bname', district='$district', mobile='$mobile', l_link='l_link' WHERE branch_id ='$branch_id' ";
if ($con->query($sql)) {
    echo "Updated";
    header('location:display.php');

} else {
    echo "Not Updated";
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="adminstyle.css">
    <title>Update Branch Details</title>
</head>

<body>
    <div class="container my-5">
        <form id="update_form" method="post" action="update.php" class="inputabranch" autocomplete="off">
            <h2>Update the Branch Details</h2>
            <div class="form-group">
                <label>Branch Name</label>
                <input type="text" class="form-control" placeholder="Enter the Branch Name" name="bname"
                    autocomplete="off" value=<?php echo $bname; ?>>
            </div>
            <div class="disDropDown">
                <label for="district">District</label>
                <select id="district" name="district" required placeholder="Select District">
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
            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" placeholder="Enter your mobile number" name="mobile"
                    autocomplete="off" value=<?php echo $mobile; ?>>
            </div>
            <div class="form-group">
                <label>Location Link</label>
                <input type="text" class="form-control" placeholder="Enter branch's Location link" name="l_link"
                    value=<?php echo $l_link; ?>>
            </div>
            <div class="btns">
                <button type="submit" name="submit">Submit</button>
                <button type="clear" name="clear">Clear</button>
                <button type="view" name="view"><a href="display.php">View All</button>
            </div>
        </form>
    </div>


</body>

</html>



<!-- Conect Footer -->
<?php
include_once 'footer.php';

?>