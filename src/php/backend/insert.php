<?php

    require 'config.php';

   $qdate=$_POST["qsubmittime"];
   $qmes=$_POST["qmessage"];

   $sql="INSERT INTO questions(message) VALUES ('$qmes')";

   if($con->query($sql))
   {
     // Redirect to response.php if the insertion is successful
    header("Location: response.php");
    exit; 

   }
    else{
        echo"Error" .$con->error;

    }

    $con->close();
?>
