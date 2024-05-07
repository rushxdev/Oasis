<?php

require 'config.php';

$Id=$_POST["sid"];

$sql="DELETE FROM questions WHERE QID='$Id'";

if($con->query($sql))
{

    echo "deleted";
    header("Location: ./response.php");
}
else
{
    echo "not success ";
}



?>