<?php
session_start(); // Start the session

include_once ("../backend/config.php"); // Include database configuration file

// Check database connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}
// Check if the form is submitted and the payment button is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment_btn'])) {
    $service_type = mysqli_real_escape_string($conn, $_POST['services']);
    $salutation = mysqli_real_escape_string($conn, $_POST['Salutation']);
    $reference_no = mysqli_real_escape_string($conn, $_POST["ref_no"]);
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $phone_no = mysqli_real_escape_string($conn, $_POST["phone_no"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $paymentMethod = mysqli_real_escape_string($conn, $_POST["paymentMethod"]);

    $_SESSION['ref_no'] = $_POST["ref_no"]; // Store reference number in session for later use

    // Check for errors in form inputs
    $errors = array();
    if (empty($service_type)) {
        $errors[] = "Service type is required.";  // If there are errors, display them and stop further processing
    }
    if (empty($salutation)) {
        $errors[] = "Salutation is required.";
    }
    if (empty($reference_no)) {
        $errors[] = "Reference number is required.";
    }
    if (empty($first_name)) {
        $errors[] = "First name is required.";
    }
    if (empty($last_name)) {
        $errors[] = "Last name is required.";
    }
    if (empty($phone_no)) {
        $errors[] = "Phone number is required.";
    }
    if (empty($email)) {
        $errors[] = "Email is required.";
    }
    if (empty($paymentMethod)) {
        $errors[] = "Payment method is required.";
    }

    // If there are errors, display them and stop further processing
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        // You might also redirect back to the form here or display an error message in the form.
        exit; // Stop further processing
    } else {
        // Calculate payment amount based on service type
        if ($service_type === 'Channeling') {
            $payment = 3000;
        } elseif ($service_type === 'Consulting') {
            $payment = 5000;
        } else {
            $payment = 1000;
        }

        $refunded = 'no';  // Define 'refunded' variable



        // Combine the SQL queries into a single string
        $sql1 = "INSERT INTO payment (service_type, salutation, reference_no, first_name, last_name, contact_no, email, amount, amount_method) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("sssssssss", $service_type, $salutation, $reference_no, $first_name, $last_name, $phone_no, $email, $payment, $paymentMethod);


        $sql2 = "INSERT INTO payment_history(service_type, salutation, reference_no, first_name, last_name, contact_no, email, amount, amount_method,refunded) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("ssssssssss", $service_type, $salutation, $reference_no, $first_name, $last_name, $phone_no, $email, $payment, $paymentMethod, $refunded); // Prepare and bind SQL statements for insertion

        // Execute the statement
        if ($stmt1->execute()) {
            if ($stmt2->execute()) {
                echo "Payment history has been updated correctly";
            } else {
                echo "Error updating payment record: " . $stmt2->error;
            }
        // If execution is successful, redirect to payment success page
            header('Location: paymentSuccess.php');
        } else {
            echo "Error inserting payment record: " . $stmt1->error;
        }

        // Close statement
        $stmt1->close();
        $stmt2->close();

    }
}

$conn->close(); // Close database connection

?>
<!DOCTYPE html>
<html lang="en">

<head>
<!-- Meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>Payment for medical services</title> <!-- Title -->
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../../css/payment.css">
    <link rel="stylesheet" href="../../css/header_footer.css">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
</head>

<body>
    <div class="container"> <!-- Container for the payment form -->
        <form action="payment.php" method="POST">  <!-- Payment form -->
            <div class="row"> <!-- Row to divide the form into two columns -->
                <div class="column left"> <!-- Left column for personal information -->
                    <h3 class="title">Personal Information</h3> <!-- Title for personal information section -->
                    <div class="input-box"> <!-- Input box for service type selection -->
                        <label for="Services">Choose the service type :</label><br><br>
                        <select id="services" name="services" required>
                            <option value="">Select</option>
                            <option value="Consulting">Consulting</option>
                        </select>
                        <br><br>

                        <!-- Input box for salutation selection -->
                        <label for="Salutation">Salutation:</label><br><br>
                        <select id="Salutation" name="Salutation" required>
                            <option value="">Select</option>
                            <option value="Mr">Mr</option>
                            <option value="Mrs">Mrs</option>
                            <option value="Ms">Ms</option>
                            <option value="Miss">Miss</option>
                            <option value="Rev">Rev</option>
                        </select>
                        <br><br>

                        <label>Reference Number :</label><br><br>  <!-- Input box for reference number -->
                        <input type="text" value="<?php echo $_GET['bookingId']; ?>" placeholder="Ex.OC-1111-24" name="ref_no" required readonly><br><br>

                        <label>First Name :</label><br><br>  <!-- Input box for first name -->
                        <input type="text" placeholder="Enter Your First Name:" name="first_name" required><br><br>

                        <label>Last Name :</label><br><br>  <!-- Input box for last name -->
                        <input type="text" placeholder="Enter Your Last Name:" name="last_name" required><br><br>

                        <label>Phone Number :</label><br><br>  <!-- Input box for phone number -->
                        <input type="number" placeholder="Enter Your Phone Number:" name="phone_no" required><br><br>

                        <label>Email :</label><br><br>  <!-- Input box for email -->
                        <input type="text" placeholder="Enter Your Email:" name="email" required>
                    </div><br>

                </div>

                <div class="column right"> <!-- Right column for payment information -->
                    <h3 class="title">Payment Information</h3> <!-- Title for payment information section -->
                    <div class="input-box">  <!-- Input box for payment amount -->
                        <label>Payment Amount</label><br><br> 
                        <input type="text" name="payment" id="payment" required><br><br>

                        <label>Choose a Payment Method</label>  <!-- Payment method selection -->
                        <ul type="none" required>
                        <!-- Radio buttons for payment methods -->
                            <li><input type="radio" checked="checked" name="paymentMethod"
                                    value="creditCard"><label>Credit Card</label></li>
                            <img class="payment" src="../../image/cardpayment.png" alt="card" width="150px"
                                height="70px">
                            <li><input type="radio" name="paymentMethod" value="OnlineFund"><label>Online Fund
                                    Transfer</label></li>
                            <li><input type="radio" name="paymentMethod" value="Paypal"></li>
                            <img class="payment" src="../../image/paypal.png" alt="paypal" width="300px" height="100px">
                        </ul><br><br>

                        <div class="cardDetails"> <!-- Input boxes for credit card details -->
                            <label>Credit Card Number:</label><br><br>
                            <input type="text" placeholder="Card Number:" required><br><br>

                            <label>Name on Card:</label><br><br>
                            <input type="text" placeholder="Name of card:" required><br><br>

                            <div class="flex"> <!-- Input boxes for expiration date and CVV -->
                                <input type="text" placeholder="MM/YY" required>
                                <input type="text" placeholder="CVV" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Button to submit the form -->
            <button type="submit" class="btn" name="payment_btn" value="payment_btn">Proceed To Payment</button>
        </form>
    </div>
    <script src="payment.js"></script> <!-- JavaScript file -->
</body>

</html>