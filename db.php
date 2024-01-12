<?php
// Establishing a connection to the MySQL database
$con = mysqli_connect("localhost", "root", "", "register") or die(mysqli_error($con));

// If the connection is successful, $con holds the connection object
// If there's an error in the connection, the script will terminate and display the error message
?>
