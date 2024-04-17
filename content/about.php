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

    <title>ABOUT</title><!---Title of this page-->
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
                <a href="/KF7013/content/logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/about.php'); ?>" class="action_btn">Logout</a><!--if a customer is logged in the nav bar will show the logout option--->
                <?php
            } else {
                // To Display login and register buttons if the customer is not logged in
                ?>
                <a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/about.php'); ?>" class="action_btn">LOGIN</a><!---A login page that will allow users to log onto and use the website-->
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
    <li><a href="/KF7013/content/logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/about.php'); ?>" class="action_btn">Logout</a></li>
    <?php
} else {
    // Display login and register buttons if the customer is not logged in
    ?>
    <li><a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('/KF7013/content/about.php'); ?>" class="action_btn">LOGIN</a></li>
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

    <h1 class="title1">ABOUT US</h1><!---The section which explains what exactly is Vizha-->
    <div class="aboutvizha">
        <p>Welcome to Vizha, a premier event hosting venue nestled in the heart of Oldcastle city, United Kingdom. Our exquisite city performance hall serves as a vibrant hub for celebrating the rich tapestry of Indian culture. Here at Vizha, 
            we specialize in curating a diverse range of events that cater to families, children, couples, and individuals of all ages. From the colorful festivities of Diwali to the rhythmic celebrations of Navratri, our venue comes alive
             with the spirit of India's most cherished festivals. 
            Our hall, blending modern amenities with traditional Indian aesthetics, creates an inviting atmosphere, ensuring every attendee feels at home. Vizha's brand personality exudes warmth, inclusivity, and cultural richness. 
            We're not just an entertainment venue; we're a cultural bridge, bringing the Indian diaspora and the wider UK community together. To meet our needs, we require a website that reflects our diverse events,
             showcases our venues elegance, and emphasizes the educational and enriching experiences we offer. The website will serve as a seamless platform, allowing attendees to explore our events, book tickets, 
            and immerse themselves in the vibrant cultural heritage of India. Join us at Vizha, where every event is a celebration of unity, diversity, and the joy of cultural exchange.
            </p>
<img src="/KF7013/assets/images/about1.jpg" alt="A picture in which there are couple of hands holding holi colours"> <!---sourced via adobe express refer to credits page-->
<img src="/KF7013/assets/images/about3.jpg" alt="A picture of venue of the Minerva hall from one of the events"> <!---sourced via adobe express refer to credits page-->
<img src="/KF7013/assets/images/about4.jpg" alt="A picture of a couple from one of the past events"> <!---sourced via adobe express refer to credits page-->

        <p>At Vizha, we're on a mission to bridge cultures and create connections. We're a passionate team dedicated to bringing the vibrant tapestry of Indian festivals and traditions to the heart of the United Kingdom. Through meticulously curated events and celebrations, we offer an authentic experience of India's rich cultural heritage.

            What sets us apart is our commitment to inclusivity. Whether you're a member of the Indian community seeking a taste of home or a curious soul from the UK eager to explore diverse traditions, you're welcome here. We're not just an events organizer; we're a cultural bridge, fostering understanding, respect, and unity among communities.
            
            Come join us in this exciting journey of cultural discovery. Let's celebrate diversity, foster friendships, and build a world where every culture is appreciated and embraced. Welcome to Vizha where cultures meet, memories are made, and understanding blossoms.</p>
    
    </div>
    
    <h2 class="title1">OUR PEOPLE</h2><!---The section which explains the people of Vizha-->
    <div class="aboutcard-container">
        <div class="aboutcard">
            <img src="/KF7013/assets/images/P.png" alt="Picture of Cultural Engagement Specialist"><!---design asset sourced via adobe express refer to credits page-->
            <div class="aboutcard-content">
                <h3 class="aboutcardheader">PRIYANKA</h3>
                <p>Priyanka is our Cultural Engagement Specialist, who is a key leader responsible for fostering cultural understanding and engagement by further curating immersive events, workshops, and festivals, ensuring each experience is a celebration of diverse cultures and shared traditions.</p>
            </div>
        </div>
        <div class="aboutcard">
            <img src="/KF7013/assets/images/S.jpeg" alt="Picture of Digital Outreach Specialist"><!---design asset sourced via adobe express refer to credits page-->
            <div class="aboutcard-content">
                <h3 class="aboutcardheader">SHREYA</h3>
                <p>Shreya acts as our Vizha's Digital Outreach Specialist who is responsible for expanding the organization's online presence. She manages social media, engages with the audience, and shares cultural insights, fostering a global community interested in cultural diversity and Vizha's initiatives.</p>
            </div>
        </div>
        <div class="aboutcard">
            <img src="/KF7013/assets/images/U1.png" alt="Picture of Event Experience Coordinator"><!---design asset sourced via adobe express refer to credits page-->
            <div class="aboutcard-content">
                <h3 class="aboutcardheader">UDAY</h3>
                <p>Uday is our Event Experience Coordinator at Vizha who focuses on creating exceptional event experiences. By overseeing the planning, organization, and execution of events, ensuring each gathering is memorable, inclusive, and reflective of Vizha's cultural mission.</p>
            </div>
        </div>
        <div class="aboutcard">
            <img src="/KF7013/assets/images/A.png"  alt="Picture of Community Relations Manager"><!---design asset sourced via adobe express refer to credits page-->
            <div class="aboutcard-content">
                <h3 class="aboutcardheader">Abhisheak</h3>
                <p>Abhisheak is our Vizha's Community Relations Manager who is dedicated to building meaningful relationships within the community. He connects with individuals, organizations, and partners, fostering collaborations that promote cultural exchange and unity.</p>
            </div>
        </div>
    </div>

<div class="clearfix"></div>

<div style="padding:6px;">

    <h2 class="title1">THE IDEA BEHIND VIZHA</h2>
    <div class="aboutvizha">
        <P> The idea behind Vizha is to bring the vibrant and diverse culture of India right into the heart of the United Kingdom. It's like a lively cultural festival that happens all year round. Imagine attending colorful Indian festivals, tasting delicious Indian cuisine, enjoying traditional music and dance performances, and learning about the fascinating customs of India, all within the UK.

            But Vizha is more than just festivities; it's about creating a warm and inviting space for everyone. Whether you're from India, the UK, or anywhere else, Vizha welcomes you to experience the magic of Indian culture. It's a place where communities come together, friendships are formed, and understanding between different cultures blossoms.
            
            Picture a place where you can immerse yourself in the lively spirit of India, where every event feels like a joyful celebration, and where learning about different traditions is as easy as attending an event. That's the essence of Vizha: a cultural hub where people can connect, celebrate, and embrace the beauty of diversity.</P>    
<img src="/KF7013/assets/images/about5.jpg" alt="People holding puzzles to specify the idea"> <!---sourced via adobe express refer to credits page-->
<img src="/KF7013/assets/images/about6.jpg" alt="A girl wondering signifying how we got the idea for Vizha"> <!---sourced via adobe express refer to credits page-->
<img src="/KF7013/assets/images/about7.jpg" alt="A picture showcasing togetherness"> <!---sourced via adobe express refer to credits page-->

  
  </div>
    
    <h2 class="title1">INTEGRATING CULTURES</h2>
    <div class="aboutvizha">
  <img src="/KF7013/assets/images/about19.jpg" alt="A picture depicting the meaning of integrating cultures"> <!---sourced via adobe express refer to credits page-->
        <p>At Vizha, our essence lies in the seamless integration of cultures. We believe that the beauty of the world truly shines when diverse cultures come together. Through our events and initiatives, we create a melting pot where traditions from India and the United Kingdom blend harmoniously. It's not just about showcasing the colors and flavors of India in the UK; it's about intertwining traditions, fostering understanding, and building bridges between communities. Vizha is where cultural integration thrives, creating a tapestry of shared experiences, enriching everyone involved. Join us in this journey of harmony, where every connection made strengthens the bond between cultures.
        </p>
    </div>
    
    <h2 class="title1">VISION AND MISSION</h2>

    <div class="aboutvizha">
        <h3 class="vision">VISION: Empowering Unity Through Cultural Harmony</h3>
        <p>Our vision at Vizha is simple yet profound: we aspire to empower unity through cultural harmony. We believe that by embracing the rich tapestry of cultures, we can create a world where diversity is celebrated, understood, and cherished.</p>    
        <p>Our mission is to bring people together. At Vizha, we are dedicated to building bridges between the Indian community and the broader society in the UK. Through our events and initiatives, we aim to create lively spaces where cultures merge, fostering connections, understanding, and respect. We want to enable conversations, inspire friendships, and pave the way for a future where every culture is valued, appreciated, and integrated into our collective tapestry of humanity.</p>
    </div>

    <h2 class="title1">HOW DOES VIZHA WORK?</h2>

<div class="aboutgrid-container">
  <div class="aboutgrid-item">Event Curation: We meticulously curate a variety of events, from vibrant festivals to interactive workshops, designed to showcase different aspects of Indian culture. These events are held in our welcoming venue, the Minerva Hall, located in the heart of the UK 
  <img src="/KF7013/assets/images/about8.jpg" alt="A picture of an elephant which signifies th evibancy of indian culture"> <!---sourced via adobe express refer to credits page-->
</div>
  <div class="aboutgrid-item">Inclusivity: Vizha is open to everyone. Whether you're from India, the UK, or any corner of the world, you're invited to join our celebrations. Our events are crafted to appeal to diverse audiences, ensuring that everyone feels included.
   <img src="/KF7013/assets/images/about9.jpg" alt="A picture showcasing smiles of women signifying inclusivity"> <!---sourced via adobe express refer to credits page-->
</div>
  <div class="aboutgrid-item">Cultural Immersion: Attendees get the chance to immerse themselves in the colors, flavors, music, and traditions of India. From traditional dance performances to hands-on cooking classes, each event offers a unique window into Indian culture.
   <img src="/KF7013/assets/images/about17.jpg" alt="A picture showcasing laughter signifying cultural immersion"> <!---sourced via adobe express refer to credits page-->
 </div>  
  <div class="aboutgrid-item">Educational Initiatives: We go beyond celebrations. Vizha conducts educational initiatives, such as cultural workshops and storytelling sessions, to provide insights into the rich heritage of India. Learning and understanding are at the core of our mission.
    <img src="/KF7013/assets/images/about11.jpg" alt="A picture of a cultural workshop embracing educational initiative"> <!---sourced via adobe express refer to credits page-->
</div>
  <div class="aboutgrid-item">Community Building: Vizha is a hub for community building. Attendees connect with like-minded individuals, forming friendships and networks that go beyond the events. We believe that shared cultural experiences create strong bonds among people.
    <img src="/KF7013/assets/images/about12.jpg" alt="A picture of individuals forming friendships"> <!---sourced via adobe express refer to credits page-->
</div>
  <div class="aboutgrid-item">Booking the Venue: In addition to our curated events, the Minerva Hall can be booked for private functions. It's a versatile space where individuals and organizations can host their own cultural events, further enriching the community experience.
    <img src="/KF7013/assets/images/about13.jpg" alt="A picture of the venue of vizha"> <!---sourced via adobe express refer to credits page-->
</div>  
  <div class="aboutgrid-item">Feedback and Improvement: We value feedback. Attendees' opinions and suggestions are taken seriously, helping us enhance our events and initiatives. Continuous improvement is key to creating meaningful and memorable experiences.
    <img src="/KF7013/assets/images/about14.jpg" alt="a picture signifying continuous improvement"> <!---sourced via adobe express refer to credits page-->
</div>
  <div class="aboutgrid-item">Cultural Heritage Preservation: Vizha actively supports cultural heritage preservation initiatives. We partner with heritage organizations, museums, and artisans to promote traditional arts and crafts, ensuring that ancient practices are not lost to time. By providing a platform for artisans, we contribute to the preservation and sustainability of India's rich cultural heritage.
    <img src="/KF7013/assets/images/about15.jpg" alt="A picture showcasing promotion of traditional arts"> <!---sourced via adobe express refer to credits page-->
</div>
  <div class="aboutgrid-item"> Interactive Engagement: Vizha encourages interactive engagement. Attendees don't just observe; they actively participate. From traditional art exhibitions to collaborative community projects, there's always a chance to get involved, ensuring a hands-on and engaging cultural experience.
    <img src="/KF7013/assets/images/about16.jpg" alt="A picture showcasing interactive engagement by the participants"> <!---sourced via adobe express refer to credits page-->
</div>  
</div>
</div>
<!---Footer section-->
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