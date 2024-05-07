<?php
include '../backend/config.php';

if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];

    $sql = "DELETE FROM branch_details WHERE branch_id = $id";
    $result = mysqli_query($con, $sql);
    
    if($result){
        echo "Delete successful";
        header('location: display.php');
        exit; // Optional: Terminate script execution after redirection
    } else {
        die(mysqli_error($con));
    }
}
?>
