<?php
session_start();//Starting session to manage user sessions

include_once ("../backend/config.php");

$payment = "";

//Handing form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['refund_btn'])) {
    //Sanitizing and validating form inputs
    $service = mysqli_real_escape_string($conn, $_POST['services']);
    $referenceNo = mysqli_real_escape_string($conn, $_POST['reference_no']);
    $accountNo = mysqli_real_escape_string($conn, $_POST["accountNo"]);
    $bank = mysqli_real_escape_string($conn, $_POST["bank"]);
    $branch = mysqli_real_escape_string($conn, $_POST["branch"]);
    $accountName = mysqli_real_escape_string($conn, $_POST["accountHolderName"]);
    $remarks = mysqli_real_escape_string($conn, $_POST["refundRemarks"]);

    $errors = array();
    if (empty($service)) {
        $errors[] = "Service type is required.";
    }
    if (empty($referenceNo)) {
        $errors[] = "Reference number is required.";
    }

    if (empty($accountNo)) {
        $errors[] = "Account number is required.";
    }
    if (empty($bank)) {
        $errors[] = "Bank name is required.";
    }
    if (empty($branch)) {
        $errors[] = "Bank branch is required.";
    }
    if (empty($accountName)) {
        $errors[] = "Account holder's name is required.";
    }
    // If there are errors, display them and stop further processing
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
        // You might also redirect back to the form here or display an error message in the form.
        exit; // Stop further processing
    } else {
        //Calculating payment amount based onservice type
        if ($service === 'Channeling') {
            $payment = 3000;
        } else if ($service === 'Consulting') {
            $payment = 5000;
        } else {
            $payment = 1000;
        }

        //Preparing SQL statement for insertion query
        $sql = "INSERT INTO refund(service_type, reference_no, payment, bankAccount_no, bank_name, bank_branch, bankAccount_name, refund_marks) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $service, $referenceNo, $payment, $accountNo, $bank, $branch, $accountName, $remarks);

        //Executing insertion query
        if ($stmt->execute()) {
            // Now, let's delete the corresponding record from the payment table
            $delete_sql = "DELETE FROM payment WHERE reference_no = ?";
            $delete_stmt = $conn->prepare($delete_sql);
            $delete_stmt->bind_param("s", $referenceNo);

            if ($delete_stmt->execute()) {
                // Now, let's update the corresponding record from the payment table
                $update_sql = "UPDATE  payment_history SET refunded = 'yes' WHERE reference_no = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("s", $referenceNo);

                if ($update_stmt->execute()) {
                    $booking_sql = "DELETE FROM booking WHERE booking_id = ?";
                    $booking_stmt = $conn->prepare($booking_sql);
                    $booking_stmt->bind_param("s", $referenceNo);
                    if ($booking_stmt->execute()) {
                        echo "Payment history has been updated correctly";
                    } else {
                        echo "Booking deletion failiure.";
                    }
                    
                } else {
                    echo "Error updating payment record: " . $update_stmt->error;
                }

                header('Location: refundSuccess.html');
                exit;

            } else {
                echo "Error deleting record from payment table: " . $delete_stmt->error;
            }
            // Close statement and connection
            $delete_stmt->close();
            $update_stmt->close();

        }
    }
}
?>


<!DOCTYPE html>

<head>
    <!--Meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>
    </title>
    <!-- stylesheets-->
    <link rel="stylesheet" href="../../css/refund.css">
    <link rel="stylesheet" href="../../css/fa/css/font-awesome.min.css">

</head>

<body>
    <!--Title for refund  sections-->
    <h1><u>Refund the payment</u></h1>

    <!-- Form for refund-->
    <form action="" method="POST">
        <div class="container1" style="display:flex">
            <div class="left column">

                <!--Selecting paid services-->
                <label for="services">SELECT THE PAID SERVICE:</label>
                <select id="services" name="services" readonly>
                    <option value="">Select</option>
                    <option value="Consulting" id="Consulting">Consulting</option>
                </select>
                <br><br>
                <!--Input for reference numbers-->
                <label>REFERENCE NUMBER:</label>
                <input type="text" value="<?php echo $_POST["referance_no"] ?>" placeholder="Enter Reference No:" name="reference_no" readonly>
                <br><br>
                <!--Input for payment amount-->
                <label>PAYMENT AMOUNT:</label>
                <input type="text" name="payment" id="payment" placeholder="Rs.">
                <br><br>
                <!--Input for bank account number-->
                <label>BANK ACCOUNT NUMBER:</label>
                <input type="text" placeholder="Enter Reference No:" name="accountNo">
                <br><br>
                <!--selecting bank name-->
                <label>BANK NAME:</label>
                <select id="bank" name="bank">
                    <option value="">Select</option>
                    <option value="SampathBank" id="SampathBank">Sampath Bank</option>
                    <option value="PeopleBank" id="PeopleBank">People's Bank</option>
                    <option value="BankOfCeylon" id="BankOfCeylon">Bank of Ceylon</option>
                    <option value="HNB" id="HNB">Hatton National Bank</option>
                    <option value="Commercial" id="Commercial">Commercial Bank</option>
                    <option value="PanAsia" id="PanAsia">Pan Asia Bank</option>
                </select>
                <br><br>
                <!-- Selecting bank branches-->
                <label>BANK BRANCH:</label>
                <select id="branch" name="branch">
                    <option value="">Select</option>
                    <option value="Colombo" id="Colombo">Colombo</option>
                    <option value="Gampaha" id="Gampaha">Gampaha</option>
                    <option value="Kalutara" id="Kalutara">Kalutara</option>
                    <option value="Ratnapura" id="Ratnapura">Ratnapura</option>
                    <option value="Kandy" id="Kandy">Kandy</option>
                    <option value="Matale" id="Matale">Matale</option>

                </select>

                <br><br>
                <!--Input bank account holder name-->
                <label>BANK ACCOUNT HOLDER NAME:</label>
                <input type="text" placeholder="Account Holder Name - Required" name="accountHolderName">
                <br><br>

                <!--Input for refund remarks-->
                <label>REFUND REMARKS:</label>
                <input type="text" placeholder="Refund Remarks - Optional" name="refundRemarks">
            </div>
    </form>

    <!-- Column for refund button and image -->
    <div class="column-left">
        <img src="../../image/refund .png" alt="Refund Your Money">
        <button type="submit" name="refund_btn" class="refund_btn">Submit</button>
    </div>
    </div>
    <!-- JavaScript file -->
    <script src="../../js/refund.js"></script>
</body>

</html>