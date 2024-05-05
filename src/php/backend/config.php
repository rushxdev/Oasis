<?php
$conn = new mysqli("localhost", "root", "", "oasis");

if ($conn->connect_error) {
    die("Coneection Failed" . $conn->connect_error);
}
?>