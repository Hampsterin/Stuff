<?php
session_start();
include 'dbconnect.php';
if(isset($_POST['btnLogin'])){
    $username = $_POST['ausername'];
    $password = $_POST['apass'];
    $query = "SELECT * FROM staff
                    WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $count = mysqli_num_rows($result); 
    if ($count == 1){
        $_SESSION['id'] = $row["Staff_ID"];
        $_SESSION['username'] = $row["Username"];
        header("Location:AdminDashboard.php"); 
    } else {
        echo '<script>alert("Wrong username/password!!")</script>';
    }
}

if(isset($_POST['btnBack'])){
    header("Location:index.php");
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <title>Admin Login</title>
    <link rel="stylesheet" href="LoginAdmin.css">
</head>
<body style= "background-image: url('./images/3971557.jpg">
    <form action="" method="post">
        <h2>Admin Login</h2>
        <label for="ausername">Admin Username</label>
        <input type="text" name="ausername" placeholder="Username">
        <br>
        <label for="apass">Password</label>
        <input type="password" name="apass" placeholder="Password">
        <br>
        <button type="submit" name="btnLogin">Login</button>
        <button type="submit" value="goback" name="btnBack">Back</button>
    </form>
</body>
</html>