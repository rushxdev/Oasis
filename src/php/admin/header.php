<div class="navbar">
    <div class="logo"><a href="index.php">OASIS</a></div>
    <div class="nav-items">
        <a href="admin.php" id="nav_branch_button">Add Branch</a>
        <a href="display.php" id="nav_all_button">All Branches</a>
        <a href="question.php" id="nav_question_button">Questions</a>
    </div>
    <div class="accounts">
        <?php
        if (isset($_SESSION["admin_name"])) {
            ?>
            <a href="#profile.php"><?php echo $_SESSION["admin_name"]; ?></a>
            <span class="separator"> | </span>
            <a href="../backend/logout.inc.php">Log out</a>
            <?php
        } else {
            header("Location: ../frontend/login.php");
        }
        ?>
    </div>
</div>
<script>
    var currentUrl = window.location.href;

    if (currentUrl.includes("admin.php")) {
        document.getElementById("nav_branch_button").classList.add("active");
    } else if (currentUrl.includes("display.php")) {
        document.getElementById("nav_all_button").classList.add("active");
    } else if (currentUrl.includes("question.php")) {
        document.getElementById("nav_question_button").classList.add("active");
    }
</script>