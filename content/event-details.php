<?php
session_start(); // To  Start the session such that the user-specific information across multiple pages is maintained.
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <!---This is the font awesome library for icons for this website-->
    <link rel="stylesheet" href="/KF7013/assets/stylesheets/main.css" />  <!---This is the CSS stylesheet for styling the HTML across all pages for this website-->

    <title>EVENTS DETAILS PAGE</title><!---Title of this page-->
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
<a href="/KF7013/content/logout.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="action_btn">Logout</a>
                <?php
            } else {
                // To Display login and register buttons if the customer is not logged in
                ?>
<a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="action_btn">LOGIN</a>
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
<a href="/KF7013/content/logout.php?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="action_btn">Logout</a>
    <?php
} else {
    // Display login and register buttons if the customer is not logged in
    ?>
<a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="action_btn">LOGIN</a>
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
    <section class="event-card">
<?php
// for getting the database connection
include 'dbconn.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// To get the eventID from database
$eventID = $_GET['eventID'] ?? null;

// To get the event details from the database if eventID is set and get an individual event page
if ($eventID !== null) {
    $sql = "SELECT * FROM events WHERE eventID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventID);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "Event not found or invalid event ID.";
}

// To get the event details from the database
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h2 class='event-title'>" . htmlspecialchars($row["event_title"]) . "</h2>";
    echo "<img src='" . htmlspecialchars($row["event_imagepath"]) . "' alt='Event Image' class='event-image'>";
    echo "<p class='event-description'>" . nl2br(htmlspecialchars($row["Overview"])) . "</p>";
    echo "<p><h3>Event Date:</h3> " . htmlspecialchars($row["event_date"]) . "</p>";
    echo "<p><h3>Start Time:</h3> " . htmlspecialchars($row["start_time"]) . "</p>";
    echo "<p><h3>End Time:</h3> " . htmlspecialchars($row["end_time"]) . "</p>";
    echo "<p><h3>Location:</h3> " . htmlspecialchars($row["location"]) . "</p>";
    echo "<p><h3>Price per Person :</h3> &pound " . htmlspecialchars($row["price_per_person"]) . "</p>";
    echo "<p><h3>Price for Family :</h3> &pound " . htmlspecialchars($row["Price_for_family"]) . "</p>";
    echo "<p><h3>Contact Email:</h3> " . htmlspecialchars($row["contact_email"]) . "</p>";
    echo "<p><h3>Contact Phone:</h3> " . htmlspecialchars($row["contact_phone"]) . "</p>";
    echo "<p><h3>Transportation Info:</h3> " . nl2br(htmlspecialchars($row["transport_info"])) . "</p>";
    echo "<p><h3>Accommodation Info:</h3> " . nl2br(htmlspecialchars($row["accommodation_info"])) . "</p>";
    echo "<p><h3>Accessibility Info:</h3> " . nl2br(htmlspecialchars($row["accessibility_info"])) . "</p>";
    echo "<p><h3>COVID Measures:</h3> " . nl2br(htmlspecialchars($row["covid_measures"])) . "</p>";
    echo "<p><h3>Cancellation Policy:</h3> " . nl2br(htmlspecialchars($row["cancellation_policy"])) . "</p>";
    echo "<p><h3>FAQ:</h3> " . nl2br(htmlspecialchars($row["faq"])) . "</p>";
    echo "<p><h3>Social Media Links:</h3> " . nl2br(htmlspecialchars($row["social_media_links"])) . "</p>";
} else {
    echo "Event not found.";
}

$conn->close();

// To check if the user is logged in and display the booking form
if (isset($_SESSION['customerID'])) {
    ?>
    <!-- Booking Form -->
    <form action='create_booking.php' method='post'>
        <input type='hidden' name='eventID' value='<?php echo htmlspecialchars($eventID); ?>'>
        <label for='number_people'>Number of People:</label>
        <input type='number' id='number_people' name='number_people' min='1' required>
        
        <label for='booking_notes'>Additional Notes:</label>
        <textarea id='booking_notes' name='booking_notes'></textarea>

        <input type='submit' value='Book Now'>
    </form>
    <?php
} else {
$redirectUrl = "event-details.php?eventID=" . $eventID;
echo "<p>Please <a href='login.php?redirectUrl=" . urlencode($redirectUrl) . "'class='eventbookingbutton'>login</a> to make a booking.</p>";
}

echo "<a href='events.php' class='btn btn-back'>Back to Events</a>";
?>
    </section>
<!---footer section-->

   <footer>
            <div class="footer-info">
                <div class="footer about">
                    <h2>About Us</h2>
                    <p>
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