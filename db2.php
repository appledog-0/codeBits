<?php
function OpenCon()
{
$dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "1234";

$dbuser = "root";
$dbpass = "";
$db = "finaldata";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}
  echo "Connected successfully";
return $conn;
}
function CloseCon($conn)
{
$conn -> close();
}

function InsertLocation($lat, $long){
    echo $lat;
    echo $long;

    $conn = OpenCon();

 $query = "INSERT INTO `location`(`vehicle`, `time`, `latitude`, `longitude`) VALUES (1,time(),$lat,$long)";
 if (mysqli_query($conn, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}
}

function GetLocations($id){
    $query = "select * from locations where id="+$id;

}

function test($message){
    echo "test function executed";
}
?>