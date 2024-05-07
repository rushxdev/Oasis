<div class="navbar">
    <div class="logo"><a href="index.php">OASIS</a></div>
    <div class="nav-items">
        <a href="index.php" id="nav_home_button">Home</a>
        <?php if (isset($_SESSION["name"])) { ?>
            <a href="profile.php" id="nav_profile_button">Profile</a>
            <a href="channeling.php" id="nav_channeling_button">Channeling</a>
            <a href="prescription.php" id="nav_prescription_button">Prescription Refill</a>
            <a href="consultation.php" id="nav_consulting_button">Consulting & Advice</a>
            <a href="faq.php" id="nav_faq_button">FAQ's</a>
        <?php } else { ?>
            <a href="#" id="nav_about_button">About Us</a>
            <a href="branch.php" id="nav_branch_button">Branch Locator</a>
            <a href="blog.php" id="nav_blog_button">Health Blog</a>
            <a href="contact.php" id="nav_contact_button">Contact Us</a>
        <?php } ?>
    </div>
    <div class="accounts">
        <?php
        if (isset($_SESSION["name"])) {
            ?>
            <a href="#profile.php"><?php echo $_SESSION["name"]; ?></a>
            <span class="separator"> | </span>
            <a href="../backend/logout.inc.php">Log out</a>
            <?php
        } else {
            ?>
            <a href="login.php">Login</a>
            <span class="separator"> | </span>
            <a href="register.php">Register</a>
            <?php
        }
        ?>
    </div>
</div>
<script>
    var currentUrl = window.location.href;

    if (currentUrl.includes("index.php")) {
        document.getElementById("nav_home_button").classList.add("active");
    } else if (currentUrl.includes("profile.php")) {
        document.getElementById("nav_profile_button").classList.add("active");
    } else if (currentUrl.includes("channeling.php")) {
        document.getElementById("nav_channeling_button").classList.add("active");
    } else if (currentUrl.includes("prescription.php")) {
        document.getElementById("nav_prescription_button").classList.add("active");
    } else if (currentUrl.includes("consultation.php")) {
        document.getElementById("nav_consulting_button").classList.add("active");
    } else if (currentUrl.includes("about.php")) {
        document.getElementById("nav_about_button").classList.add("active");
    } else if (currentUrl.includes("branch.php")) {
        document.getElementById("nav_branch_button").classList.add("active");
    } else if (currentUrl.includes("blog.php")) {
        document.getElementById("nav_blog_button").classList.add("active");
    } else if (currentUrl.includes("contact.php")) {
        document.getElementById("nav_contact_button").classList.add("active");
    }
</script>