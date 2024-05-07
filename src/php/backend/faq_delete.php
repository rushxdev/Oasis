<?php

require 'config.php';

$Id=$_POST["question_id"];

$sql="DELETE FROM questions WHERE question_id=$Id";

if($conn->query($sql)){
    echo "deleted";
    header("Location: ../frontend/faq.php");
}
else {
    echo "not success ";
}
