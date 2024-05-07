<?php
    include_once 'header.php';
    date_default_timezone_set('Asia/Colombo');
   $date =  date("Y-m-d h:i:sa");
?>

<link rel="stylesheet" href="../Styles/response.css"> 
<script src="faq.js"></script>
<script src="slideshow.js"></script>


<div class="blank">
    <div class="secondcontainer">   
        <div class="slider-wrapper">
            <div class="slider">
                <h5 class="content" onclick="location.href='blog.php'">See More ...</h5>
                <img id="slide-1" src="../Source/1.jpg" alt="Hospital img 1" />
                <img id="slide-2" src="../Source/2.jpg" alt="Hospital img 2" />
                <img id="slide-3" src="../Source/3.jpg" alt="Hospital img 3" />
            </div>
            <div class="slider-nav">
                <a href="#slide-1"></a>
                <a href="#slide-2"></a>
                <a href="#slide-3"></a>
            </div>
        </div>                        
    </div>




    <div class="container">
        <div class="formcontainer">
            <h2> Do you have any Questions ? </h2>
            <form id="question-form" method="post" action="insert.php" onsubmit="return validateForm()" name="qform">
                <label for="submittime">date and time :</label>
                <input type="date_default_timezone_set" id="submittime" name="qsubmittime"   value="<?php echo $date; ?>" >
                <textarea rows="4" id="question-text" placeholder="Type your question here..." name="qmessage"></textarea>
                <div class='f-btn'>
                    <button type="submit">Submit Question</button><br><br>
                    <button type="reset">Reset</button>
                </div>
            </form>
        </div>
        <br><br>
        <div class="tablecontainer">
            <h3>History</h3>
            <br><br>

            <table>
                <tr>
                    <th>Question Number</th>
                    <th>Date</th>
                    <th>Questions</th>
                    <th>Action</th>
                    <th>Reply</th>
                </tr>

                <?php
                    require 'config.php';

                    $sql = "SELECT QID, DateandTime, Questions FROM questions";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["QID"] . "</td>";
                            echo "<td>" . $row["DateandTime"] . "</td>";
                            echo "<td>" . $row["Questions"] . "</td>";
                            echo "<td class='action'>";
                            echo "<button onclick='window.location.href=\"updatepage.php?QID=" . $row["QID"] . "\"'>Update</button>";
                            echo "&nbsp;";
                            echo "&nbsp;";
                            echo "<form method='post' action='delete.php' onclick='return confirmDelete()'>";
                            echo "<input type='hidden' name='sid' value='" . $row["QID"] . "'>";
                            echo "<button type='submit'>Delete</button>";
                            echo "</form>";
                            echo "</td>";


                            echo "<td>No Reply</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No previous questions</td></tr>";
                    }

                    $con->close();
                ?>
            </table>
        </div>
    </div>
</div>

<?php
    include_once 'footer.php';
?>

