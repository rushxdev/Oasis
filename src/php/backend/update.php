<?php

require 'config.php';

$id=$_POST["newid"];
$message=$_POST["newmessage"];

// if(empty($Id)||empty($message))
// {
//     echo "All Required";
// }
// else
// {

$sql="UPDATE questions set Questions='$message' WHERE QID ='$id' ";

if($con->query($sql))
{
    echo "Updated" ;
    header("Location: ./response.php");
    
}else
{
    echo "Not Updated";
}

//  }

?>