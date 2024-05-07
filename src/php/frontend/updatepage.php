<?php
    include_once 'header.php';
?>

<link rel="stylesheet" href="../Styles/response.css"> 
<script src="faq.js"></script>

<div class="blank">
 

    



    <div class="container">
   
                    <div class="formcontainer">
                        
                        
                        <h2> Edit Your Quastion</h2>
                        <form id="question-form"  method="post" action="update.php" onsubmit="return validateFormup()">

                        <label for="questionid">Question Number:</label>   
                        <input type="text" id="questionid" name="newid"><br><br>
                        <label for="updatemessage">Update message:</label>
                        <textarea rows="4" id="question-text" name="newmessage" placeholder="Type your question here..."></textarea>
                        <div class='u-btn'>
                        <button type="submit" >Update</button>
                        <button type="button" onclick="location.href='./response.php'">Back</button>
                        </div>

                        </form>
                    
                    </div>
        </div>



  
</div>



<?php
   include_once 'footer.php' ;
?>