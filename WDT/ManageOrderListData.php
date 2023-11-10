<?php
session_start();
include "dbconnect.php";

$OLD_ID = $_GET['OLD_ID'];
$ELD_ID = $_GET['ELD_ID'];
$Name = $_GET['Name'];
$Dental_Care = $_GET['DentalCare'];
$Bathroom_Products = $_GET['Bathroom_Products'];
$Shower_Amenities = $_GET['Shower_Amenities'];
$Hair_Care = $_GET['Hair_Care'];
$Facial_Care = $_GET['Facial_Care'];
$Lifestyle_Items = $_GET['Lifestyle_Items'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="ManageOrderList.css">
    <title>OrderList Database</title>
</head>
<body>
    <h1>Order List Management </h1>
    <form action="" method="post">
        <div class="inputform">
        ELD_ID = <input type="text" value='<?php echo "$ELD_ID" ?>' name="ELD_ID"> <br>
        Name = <input type="text" value='<?php echo "$Name" ?>' name="Name"> <br>
        Dental Care = <input type="text" value='<?php echo "$Dental_Care" ?>' name="DC"> <br>
        Bathroom Products = <input type="text" value='<?php echo "$Bathroom_Products" ?>' name="BP"> <br>
        Shower Amenities = <input type="text" value='<?php echo "$Shower_Amenities" ?>' name="SA"> <br>
        Hair Care = <input type="text" value='<?php echo "$Hair_Care" ?>' name="HC"> <br>
        Facial Care = <input type="text" value='<?php echo "$Facial_Care" ?>' name="FC"> <br>
        Lifestyle Items = <input type="text" value='<?php echo "$Lifestyle_Items" ?>' name="LI"> <br>
        

        <input type="submit" value="Update Order List" name="btnUpdate">
        <input type="submit" value="Back" name="btnBack">
        </div>
        
    </form>
    <br>
    <br>
<?php if(isset($_POST['btnUpdate'])) {
    $query = "UPDATE `order_list` SET 
    `ELD_ID`='$_POST[ELD_ID]',`Name`='$_POST[Name]',`Dental_Care`='$_POST[DC]',`Bathroom_Products`='$_POST[BP]',
    `Shower_Amenities`='$_POST[SA]',`Hair_Care`='$_POST[HC]',`Facial_Care`='$_POST[FC]',`Lifestyle_Items`='$_POST[LI]' WHERE OLD_ID = $OLD_ID";
    $result = mysqli_query($connection,$query);
    echo '<script>alert(" Record Updated!") </script>';
}

if(isset($_POST['btnBack'])){
    header("Location:OrderListData.php");
}

?>
</body>
</html>