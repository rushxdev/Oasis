<?php
session_start();

include_once ("../backend/config.php");

if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['payment_btn'])) {
    $service_type = mysqli_real_escape_string($conn, $_POST['services']);
    $salutation = mysqli_real_escape_string($conn, $_POST['Salutation']);
    $reference_no = mysqli_real_escape_string($conn, $_POST["ref_no"]);
    $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $phone_no = mysqli_real_escape_string($conn, $_POST["phone_no"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $paymentMethod = mysqli_real_escape_string($conn, $_POST["paymentMethod"]);

    $_SESSION['ref_no'] = $_POST["ref_no"];

    $errors = array();
    if (empty($service_type)) {
        $errors[] = "Service type is required.";
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
        if ($service_type === 'Channeling') {
            $payment = 3000;
        } elseif ($service_type === 'Consulting') {
            $payment = 5000;
        } else {
            $payment = 1000;
        }

        $refunded = 'no';



        // Combine the SQL queries into a single string
        $sql1 = "INSERT INTO payment (service_type, salutation, reference_no, first_name, last_name, contact_no, email, amount, amount_method) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param("sssssssss", $service_type, $salutation, $reference_no, $first_name, $last_name, $phone_no, $email, $payment, $paymentMethod);


        $sql2 = "INSERT INTO payment_history(service_type, salutation, reference_no, first_name, last_name, contact_no, email, amount, amount_method,refunded) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt2 = $conn->prepare($sql2);
        $stmt2->bind_param("ssssssssss", $service_type, $salutation, $reference_no, $first_name, $last_name, $phone_no, $email, $payment, $paymentMethod, $refunded);

        // Execute the statement
        if ($stmt1->execute()) {
            if ($stmt2->execute()) {
                echo "Payment history has been updated correctly";
            } else {
                echo "Error updating payment record: " . $stmt2->error;
            }

            header('Location: paymentSuccess.php');
        } else {
            echo "Error inserting payment record: " . $stmt1->error;
        }

        // Close statement
        $stmt1->close();
        $stmt2->close();

    }
}



$conn->close();


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Payment for medical services</title>
    <link rel="stylesheet" href="../../css/payment.css">
    <link rel="stylesheet" href="../../css/header_footer.css">
    <link rel="stylesheet" href="fa/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <form action="payment.php" method="POST">
            <div class="row">
                <div class="column left">
                    <h3 class="title">Personal Information</h3>
                    <div class="input-box">
                        <label for="Services">Choose the service type :</label><br><br>
                        <select id="services" name="services" required>
                            <option value="">Select</option>
                            <option value="Channeling">Channeling</option>
                            <option value="Consulting">Consulting</option>
                            <option value="Prescriptions">Prescriptions</option>
                        </select>
                        <br><br>

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

                        <label>Reference Number :</label><br><br>
                        <input type="text" placeholder="Ex.OC-1111-24" name="ref_no" required><br><br>

                        <label>First Name :</label><br><br>
                        <input type="text" placeholder="Enter Your First Name:" name="first_name" required><br><br>

                        <label>Last Name :</label><br><br>
                        <input type="text" placeholder="Enter Your Last Name:" name="last_name" required><br><br>

                        <label>Phone Number :</label><br><br>
                        <input type="number" placeholder="Enter Your Phone Number:" name="phone_no" required><br><br>

                        <label>Email :</label><br><br>
                        <input type="text" placeholder="Enter Your Email:" name="email" required>
                    </div><br>

                </div>

                <div class="column right">
                    <h3 class="title">Payment Information</h3>
                    <div class="input-box">
                        <label>Payment Amount</label><br><br>
                        <input type="text" name="payment" id="payment" required><br><br>

                        <label>Choose a Payment Method</label>
                        <ul type="none" required>
                            <li><input type="radio" checked="checked" name="paymentMethod"
                                    value="creditCard"><label>Credit Card</label></li>
                            <img class="payment" src="../../image/cardpayment.png" alt="card" width="150px"
                                height="70px">
                            <li><input type="radio" name="paymentMethod" value="OnlineFund"><label>Online Fund
                                    Transfer</label></li>
                            <li><input type="radio" name="paymentMethod" value="Paypal"></li>
                            <img class="payment" src="../../image/paypal.png" alt="paypal" width="300px" height="100px">
                        </ul><br><br>

                        <div class="cardDetails">
                            <label>Credit Card Number:</label><br><br>
                            <input type="text" placeholder="Card Number:" required><br><br>

                            <label>Name on Card:</label><br><br>
                            <input type="text" placeholder="Name of card:" required><br><br>

                            <div class="flex">
                                <input type="text" placeholder="MM/YY" required>
                                <input type="text" placeholder="CVV" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn" name="payment_btn" value="payment_btn">Proceed To Payment</button>
        </form>
    </div>
    <script src="payment.js"></script>
</body>

</html>