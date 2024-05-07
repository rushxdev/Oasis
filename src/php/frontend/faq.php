<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Responses</title>
    <link rel="stylesheet" href="../../css/response.css">
    <link rel="stylesheet" href="../../css/header_footer.css" />
</head>

<body>
    <?php include_once ("header.php"); ?>
    <div class="blank">
        <div class="secondcontainer">
            <div class="slider-wrapper">
                <div class="slider">
                    <h5 class="content" onclick="location.href='blog.php'">See More ...</h5>
                    <img id="slide-1" src="../../image/1.jpg" alt="Hospital img 1" />
                    <img id="slide-2" src="../../image/2.jpg" alt="Hospital img 2" />
                    <img id="slide-3" src="../../image/3.jpg" alt="Hospital img 3" />
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
                <form id="question-form" method="post" action="../backend/faq_insert.php" onsubmit="return validateForm()"
                    name="qform">
                    <label for="submittime">date and time :</label>
                    <input type="date_default_timezone_set" id="submittime" name="qsubmittime"
                        value="<?php echo date('Y-m-d'); ?>" readonly>
                    <textarea rows="4" id="question-text" placeholder="Type your question here..."
                        name="qmessage"></textarea>
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
                    require '../backend/config.php';

                    $sql = "SELECT * FROM questions WHERE registered_number = {$_SESSION['userid']}";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["question_id"] . "</td>";
                            echo "<td>" . $row["submission_time"] . "</td>";
                            echo "<td>" . $row["message"] . "</td>";
                            echo "<td class='action'>";
                            echo "<form method='post' action='../backend/faq_delete.php' onclick='return confirmDelete()'>";
                            echo "<input type='hidden' name='question_id' value='" . $row["question_id"] . "'>";
                            echo "<button type='submit'>Delete</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "<td>". $row["reply"] ."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No previous questions</td></tr>";
                    }
                    $conn->close();
                    ?>
                </table>
            </div>
        </div>
    </div>

    <?php include_once ("footer.php"); ?>
    <script src="../../js/faq.js"></script>
    <script src="../../js/slideshow.js"></script>
</body>

</html>