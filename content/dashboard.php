<?php
session_start(); // This should be the very first line of PHP code
require_once("dbconn.php");

if (!isset($_SESSION["customerID"])) {
    header("Location: login.php?redirectUrl=" . urlencode($_SERVER['REQUEST_URI']));
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/KF7013/assets/stylesheets/main.css" />


    <title>BOOKINGS</title>
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
                <a href="/KF7013/content/hello.php" class="action_btn">Hello, <?php echo $customerName; ?></a>
                <a href="/KF7013/content/logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/dashboard.php'); ?>" class="action_btn">Logout</a>
                <?php
            } else {
                // Display login and register buttons if the customer is not logged in
                ?>
                <a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/dashboard.php'); ?>" class="action_btn">LOGIN</a>
                <a href="/KF7013/content/signup.php" class="action_btn">REGISTER</a>
                <?php
            }
            ?>
            <div class="toggle_btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </nav>

        <div class="dropdown_menu">
            <li><a href="hero">HOME</a></li>
            <li><a href="about">ABOUT</a></li>
            <li><a href="services">EVENTS</a></li>
            <li><a href="contact">BOOKINGS</a></li>
            <li><a href="hero">CONTACT US</a></li>
            <li><a href="about">WIREFRAMES</a></li>
            <li><a href="services">CREDITS</a></li>
            <li><a href="contact">FAQ</a></li>
          <?php
// Check if the customer is logged in
if (isset($_SESSION['customer_forename'])) {
    $customerName = $_SESSION['customer_forename'];
    ?>
    <li><a href="/KF7013/content/dashboard.php" class="action_btn">Hello, <?php echo htmlspecialchars($customerName); ?></a></li>
    <li><a href="/KF7013/content/logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/dashboard.php'); ?>" class="action_btn">Logout</a></li>
    <?php
} else {
    // Display login and register buttons if the customer is not logged in
    ?>
    <li><a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/dashboard.php'); ?>" class="action_btn">LOGIN</a></li>
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
<?php
    if (isset($_SESSION["customerID"])) {
        $user_id = $_SESSION["customerID"];

        $sql = "SELECT * FROM customers WHERE customerID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "<div class='welcome-message'>";
            echo "<h1 class='title1'>Welcome, " . htmlspecialchars($user["customer_forename"]) . "!</h1>";
            echo "<p>Your personalised dashboard to explore events and manage bookings.</p>";
            echo "</div>";

            // Fetching bookings from the database
$sqlBookings = "SELECT events.event_title, events.event_date, booking.total_booking_cost, booking.booking_notes FROM booking INNER JOIN events ON booking.eventID = events.eventID WHERE booking.customerID = ?";
$stmtBookings = $conn->prepare($sqlBookings);
$stmtBookings->bind_param("i", $user_id);
$stmtBookings->execute();
$resultBookings = $stmtBookings->get_result();

echo "<div class='bookings'>";
echo "<h2>My Bookings</h2>";
if ($resultBookings->num_rows > 0) {
    while ($booking = $resultBookings->fetch_assoc()) {
        echo "<div class='booking'>";
        echo "<p>Event: " . htmlspecialchars($booking["event_title"]) . "</p>";
        echo "<p>Date of Event: " . htmlspecialchars($booking["event_date"]) . "</p>";
        echo "<p>Total Booking Cost: " . htmlspecialchars($booking["total_booking_cost"]) . "</p>";
        echo "<p>Booking Notes: " . htmlspecialchars($booking["booking_notes"]) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>You have no bookings.</p>";
}
echo "</div>";
            // Add other dashboard options here
            echo "<ul class='bookingButtonAlign'>";
            echo "<li><a class='eventbookingbutton' href='hello.php?logout=true'>View your account details</a></li>";
            echo "<li><a class='eventbookingbutton' href='events.php'>View Events</a></li>";
            echo "</ul>";
        } else {
            echo "<p>User not found!</p>";
        }
    } else {
        header("Location: login.php");
        exit();
    }

    $conn->close();
    ?>
    <!-- Existing footer content -->
</body>
</html><footer>
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