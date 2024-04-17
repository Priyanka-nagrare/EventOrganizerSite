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

    <title>VIZHA</title>  <!---Title of this page-->
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
                <a href="logout.php?redirectUrl=<?php echo urlencode('/KF7013/content/index.php'); ?>" class="action_btn">Logout</a><!--if a customer is logged in the nav bar will show the logout option--->
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
    <li><a href="/KF7013/content/logout.php?redirectUrl=<?php echo urlencode('index.php'); ?>" class="action_btn">Logout</a></li>
    <?php
} else {
    // To Display login and register buttons if the customer is not logged in
    ?>
    <li><a href="/KF7013/content/login.php?redirectUrl=<?php echo urlencode('index.php'); ?>" class="action_btn">LOGIN</a></li>
    <li><a href="/KF7013/content/signup.php" class="action_btn">REGISTER</a></li>
    <?php
}
?>
        </div>
    </header>
    <main>
    <section>                                                                           <!---poster section-->
        <img class="poster" src="/KF7013/assets/images/poster-VIZHA.png" alt="Poster of Vizha"><!---Poster for Vizha refer to credits page {1} for more info-->
        <div class="content">
            <h1>Welcome to Vizha</h1>
            <div id="vizha">
                <a class="button" href="#Whychoosevizha">EXPLORE</a>
            </div>
        </div>
    </section
    </main>

<script src="/KF7013/content/scripts/main.js"></script><!---Javascript for styling menu bar-->
<section class="eventDesc" id="Whychoosevizha">                                                      <!---Below poster section-->
        <h2 class="title1">WHY CHOOSE VIZHA?</h2>
        <div class="card-container">
            <div class="cardd">
                    <img src="/KF7013/assets/images/AuthenticIndianFestivals.jpg" alt="Picture showcasing various food items served in an Indian festival celebration"><!--- Source: (adobe express) refer to credits page for more info-->
                <div class="card-content">
                    <h3 class="cardheader">Authentic Indian Festivals</h3>
                    <p>Vizha is more than an event organizer; it crafts immersive journeys into India's rich traditions, from vibrant festivals
                         to interactive workshops. Dedicated to authenticity, Vizha transports attendees to the colorful streets of India through
                          flavors, music, dance, and rituals. A cultural bridge in the UK, Vizha ensures genuine celebrations, embracing India's
                           essence with understanding and authenticity.</p>
                </div>
            </div>
            <div class="cardd">
    
                    <img src="/KF7013/assets/images/DiverseCommunity.jpg"  alt="Picture showcases diverse people from various communities and backgrounds standing united"><!--- Source: (adobe express) refer to credits page for more info-->
                <div class="card-content">
                    <h3 class="cardheader">Diverse Community</h3>
                    <p>Choosing Vizha means joining a diverse community experience, celebrating a rich tapestry of cultures. 
                        Vizha fosters inclusivity, where differences are embraced, opening doors to meaningful connections and friendships. 
                        More than events, Vizha's platforms encourage dialogue, learning, and acceptance, creating vibrant atmospheres of unity. 
                        Ideal for those seeking a diverse and welcoming community experience.</p>
                </div>
            </div>
            <div class="cardd">
                
                    <img src="/KF7013/assets/images/SpectacularVenue.jpg"  alt="Picture showcases the venue of the events to be held for Vizha"><!--- Source: (adobe express) refer to credits page for more info-->
               
                <div class="card-content">
                    <h3 class="cardheader">Spectacular Venue</h3>
                    <p>Choosing Vizha for its venue means entering a world of unmatched elegance. The Minerva Hall, our selected space, is more than a venue;
                         it's a canvas where events come to life. Its grandeur provides the perfect backdrop for unforgettable experiences.
                         Vizha's commitment to creating magical moments within this splendid setting makes it the ideal choice
                         for those seeking enchanting, visually stunning experiences.</p>
                </div>
            </div>
            <div class="cardd">
                
                    <img src="/KF7013/assets/images/CulturalExchange.jpg"  alt="Picture showcases people from diverse traditions meeting, mingling, and enriching one another."><!--- Source: (adobe express) refer to credits page for more info-->
                              
                <div class="card-content">
                    <h3 class="cardheader">Cultural Exchange</h3>
                    <p>Vizha is a beacon of cultural understanding, offering an authentic platform where diverse traditions enrich one another. 
                        Attendees actively participate in the vibrant tapestry of global cultures, choosing more than just an event. 
                        It's an opportunity to engage, share stories, and form connections that expand horizons, fostering unity in our shared global heritage. 
                        Vizha is the choice for genuine, 
                        immersive cultural exchanges celebrating the beauty of our interconnected world.</p>
                </div>
            </div>
        </div>
        </section>
               <!--List of few upcoming Events in Vizha-->
               <section class="eventDesc">
                <h2 class="title1">OUR UPCOMING EVENTS</h2>
                <div class="events">
                    <figure>
                        <img src="/KF7013/assets/images/diwali.jpg" alt="A family burning crackers and celebrating the diwali event"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Diwali Event</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/holi.jpg" alt="A group of friends lying down on the grass as they are filled with the Holi colours"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Holi Event</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/Navaratri.jpg" alt="A couple playing dandiya on the event of Navratri"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Navratri Event</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/Eid.jpg" alt="A family celebrating on the ocassion of Eid"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Eid Event</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/GaneshChaturthi.jpg" alt="A family setting up the Ganesh idol on the eve of Ganesh chathurthi"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Ganesh Chathurthi Event</a></figcaption>
                    </figure>
                </div>   
                <div class="events">
                    
                    <figure>
                        <img src="/KF7013/assets/images/RakshaBandhan.jpg" alt="A sister tying the raksha bandhan to her brother on Raksha Bandhan event"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Raksha Bandhan Event </a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/Sankranti.jpg" alt="A picture of Kite, which is flied on the ocassion of Makar Sankranti"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Sankranti Event</a></figcaption>
                    </figure>
                </div>
                <div class="events">
                    <figure>
                        <img src="/KF7013/assets/images/Pongal.jpg" alt="Rice and lentils cooked in a pot on the ocassion of pongal"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Pongal Event</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/Onam.jpg" alt="Dancer dancing in the Onam event"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Onam Event</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/Lohri.jpg" alt="Burning of wood as part of Lohri event"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Lohri Event</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/Shivaratri.jpg" alt="God Shiva's image as it suggests the prosperous ocassion of maha shivaratri"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Shivratri Event</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/KarvaChauth.jpg" alt="Husband and wife celebrating Karva chauth"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="/KF7013/content/events.php" class="upcomingevent1">Karva Chauth Event</a></figcaption>
                    </figure>
                 </div>
            </section>
            <section class="eventDesc">
               <!--Venue features of Vizha-->

                <h2 class="title1">VENUE</h2>
    
                <div class="card-container">
                <div class="cardd">
                        <img src="/KF7013/assets/images/VIZHAMAINHALL.jpg" alt="Main hall of the minerva hall where Vizha takes place" ><!--- Source: (adobe express) refer to credits page for more info-->
                    <div class="card-content">
                        <h3 class="cardheader">Main Hall</h3>
                        <p>Vizha's main hall features a dance area with a non-slip floor, a raised platform for visibility, and flexible seating arrangements, 
                            adaptable for diverse events, ensuring a versatile and accommodating space.</p>
                    </div>
                </div>
                <div class="cardd">
       
                        <img src="/KF7013/assets/images/VIZHAFOODAREA.jpg" alt="Food area for Vizha" ><!--- refer to credits page {8} for more info-->
       
                    <div class="card-content">
                        <h3 class="cardheader">Food Area</h3>
                        <p>Vizha boasts a fully equipped kitchen for catering, tables and chairs for communal dining, buffet setups for events, and a designated bar area with proper licenses and facilities, ensuring a comprehensive experience for attendees.</p>
                    </div>
                </div>
                <div class="cardd">
                        <img src="/KF7013/assets/images/VIZHAMEETINGAREA.jpg" alt="Meeting area for Vizha" ><!--- refer to credits page {9} for more info-->
                    <div class="card-content">
                        <h3 class="cardheader"> Meeting Area</h3>
                        <p>"Vizha" has a Small room for private discussions, workshops, or small group meetings and a confrence room equipped with audiovisual facilities for presentations and conferences.</p>
                    </div>
                </div>
                <div class="cardd">
                        <img src="/KF7013/assets/images/VIZHAAMENITIES.jpg"  alt="Amenities of Vizha"><!--- Source: (adobe express) refer to credits page for more info-->
                    <div class="card-content">
                        <h3 class="cardheader">Amenities</h3>
                        <p>Vizha offers event-specific food, snacks, and props. Adequate restrooms, inclusive facilities, coat storage, and dedicated rooms for equipment and decorations. Attendees and organizers enjoy wireless internet access for seamless connectivity.</p>
                    </div>
                </div>
    
                <div class="card-container">
                    <div class="cardd">
                            <img src="/KF7013/assets/images/VIZHAACCESSIBILITYANDSAFETY.jpg"  alt="Accessibility and safety of Vizha"><!--- Source: (adobe express) refer to credits page for more info-->
                        <div class="card-content">
                            <h3 class="cardheader">Accessibility And Safety</h3>
                            <p>"Vizha" has accessibility and safety features like elevators, Adequate fire exits, alarms, and extinguishers to ensure the safety of attendees.
                                surveillance cameras to ensure the safety and security of the attendees and the premises.</p>
                        </div>
                    </div>
                    <div class="cardd">
                            <img src="/KF7013/assets/images/VIZHATECHNICALFACILITIES.jpg"  alt="Technical facilities available in Vizha"><!--- Source: (adobe express) refer to credits page for more info-->
                        <div class="card-content">
                            <h3 class="cardheader">Technical Facilities</h3>
                            <p>Vizha boasts a complete sound system, audiovisual equipment, and proper lighting for announcements, presentations, and ambiance. The venue is equipped with HVAC systems for a comfortable temperature during events.</p>
                        </div>
                    </div>
                    <div class="cardd">
                            <img src="/KF7013/assets/images/VIZHAOUTDOORSPACE.jpg" alt="The outdoor spacing of Vizha"><!--- Source: (adobe express) refer to credits page for more info-->
                        <div class="card-content">
                            <h3 class="cardheader">Outdoor Spaces</h3>
                            <p>Vizha features an outdoor area for relaxation or small events, along with ample parking space. These versatile facilities can be customized to meet the specific needs of events hosted in the Minerva Hall.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <aside>               <!--Aside section showcasing the testimonials of the past customers with respect to their experience with Vizha-->
                <h3>Testimonials</h3>
                <div>
                    <h4>Tanaya Mathew</h4>
                    <img class="testimonialpic"  src="/KF7013/assets/images/tanaya.jpg" alt="AI generated image through adobe express of a female"><!---sourced via adobe express refer to credits page for more info-->
                    <p>"Attending Vizha's festivals was like stepping into a vibrant slice of India right here in the UK. The attention to detail, the authentic flavors, and the warm atmosphere made me feel like I was celebrating Diwali back in Mumbai. I am grateful for the cultural richness Vizha brought into my life."</p>    
                </div>
                <div class="davidTest">
                    <h4>Rajesh Patel</h4>
                    <img class="testimonialpic"  src="/KF7013/assets/images/rajesh.jpg" alt="Indian man"><!--- Source: (adobe express) refer to credits page for more info-->
                    <p>"Vizha doesn't just organize events; they create experiences. As an Indian living abroad, I often miss the festivities from home. Vizha's festivals not only brought back those cherished memories but also introduced me to new traditions. It's a testament to their dedication to preserving our cultural heritage."</p>    
                </div>
            </aside>
            <aside class="aside-left">
                <h3>Testimonials</h3>
                <div>
                    <h4>Sophia clarke</h4>
                    <img class="testimonialpic"  src="/KF7013/assets/images/sophiaclarke.jpg" alt=" Uk Woman"><!--- Source: (adobe express) refer to credits page for more info-->
                    <p>"Vizha has become an integral part of our community. Their events bring everyone together, creating a sense of unity amidst our diverse backgrounds. The cultural exchange fostered by Vizha is invaluable, promoting acceptance and understanding. I eagerly look forward to each event they organize."</p>    
                </div>
                <div class="davidTest">
                    <h4>David Thomson</h4>
                    <img class="testimonialpic"  src="/KF7013/assets/images/davidthomson.jpg" alt=" Uk man"><!--- Source: (adobe express) refer to credits page for more info-->
                    <p>"Attending Vizha's Diwali event was an unforgettable experience. The vibrant atmosphere, rich cultural displays, and warm community spirit made it truly magical. It's more than an event; it's a cultural journey I'll cherish. Vizha has redefined how I perceive Indian festivals in the heart of the UK."</p>    
                </div>
            </aside>
    
                <article>  <!--Get involved section showcases how the customers or general public could get involved with Vizha-->
                    <h2 class="title1">GET INVOLVED</h2>
                    <div class="getInvloved">
                        <ul>
                            <li><h3 class="getInvloved1">Attend Events</h3> The most direct way to get involved is by attending Vizha's events. Whether it's a festival, or performance participating in these events allows individuals to experience the richness of Indian culture firsthand.</li>
                            <li><h3 class="getInvloved1">Volunteer Opportunities</h3>Vizha often seeks volunteers to help organize and manage events. Volunteers play crucial roles in event coordination, assisting with logistics, and ensuring attendees have a seamless experience. Those interested in contributing their time and skills can inquire about volunteer opportunities.</li>
                            <li><h3 class="getInvloved1">Cultural Workshops</h3>Vizha frequently organizes cultural workshops, where individuals can learn various aspects of Indian culture such as traditional dance, cooking, art, or language. Participating in these workshops not only provides knowledge but also supports cultural exchange.</li>
                            <li><h3 class="getInvloved1">Collaborative Projects</h3> Vizha collaborates with artists, performers, and cultural enthusiasts. Individuals with talents in music, dance, arts, or any other cultural expression can explore collaboration opportunities, contributing to Vizha's events and initiatives.</li>
                            <li><h3 class="getInvloved1">Support Local Artisans</h3>Vizha often promotes traditional Indian arts and crafts. Individuals interested in supporting local artisans can participate in related initiatives, purchasing handmade crafts or even organizing events that showcase these artisans' work. </li>
                            <li><h3 class="getInvloved1">Spread the Word</h3>By sharing Vizha's events, initiatives, and cultural content on social media or among friends and family, individuals contribute to increasing awareness and participation. Word-of-mouth recommendations play a significant role in building community engagement.</li>
                            <li><h3 class="getInvloved1">Attend Community Meetings</h3> Vizha might organize community meetings or forums where individuals can voice their ideas, suggestions, or concerns. Actively participating in these discussions helps shape the direction of Vizha's activities and events.</li>
                            <li><h3 class="getInvloved1">Sponsorship and Partnerships</h3>Businesses and organizations interested in promoting cultural diversity can explore sponsorship or partnership opportunities with Vizha. Supporting Vizha financially or through resources enables the organization to enhance its events and outreach efforts.</li>
                           
                        </ul>
           
                     </div>
                     </article>
    
                    
            </section>
    
            <section>
    <!--section shows the images of the Past events of Vizha-->
                <h2 class="title1">EXPLORE OUR PAST EVENTS</h2>
                <div class="events">
                    <figure>
                        <img src="/KF7013/assets/images/pasteventdiwali.jpg" alt="people while celebrating Diwali event"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="" class="upcomingevent1">DIWALI EVENT</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/pasteventsankranti.jpg" alt="Family celebrating Sankranti"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="" class="upcomingevent1">SANKRANTI EVENT</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/pasteventganesh.jpg" alt="Picture of God Ganesh"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="" class="upcomingevent1">GANESH CHATURTHI EVENT</a></figcaption>
                    </figure>
                
                </div>
                
                <div class="events">
                    <figure>
                        <img src="/KF7013/assets/images/pasteventlights.jpg" alt="Girl lighting diwali diyas"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="" class="upcomingevent1">DIWALI EVENT</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/pasteventpongal.jpg" alt="picture of an attendie in pongal event"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="" class="upcomingevent1">PONGAL EVENT</a></figcaption>
                    </figure>
                    <figure>
                        <img src="/KF7013/assets/images/pasteventsikh.jpg" alt="picture of a sikh event"><!--- Source: (adobe express) refer to credits page for more info-->
                        <figcaption class="upcomingevent"><a href="" class="upcomingevent1">SIKH EVENT</a></figcaption>
                    </figure>
       
                 </div>
            </section>
        <!--Footer section-->

    
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
                                <li><a href="https://www.facebook.com/VizhaEventsLTD"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/nagrarepriyanka/"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://www.facebook.com/VizhaEventsLTD"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
    
                    <div class="footer contact">
                        <h2>Contact Us</h2>
                        <ul>
                            <li>
                                <span><i class="fas fa-map-marker-alt"></i></span>
                                <p>
                                    31, Minerva hall, oldcastle, United kingdom
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