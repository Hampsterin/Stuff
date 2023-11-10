<?php
include "dbconnect.php" ;
if(isset($_POST["btnRegister"])){
    $email = $_POST['ueaddress'];
    $sql ="SELECT * FROM elderly where `email` = '$email'";
    $run=mysqli_query($connection,$sql);
    $count=mysqli_num_rows($run);
    if(mysqli_num_rows($run)>0){
        echo '<script>alert("Email already registered.")</script>';
    }else {
        $uname = $_POST['uname'];
        $age = $_POST['uage'];
        $gender = $_POST['gender'];
        if (empty($_POST["ueaddress"])) {
            echo '<script>alert("Email cannot be empty!!")</script>';
          } else {
        $email = $_POST['ueaddress'];
        if (empty($_POST["upass"])) {
            echo '<script>alert("Password cannot be empty!!")</script>';
          } else {
        $password = $_POST['upass'];
        $query ="INSERT INTO `elderly`(`Name`, `Age`, `gender`, `email`, `password`) VALUES 
        ('$uname','$age','$gender','$email','$password')";

        if(mysqli_query($connection,$query) && mysqli_num_rows($run)==0){
            echo '<script>alert("Thanks For Registering!~")</script>';} 
}
}
}
}

if(isset($_POST['btnBack'])){
    echo '<script> function Return() {
        confirms = confirm("Are you sure you want to leave?");
        if (confirms == true) {
            alert("See you next time.");
            window.location.replace("index.php");
        } else {
        }
}
Return();
</script>';
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
    <title>User Registration</title>
    <link rel="stylesheet" href="RegisterUser.css">
</head>
<body>
    <form action="" method="post">
        <h2>User Registration</h2>
        <label for="uname">Name</label>
        <input type="text" name="uname" placeholder="Name">
        <br>
        <label for="uage">Age</label>
        <input type="text" name="uage" placeholder="Age">
        <br>
        <label for="gender">Please select your gender</label>
        <select id="gender" name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <br>
    
        <label for="ueaddress">Email Address</label>
        <input type="text" name="ueaddress" placeholder="Email Address">
        <br>
        <label for="upass">Password</label>
        <input type="password" name="upass" placeholder="Password">
        <br>
        <button type="submit" value="signup" name="btnRegister">Sign Up</button>
        <button type="submit" value="goback" name="btnBack">Back</button>
    </form>
</body>
</html>

