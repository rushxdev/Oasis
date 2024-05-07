<?php
include_once ("../backend/config.php");
session_start()
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width= , initial-scale=1.0">
  <title>All The Users</title>
  <link rel="stylesheet" href="adminstyle.css">
  <link rel="stylesheet" href="../../css/header_footer.css" />
</head>

<body>
  <?php include_once ("header.php"); ?>
  <div class="blank">
    <div class="container-display">
      <table class="table">
        <thead>
          <tr>
            <th>Question ID</th>
            <th>Submission Time</th>
            <th>Question</th>
            <th>Reply</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM questions";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['question_id'];
              $submission_time = $row['submission_time'];
              $question = $row['message'];
              $reply = $row['reply'];
              echo '<tr><form method="post" action="update_question.php">
                        <input type="hidden" name="question_id" value="' . $id . '">
                        <td>' . $id . '</td>
                        <td>' . $submission_time . '</td>
                        <td>' . $question . '</td>
                        <td><textarea name="reply">' . $reply . '</textarea></td>
                        <td>
                            <button class="btn btn-primary" name="update">Update</button>
                        </td>
                      </form></tr>';
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script src="adminscript.js"></script>
  <?php include_once ('../frontend/footer.php'); ?>
</body>

</html>