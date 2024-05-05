<?php
    include_once 'header.php';
?>




<h1>Hello <?php 
if (isset($_SESSION["name"])) {
    echo $_SESSION["name"].'!</h1>'; 
} else {
    echo 'User!';
}
?> </h1>
<p>welcome to pages</p>





<?php
    include_once 'footer.php';
    ?>