<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "finaldata";
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

    $query  = "SELECT * FROM location order by time";

?>

    <table border=1>
    <tr>
        <th>Time</th><th>Vehicle ID</th><th>Lattitude</th><th>Longitude</th>
    </tr>
    <?php
    if ($result = $conn -> query($query)) {
        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $vehicle = $row["vehicle"];
            $time = $row["time"];
            $lat = $row["latitude"];
            $long = $row["longitude"];
           echo '<tr><td>'.$time.'</td><td>'.$vehicle.'</td><td>'.$lat.'</td><td>'.$long.'</tr>';
        }
        $result->free();
    }
    ?>
    </table>