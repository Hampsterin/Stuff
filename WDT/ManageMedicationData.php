<?php
session_start();
include "dbconnect.php";

$MED_ID = $_GET['MED_ID'];
$Name = $_GET['Name'];
$Quantity = $_GET['Quantity'];
$Price = $_GET['Price'];
$Alias = $_GET['Alias'];
$Recommended_Usage = $_GET['Recommended_Usage'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="ManageMedication.css">
    <title>Medication Database</title>
</head>
<body>
<h1>Medication Management Page </h1>
<form action="" method="post">
<div class="inputform">
    Name = <input type="text" value='<?php echo "$Name" ?>' name="Name"> <br>
    Quantity = <input type="text" value='<?php echo "$Quantity" ?>' name="Quantity"> <br>
    Price = <input type="text" value='<?php echo "$Price" ?>' name="Price"> <br>
    Alias = <input type="text" value='<?php echo "$Alias" ?>' name="Alias"> <br>
    Recommended_Usage = <input type="text" value='<?php echo "$Recommended_Usage" ?>' name="Recommended_Usage"> <br>
        <input type="submit" value="Update Elderly" name="btnUpdate">
        <input type="submit" value="Back" name="btnBack">
        </div>
    </form>
    <br>
    <br>
<?php 
if(isset($_POST['btnUpdate'])) {
    $query = "UPDATE medication SET `Name` ='$_POST[Name]',`Quantity`='$_POST[Quantity]',
    `Price`='$_POST[Price]',`Alias`='$_POST[Alias]',`Recommended_Usage`='$_POST[Recommended_Usage]' WHERE MED_ID = $MED_ID";
    $result = mysqli_query($connection,$query);
    echo '<script>alert(" Record Updated!") </script>';
}

if(isset($_POST['btnBack'])){
    header("Location:Medication.php");
}
?>
</body>
</html>