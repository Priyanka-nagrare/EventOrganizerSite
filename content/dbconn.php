<?php
//connect to the database
/* The following statements set up the 4 variables needed to
connect to your account on the MySQL database on nuwebspace.*/
$servername = 'nuwebspace_db';
$username = 'w22057585';
$password = 'gs+XPSK6P8yw';
$dbname = 'w22057585';
$conn = mysqli_connect($servername,$username, $password, $dbname)
or die("Can not connect to DB");
?>