<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title><!-- Title of the page -->
    <!-- Internal CSS styles -->
    <style>
    /* Table styles */
        table {
            border-collapse: collapse;
            width: 120%;
            margin-left: -50px;
        }
        th, td {
            border: 1px solid black;
            padding: 12px;
            text-align: center;
        }

        /* Styling for table cells */
        td
        {
            background-color:rgb(142,223,255);
        }

        th
         {
            background-color: #2db6dc;
            padding: 15px;
            text-align: center;
            font-size:20px;

        }

        /* Heading styles */
        h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        /* Container styles */
        .container {
            text-align: center;
            margin-top: -100px;
            margin-left: -20px;
        }
        /* Message styles */
        .message {
            background-color: #2db6dc;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .message h2 {
            margin-top: 0;
        }
        .message p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Starting PHP session and including configuration file
        session_start();
        include_once("../backend/config.php");
        // Checking database connection
        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        }

        // Check if reference number is set in session
        if (isset($_SESSION['ref_no'])) {
            $reference_no = $_SESSION['ref_no'];

            // Prepare and execute query to fetch payment details
            $sql = "SELECT service_type, CONCAT(first_name, ' ', last_name) AS full_name, amount, amount_method FROM payment WHERE reference_no = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $reference_no);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if any rows were returned
            if ($result->num_rows > 0) {
                ?>
                <div class="message">
                    <h2>Payment successful! Thank you.</h2>
                    <p>Your payment has been processed successfully.</p>
                </div>
                <!-- Payment details table -->
                <br><br>
                <h1>Payment Details</h1>
                <table>
                    <tr>
                        <th>Service Type</th>
                        <th>Full Name</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                    </tr>
                    <?php
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['service_type']; ?></td>
                            <td><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['amount_method']; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php
            } else {
                echo "No payment details found for reference number: " . $reference_no;
            }

            // Close statement and connection
            $stmt->close();
            $conn->close();
        } else {
            echo "Reference number not found.";
        }
        ?>
    </div>
    <!-- Button to return to profile page -->
    <a href="profile.php"><button style= "background-color:#007bff; color:#fff; padding: 8px 16px; border-radius: 4px;">Back to Home</button></a>
</body>
</html>
