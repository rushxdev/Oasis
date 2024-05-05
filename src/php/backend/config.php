<?php
$con = new mysqli("localhost", "root", "", "oasis");

if ($con->connect_error) {
    die("Coneection Failed" . $con->connect_error);
}
?>