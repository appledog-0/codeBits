<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "finaldata";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

  $url = $_SERVER['REQUEST_URI'];
//   $parts = parse_url($url);
// parse_str($parts['query'], $query);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $lat = $_POST['lat'];
    $long = $_POST['lon'];
    // echo $lat;
    // echo $long;
    $currenttime = date("Y-m-d H:i:s");
    $query = "INSERT INTO `location`(`vehicle`, `time`, `latitude`, `longitude`) VALUES (1,'$currenttime',$lat,$long)";
    //echo $query;

    if (mysqli_query($conn, $query)) {
         echo "New record created successfully";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
 }
    
}

?>