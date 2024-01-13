<?php
session_start();

include("db1.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Firstname = $_POST['fname'];
    $Lastname = $_POST['lname'];
    $Gender = $_POST['gender'];
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    // Use correct variable names in the query
    $query = "INSERT INTO form(fname, lname, gender, email, password) VALUES ('$Firstname', '$Lastname', '$Gender', '$Email', '$Password')";

    // Check if the query was successful
    if (mysqli_query($con, $query)) {
        echo "<script type='text/javascript'>alert('Successfully Register')</script>";
    } else {
        // If there was an error in the query, you might want to display an error message
        echo "<script type='text/javascript'>alert('Error: " . mysqli_error($con) . "')</script>";
    }
}
?>


<!DOCTYPE html>
<html>
    <head><title>Ambulance tracking system | signup</title></head>
    <head>
        <style>
               .error{
            color: red;
            margin: 0px;
        }
        </style>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Ambulance Tracking System</title>
    </head>
    <body>
    
    <header>
        <h1>Ambulance Tracking System</h1>
    </header>
    
    <nav>
        <ul>
            <li><a href="homepage.html">Home</a></li>
            <li><a href="map.html">Map</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="signup.html">Sign Up</a></li>
        </ul>
    </nav>
    <body style="font-family: tahoma; background-color: #e9ebee;">
        <div id="bar" >
          <div style=" font-size: 40px;"></div>
            
        </div>
        <div id="login_bar">
            <form method="POST">

            Sign up to Ambulance tracking system<br><br>
            <label for="User"> Firstname
            <input type="text" id="User" placeholder="Firstname" name="fname"><br><br> 
            Lastname
            <input type="text" id="User" placeholder="Lastname" name="lname"><br><br>
            <p class="error" id="Usererror"></p>
            </label>
            <label >Gender</label>
            <input type="text" name="gender" required><br><br>
            <label for="Email">Email 
            <input type="email" id="Email" placeholder="Email" name="email"><br><br>
            <p class="error" id="Emailerror"></p>
        </label>
        <label for="Password">Password
            <input type="password" id="Password" placeholder="Password" name="password"><br><br>
            <p class="error" id="Passworderror"></p>
        </label>
        <label for="CPassword">
            <input type="password" id="CPassword" placeholder="retype password"><br><br>
            </label>
            <input type="submit" id="button" value="Sign up">
               <br><br><br>   
               <p>Already have an account? <a href="login.php">Login Here</a></p>
               <script src="form3.js"></script>
        </div>
        
    </body>
</html>
