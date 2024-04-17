<?php
require_once("dbconn.php");

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerEmail = $_POST["customer_email"];
    $inputOtp = $_POST["otp"];

    // Validate the OTP
    $otpValidationSql = "SELECT * FROM customers WHERE customer_email = '$customerEmail' AND otp = '$inputOtp' AND otp_expiry > NOW()";
    $otpResult = $conn->query($otpValidationSql);

    if ($otpResult->num_rows > 0) {
        echo "<p>Registration successful!</p>";
        // Redirect or display a successful message
    } else {
        $errorMessage = "Invalid or expired OTP.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
</head>
<body>
    <div class="otp-form">
        <h2>Enter OTP</h2>
        <form action="otp-verification.php" method="post">
            <input type="hidden" name="customer_email" value="<?php echo isset($_POST['customer_email']) ? $_POST['customer_email']
