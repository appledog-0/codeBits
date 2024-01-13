<?php
session_start();

include("db1.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $Email = $_POST['email'];
    $Password = $_POST['password'];

    if (!empty($Email) && !empty($Password) && !is_numeric($Email)) {
        $query = "SELECT * FROM form WHERE email='$Email' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['password'] == $Password) {
                header("location: index.php");
                die;
            }
        }

        echo "<script type='text/javascript'>alert('Wrong username or password')</script>";
    } else {
        echo "<script type='text/javascript'>alert('Please enter valid information')</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ambulance tracking system | log in</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Ambulance Tracking System</title>
</head>
<body style="font-family: tahoma; background-color: #e9ebee;">
    <form method="POST">
        <div id="bar">
            <div style="font-size: 40px;"></div>
        </div>
        <div id="login_bar">
            Log in to Ambulance tracking system<br><br>
            <label>Email</label>
            <input type="email" id="text" placeholder="Email" name="email"><br><br>
            <label>Password</label>
            <input type="password" id="text" placeholder="Password" name="password"><br><br>
            <input type="submit" id="button" value="Log in">
            <br><br><br>
            <p>Don't have an account? <a href="signup.php">Sign up Here</a></p>
        </div>
    </form>
</body>
</html>
