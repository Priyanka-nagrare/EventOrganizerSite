<?php
session_start(); // Start the session
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />  <!---This is the font awesome library for icons for this website-->
    <link rel="stylesheet" href="/KF7013/assets/stylesheets/main.css" />  <!---This is the CSS stylesheet for styling the HTML across all pages for this website-->

    <title>FAQ</title><!---Title of this page-->
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
                <a href="/KF7013/content/logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/faq.php'); ?>" class="action_btn">Logout</a><!--if a customer is logged in the nav bar will show the logout option--->
                <?php
            } else {
                // To Display login and register buttons if the customer is not logged in
                ?>
                <a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/faq.php'); ?>" class="action_btn">LOGIN</a><!---A login page that will allow users to log onto and use the website-->
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
    <li><a href="/KF7013/content/logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/faq.php'); ?>" class="action_btn">Logout</a></li>
    <?php
} else {
    // Display login and register buttons if the customer is not logged in
    ?>
    <li><a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/faq.php'); ?>" class="action_btn">LOGIN</a></li>
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
    <section class="faq-section">
        <h1>Frequently Asked Questions - Vizha</h1>
        
        <div class="faq">
            <h2>General Information</h2>
            <p><h3>What is Vizha?</h3><br>Vizha is a premier event hosting venue located in the heart of Oldcastle city, United Kingdom. It specializes in curating diverse cultural events, particularly focusing on Indian culture.</p>
            <p><h3>Where is Vizha's venue located?</h3><br>Vizha's venue, the Minerva Hall, is situated in the heart of the UK, in Oldcastle city.</p>
        </div>

        <div class="faq">
            <h2>Event Participation and Booking</h2>
            <p><h3>What types of events does Vizha host?</h3><br>Vizha hosts a wide range of events, including festivals, workshops, traditional music and dance performances, storytelling sessions, and more, all centered around Indian culture.</p>
            <p><h3>How can I attend Vizha events?</h3><br>You can attend Vizha events by booking tickets through their website or by visiting the venue directly.</p>
            <p><h3>Can I host my own cultural events at Vizha?</h3><br>Yes, you can. The Minerva Hall can be booked for private functions, allowing individuals and organizations to host their own cultural events at the venue. Please contact Minerva Hall's number 999888777556 for private events.</p>
            <p><h3>Is there a dress code for Vizha events?</h3><br>Vizha events may have specific dress codes for certain occasions, so it's a good idea to check the event details on their website or contact their customer support for dress code information.</p>
            <p><h3>Can I bring children to Vizha events?</h3><br>Many Vizha events are family-friendly, but it's advisable to check the event descriptions for age-appropriateness or contact Vizha for more information on age restrictions.</p>
            <p><h3>Are food and beverages available at Vizha events?</h3><br>Vizha often offers delicious Indian cuisine and beverages at their events. You can check the event details to see if food and beverages are included or available for purchase.</p>
            <p><h3>Is parking available at the venue?</h3><br>Vizha's venue, the Minerva Hall, may have parking facilities. It's recommended to check their website or contact the venue for information on parking availability and fees.</p>
            <p><h3>What happens if I arrive late to an event?</h3><br>While Vizha encourages punctuality, if you arrive late to an event, you can typically enter during a suitable break in the program. However, it's best to arrive on time to fully enjoy the event.</p>
            <p><h3>Can I take photographs or videos during the event?</h3><br>Vizha may have specific policies regarding photography and videography at their events. It's a good idea to check with event staff or on their website for any restrictions or guidelines.</p>
            <p><h3>Are there any opportunities for audience participation during the events?</h3><br>Some Vizha events encourage audience participation, while others may be more focused on observation. You can check the event description or ask event staff for details on audience involvement.</p>
        </div>

        <div class="faq">
            <h2>Cultural and Community Involvement</h2>
            <p><h3>Is Vizha exclusively for the Indian community?</h3><br>No, Vizha is open to everyone. It welcomes people from all backgrounds and cultures who are interested in experiencing and celebrating Indian culture.</p>
            <p><h3>Does Vizha offer educational initiatives?</h3><br>Yes, Vizha conducts educational initiatives, such as cultural workshops and storytelling sessions, to provide insights into the rich heritage of India.</p>
            <p><h3>How can I get involved with Vizha's community?</h3><br>Attendees can connect with like-minded individuals during Vizha's events, forming friendships and networks that extend beyond the events themselves.</p>
            <p><h3>Does Vizha support cultural heritage preservation?</h3><br>Yes, Vizha actively supports cultural heritage preservation initiatives by partnering with heritage organizations, museums, and artisans to promote traditional arts and crafts, ensuring the sustainability of India's rich cultural heritage.</p>

        </div>

        <div class="faq">
            <h2>Feedback and safety</h2>
            <p><h3>How can I provide feedback to Vizha?</h3><br>Vizha values feedback from attendees and takes suggestions seriously to enhance their events and initiatives. You can typically provide feedback through their website or at the events.</p>
            <p><h3>How can I provide feedback or suggestions about my event experience?</h3><br>Vizha welcomes feedback from attendees. You can typically provide feedback through their website or by reaching out to event staff on the day of the event.</p>
            <p><h3>What COVID-19 safety measures are in place at Vizha events?</h3><br>In light of current health concerns, Vizha may have specific safety measures in place, such as mask requirements or social distancing. It's important to check their website or contact them for information on COVID-19 precautions before attending an event.</p>
        </div>
         <div class="faq">
            <h2>Ticketing and booking</h2>
            <p><h3>How can I purchase tickets for Vizha events?</h3><br>You can purchase tickets for Vizha events through their website or at the venue's ticket counter, if available.</p>
        </div>


    </section>

    <!-- Footer -->
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
