<?php
session_start();
require_once("dbconn.php"); // Ensure this points to your database connection file

$customerID = $_SESSION['customerID']; // Get customer ID from session
$query = $conn->prepare("SELECT customer_forename, customer_surname, customer_email, date_of_birth FROM customers WHERE customerID = ?");
$query->bind_param("i", $customerID);
$query->execute();
$result = $query->get_result();

if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
} else {
    // Handle error - Customer not found
    die("Customer not found: " . $conn->error);
}

// Check if date_of_birth is retrieved correctly
if (isset($row['date_of_birth']) && !empty($row['date_of_birth'])) {
    // Display the DOB
    $dob = date('Y-m-d', strtotime($row['date_of_birth'])); // Format if needed
} else {
    $dob = "Not available"; // Or any other message you prefer
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <!---This is the font awesome library for icons for this website-->
    <link rel="stylesheet" href="/KF7013/assets/stylesheets/main.css" />  <!---This is the CSS stylesheet for styling the HTML across all pages for this website-->

    <title>MY ACCOUNT</title>
  </head>
  <body>
    <header class="navHeader">  <!---Nav bar section for the website-->
        <nav class="navbar">
            <div class="logo"><a href="/KF7013/content/index.php">VIZHA</a></div>
            <ul class="links">
                <li><a href="/KF7013/content/index.php">HOME</a></li>  <!---The main home page with the navigation area-->
                <li><a href="/KF7013/content/about.php">ABOUT</a></li>  <!---This page tells more about what exactly is Vizha and its details-->
                <li><a href="/KF7013/content/events.php">EVENTS</a></li>  <!---The event listing page which links to the events table in the database and displays the contents of the events table in a suitable usable format, Further it has buttons which will redirect the customer to the events details page where the booking form is integrated-->
                <li><a href="/KF7013/content/dashboard.php">BOOKINGS</a></li><!---The dashboard for the user to  check their bookings-->
                <li><a href="/KF7013/content/contactus.php">CONTACT US</a></li><!---A registered customer or a non-registered customer could use this link to contact us, this data is again stored in the contactus table in PHP-->
                <li><a href="/KF7013/content/wireframe.pdf">WIREFRAMES</a></li><!---The PDF which will showcase the wireframe of the website-->
                <li><a href="/KF7013/content/credits.php">CREDITS</a></li><!---This page showcases the credits for this website-->
                <li><a href="/KF7013/content/faq.php">FAQ</a></li><!---This page answers all the questions which a new customer might have upon seeing our website-->
        
            </ul>
            <?php
            // To Check if the customer is logged in
            if (isset($_SESSION['customer_forename'])) {
                $customerName = $_SESSION['customer_forename'];
                ?>
                <a href="/KF7013/content/hello.php" class="action_btn">Hello, <?php echo $customerName; ?></a> <!---If a customer is already logged in the nav bar will show the first name of the customer on top of the screen-->
                <a href="/KF7013/content/logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/index.php'); ?>" class="action_btn">Logout</a><!--if a customer is logged in the nav bar will show the logout option--->
                <?php
            } else {
                // To Display login and register buttons if the customer is not logged in
                ?>
                <a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/index.php'); ?>" class="action_btn">LOGIN</a><!---A login page that will allow users to log onto and use the website-->
                <a href="/KF7013/content/signup.php" class="action_btn">REGISTER</a><!---The customer registration page which allows to insert a new customer’s details into the customers table in the database-->
                <?php
            }
            ?>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i> <!---Styling of menu button for mobile view-->
            </div>
        </nav>

        <div class="dropdown_menu"><!---Nav bar section for responsiveness on other devices/screens-->
            <<li><a href="/KF7013/content/index.php">HOME</a></li>  <!---The main home page with the navigation area-->
                <li><a href="/KF7013/content/about.php">ABOUT</a></li>  <!---This page tells more about what exactly is Vizha and its details-->
                <li><a href="/KF7013/content/events.php">EVENTS</a></li>  <!---The event listing page which links to the events table in the database and displays the contents of the events table in a suitable usable format, Further it has buttons which will redirect the customer to the events details page where the booking form is integrated-->
                <li><a href="/KF7013/content/dashboard.php">BOOKINGS</a></li><!---The dashboard for the user to  check their bookings-->
                <li><a href="/KF7013/content/contactus.php">CONTACT US</a></li><!---A registered customer or a non-registered customer could use this link to contact us, this data is again stored in the contactus table in PHP-->
                <li><a href="/KF7013/content/wireframe.pdf">WIREFRAMES</a></li><!---The PDF which will showcase the wireframe of the website-->
                <li><a href="/KF7013/content/credits.php">CREDITS</a></li><!---This page showcases the credits for this website-->
                <li><a href="/KF7013/content/faq.php">FAQ</a></li><!---This page answers all the questions which a new customer might have upon seeing our website-->
        
          <?php
// To Check if the customer is logged in
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
    <section><!---poster section-->
        <img class="posterabout" src="/KF7013/assets/images/posterabout.png" alt="the poster from home page but only half of it to give a better designed view"> <!---sourced via adobe express refer to credits page-->
    </section>
    </main>
<script src="/KF7013/assets/scripts/main.js"></script><!---Javascript for styling menu bar-->
<body>
    <div class="contact-form-section">
        <h2>My Account</h2>
        <form class="account-form">
            <label for="forename">First Name</label>
            <input type="text" id="forename" name="customer_forename" value="<?php echo htmlspecialchars($row['customer_forename']); ?>" readonly>

            <label for="surname">Last Name</label>
            <input type="text" id="surname" name="customer_surname" value="<?php echo htmlspecialchars($row['customer_surname']); ?>" readonly>

            <label for="email">Email</label>
            <input type="email" id="email" name="customer_email" value="<?php echo htmlspecialchars($row['customer_email']); ?>" readonly>

            <label for="dob">Date of Birth</label>
            <input type="text" id="dob" name="date_of_birth" value="<?php echo htmlspecialchars($dob); ?>" readonly>
        </form>
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