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
      <div class="update_btn">
        <button class="addBtn"><a href="admin.php"> Add branches</a></button>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th>Branch ID</th>
            <th>Branch Name</th>
            <th>Contact No</th>
            <th>District Name</th>
            <th>Location Link</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM branches";
          $result = mysqli_query($conn, $sql);
          if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['branch_id'];
              $bname = $row['branch_name'];
              $conntact_no = $row['mobile'];
              $district_name = $row['district'];
              $location_link = $row['location_link'];
              echo '<tr><form method="post" action="update_delete.php">
                <input type="hidden" name="branch_id" value="'. $id .'">
                        <td>' . $id . '</td>
                        <td>' . $bname . '</td>
                        <td><input type="tel" name="mobile" value="' . $conntact_no . '"></td>
                        <td>' . $district_name . '</td>
                        <td>' . $location_link . '</td>
                        <td>
                          <button class="btn btn-primary" name="update">Update</button>
                          <button class="btn btn-danger" name="delete">Delete</button>
                        </td></form>
                      </tr>';
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
