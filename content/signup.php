<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/KF7013/assets/stylesheets/main.css" />

    <title>REGISTERATION PAGE</title>
  </head>

<body>
    <header class="navHeader">
        <nav class="navbar">
            <div class="logo"><a href="/KF7013/content/index.php">VIZHA</a></div>
            <ul class="links">
                <li><a href="/KF7013/content/index.php">HOME</a></li>
                <li><a href="/KF7013/content/about.php">ABOUT</a></li>
                <li><a href="/KF7013/content/events.php">EVENTS</a></li>
                <li><a href="/KF7013/content/dashboard.php">BOOKINGS</a></li>
                <li><a href="/KF7013/content/contactus.php">CONTACT US</a></li>
                <li><a href="/KF7013/content/wireframe.pdf">WIREFRAMES</a></li>
                <li><a href="/KF7013/content/credits.php">CREDITS</a></li>
                <li><a href="/KF7013/content/faq.php">FAQ</a></li>
        
            </ul>
            <?php
            // Check if the customer is logged in
            if (isset($_SESSION['customer_forename'])) {
                $customerName = $_SESSION['customer_forename'];
                ?>
                <a href="dashboard.php" class="action_btn">Hello, <?php echo $customerName; ?></a>
                <a href="logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/hello.php'); ?>" class="action_btn">Logout</a>
                <?php
            } else {
                // Display login and register buttons if the customer is not logged in
                ?>
                <a href="login.php?redirectUrl=<?php echo urlencode('/KF7013/content/index.php'); ?>" class="action_btn">LOGIN</a>
                <a href="signup.php" class="action_btn">REGISTER</a>
                <?php
            }
            ?>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>

        <div class="dropdown_menu">
                 <li><a href="/KF7013/content/index.php">HOME</a></li>
                <li><a href="/KF7013/content/about.php">ABOUT</a></li>
                <li><a href="/KF7013/content/events.php">EVENTS</a></li>
                <li><a href="/KF7013/content/dashboard.php">BOOKINGS</a></li>
                <li><a href="/KF7013/content/contactus.php">CONTACT US</a></li>
                <li><a href="/KF7013/content/wireframe.pdf">WIREFRAMES</a></li>
                <li><a href="/KF7013/content/credits.php">CREDITS</a></li>
                <li><a href="/KF7013/content/faq.php">FAQ</a></li>
          <?php
// Check if the customer is logged in
if (isset($_SESSION['customer_forename'])) {
    $customerName = $_SESSION['customer_forename'];
    ?>
    <li><a href="/KF7013/content/hello.php" class="action_btn">Hello, <?php echo htmlspecialchars($customerName); ?></a></li>
    <li><a href="/KF7013/content/logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/index.php'); ?>" class="action_btn">Logout</a></li>
    <?php
} else {
    // Display login and register buttons if the customer is not logged in
    ?>
    <li><a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/index.php'); ?>" class="action_btn">LOGIN</a></li>
    <li><a href="/KF7013/content/signup.php" class="action_btn">REGISTER</a></li>
    <?php
}
?>
        </div>
    </header>
    <main>
    <section>
        <img class="posterabout" src="/KF7013/assets/images/posterabout.png" alt="the poster from home page but only half of it to give a better designed view"> <!---sourced via adobe express refer to creadits page-->
    </section>
    </main>
<script src="/KF7013/content/scripts/main.js"></script>


    <div class="signup">
        <h2 class="sign2">REGISTRATION FOR VIZHA</h2>
        <?php
        require_once("dbconn.php");
        use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        require 'PHPMailer-master/src/Exception.php';
        require 'PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/src/SMTP.php';

        session_start();
        $errorMessage = "";
        $otpSent = false;

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
            $customerForename = $_POST["customer_forename"] ?? '';
            $customerSurname = $_POST["customer_surname"] ?? '';
            $customerEmail = $_POST["customer_email"] ?? '';
            $dateOfBirth = $_POST["date_of_birth"] ?? '';
            $password = $_POST["password"] ?? '';

            // Perform basic validation
            if (empty($customerForename) || empty($customerSurname) || empty($customerEmail) || empty($dateOfBirth) || empty($password)) {
                $errorMessage = "All fields are required.";
            } elseif (!filter_var($customerEmail, FILTER_VALIDATE_EMAIL)) {
                $errorMessage = "Invalid email format.";
            } elseif (strtotime($dateOfBirth) > strtotime('-18 years')) {
                $errorMessage = "You must be 18 years or older to register.";
            } elseif (strlen($password) < 12 || !preg_match('@[A-Z]@', $password) || !preg_match('@[a-z]@', $password) || !preg_match('@[0-9]@', $password) || !preg_match('@[^\w]@', $password)) {
                $errorMessage = "Password must be at least 12 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.";
            } else {
                // Check if the email already exists in the database
                $checkEmailQuery = "SELECT customer_email FROM customers WHERE customer_email = ?";
                $stmt = $conn->prepare($checkEmailQuery);
                $stmt->bind_param("s", $customerEmail);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $errorMessage = "The provided email is already registered. Please use a different email.";
                } else {
                    // Generate OTP
                    $otp = rand(100000, 999999);
                    $mail = new PHPMailer(true);
                    try {
//Server settings
$mail->SMTPDebug = 0;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'vizhaevents.LTD@gmail.com';                     //SMTP username
$mail->Password   = 'gkxriypnijhdywat';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        // Recipients
                        $mail->setFrom('vizhaevents.LTD@gmail.com', 'VIZHA');
                        $mail->addAddress($customerEmail, $customerForename);

                        // Content
                        $mail->isHTML(true);
                        $mail->Subject = 'Your One-Time Password (OTP) for Accessing "VIZHA"';
                        $mail->Body = "<h1>Your OTP</h1><p>Your One-Time Password (OTP) for accessing VIZHA is: <strong>$otp</strong></p>";
                        $mail->AltBody = "Your OTP for accessing VIZHA is: $otp";

                        $mail->send();
                        echo 'OTP has been sent to your email.';
                        $otpSent = true;
                        $_SESSION['otp'] = $otp;
                        $_SESSION['user_info'] = array(
                            'forename' => $customerForename,
                            'surname' => $customerSurname,
                            'email' => $customerEmail,
                            'dob' => $dateOfBirth,
                            'password' => $password // Store encrypted/hashed password instead
                        );
                    } catch (Exception $e) {
                        $errorMessage = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_otp'])) {
    $entered_otp = $_POST['entered_otp'] ?? '';

    if ($entered_otp == $_SESSION['otp']) {
        // Retrieve user data from session
        $userInfo = $_SESSION['user_info'];
        $hashedPassword = password_hash($userInfo['password'], PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO customers (password_hash, customer_forename, customer_surname, customer_email, date_of_birth) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $hashedPassword, $userInfo['forename'], $userInfo['surname'], $userInfo['email'], $userInfo['dob']);

        // Execute the query
if ($stmt->execute()) {
    echo 'OTP verified. Registration successful.';
    // Clear the session data
    unset($_SESSION['otp'], $_SESSION['user_info']);
    
    // Set the user's forename in the session
    $_SESSION['customer_forename'] = $userInfo['forename'];
    
    // Redirect to the home page
    header('Location: index.php');
    exit; // It's important to call exit after a redirection header
} else {
    $errorMessage = "Error: " . $stmt->error;
}        $stmt->close();
    } else {
        $errorMessage = 'Incorrect OTP.';
    }
}
        ?>

        <!-- Display error message if any -->
        <?php if (!empty($errorMessage)) : ?>
            <p style="color: red;"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <?php if (!$otpSent) : ?>
            <form class="signupForm" action="signup.php" method="post">
                <label for="customer_forename">Forename:</label>
                <input type="text" name="customer_forename" required>
                <br>
                <label for="customer_surname">Surname:</label>
                <input type="text" name="customer_surname" required>
                <br>
                <label for="customer_email">Email:</label>
                <input type="email" name="customer_email" required>
                <br>
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" name="date_of_birth" required>
                <br>
                <label for="password">Password:</label>
<input type="password" name="password" required id="password">
<div class="password-guidelines" id="passwordGuidelines">
    Password must be at least 12 characters long and include at least one uppercase letter, one lowercase letter, one number, and one special character.
</div>
                <input type="submit" name="signup" value="Signup">
            </form>
        <?php endif; ?>

        <?php if ($otpSent) : ?>
            <form action="signup.php" method="post">
                <label for="entered_otp">Enter OTP:</label>
                <input type="text" name="entered_otp" required>
                <input type="submit" name="verify_otp" value="Verify OTP">
            </form>
        <?php endif; ?>
    </div>
<footer>
            <div class="footer-info">
                <div class="footer about">
                    <h2>About Us</h2>
                    <p class="card-content">
                        Vizha is a cultural bridge, connecting communities through the vibrant tapestry of Indian traditions. With a passion for preserving and celebrating India's rich heritage, Vizha curates immersive events, workshops, and festivals in the heart of the United Kingdom. More than just an event organizer, Vizha is a platform for cultural exchange, fostering understanding and unity among diverse audiences. Join us on a journey of discovery, where every event is a celebration of cultural diversity and shared experiences. Welcome to Vizha, where cultures meet, friendships blossom, and understanding thrives.  </p>
                </div>

                <div class="footer about">
                    <h2>Stay Connected With Us</h2>
                    <div class="social-media">
                        <ul>
                            <li><a href="https://www.linkedin.com/in/nagrarepriyanka/"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/nagrarepriyanka/"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/nagrarepriyanka/"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer contact">
                    <h2>Contact Us</h2>
                    <ul>
                        <li>
                            <span><i class="fas fa-map-marker-alt"></i></span>
                            <p>
                                31, Thorntree Drive
                            </p>
                        </li>
                        <li>
                            <span><i class="far fa-envelope"></i></span>
			    <a href="mailto:vizhaevents.LTD@gmail.com">vizhaevents.LTD@gmail.com</a>
                        </li>
                        <li>
                            <span><i class="fas fa-phone-volume"></i></span>
		            <a href="tel:+7818706654">7818706654</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
</body>
</html>