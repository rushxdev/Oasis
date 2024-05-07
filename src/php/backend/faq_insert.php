<?php
session_start();

    require 'config.php';

   $qdate=$_POST["qsubmittime"];
   $qmes=$_POST["qmessage"];
   
   $sql = "INSERT INTO questions(registered_number, message) VALUES ('{$_SESSION['userid']}', '$qmes')";

   if($conn->query($sql))
   {
    header("Location: ../frontend/faq.php");
    exit; 

   }
    else{
        echo"Error" .$conn->error;

    }

    $conn->close();
