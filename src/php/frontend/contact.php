<!DOCTYPE html>
<html>

<head>
  <title>Contact</title>
<link rel="stylesheet" href="../../css/contact.css">
<link rel="stylesheet" href="../../css/header_footer.css" />
</head>

<body>
  <?php include_once("header.php"); ?>
  <div class="blank">
    <div class="container">
      <div class="form-container">
        <div class="left-container">
          <div class="left-inner-container">

            <h2>Reach our team</h2>
            <p>"Need assistance? Our team is here for you around the clock. Don't hesitate to reach out - we're ready to
              help whenever you need us"</p>
            <br>
            <p>Feel free to send me a message in the contact form</p>
          </div>
        </div>
        <div class="right-container">
          <div class="right-inner-container">
            <form action="../backend/get_contact.php" method="post">
              <h2 class="lg-view">Contact</h2>
              <h2 class="sm-view">Let's Chat</h2>
              <p>* Required</p>
              <div class="social-container">
                <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
              </div>
              <div class="round">
                <input type="text" name="name" placeholder="Name *" />
                <input type="email" name="email" placeholder="Email *" />
                <input type="text" name="company" placeholder="Company" />
                <input type="phone" name="phone" placeholder="Phone" />
                <textarea rows="4" name="message" placeholder="Message"></textarea>
                <button>Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once("footer.php"); ?>
</body>

</html>