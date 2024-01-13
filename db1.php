<?php
// Establishing a connection to the MySQL database
$con = mysqli_connect("localhost", "root", "", "finaldata") or die(mysqli_error($con));
function InsertLocation($lat, $lon) {
    global $conn; // Access the global database connection variable

    $sql = "INSERT INTO location (latitude, longitude) VALUES ('$lat', '$lon')";

    if ($conn->query($sql) === TRUE) {
        echo "Location inserted successfully";
    } else {
        echo "Error inserting location: " . $conn->error;
    }
}

