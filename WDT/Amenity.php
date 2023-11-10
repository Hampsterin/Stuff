<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/favicon.ico">
    <link rel="stylesheet" href="Amenity.css">
    <title>Amenity Database</title>
</head>

<?php
include 'AdminHeader.php';
?>

<body>
    <div class="searchingbox">
    <form action="" method="post">
            Type the ID you would like to search = <input type="text" name="ID">
            <input type="submit" value="Search" name="btnSearch">
        <form action="" method="post">
            <input type="submit" value="Reset" name="btnReset">
        </form>
    </div>

<?php
include 'dbconnect.php';
$query2 = 'SELECT * FROM Amenity';

if(isset($_POST['btnSearch'])) {
    $dataid = $_POST["ID"];
    $query = "SELECT * FROM Amenity where AMEN_ID ='$dataid'";
    $result = mysqli_query($connection,$query);
} else {
    $result=mysqli_query($connection,$query2);
}

    if(isset($_POST['btnReset'])) {
        $result=mysqli_query($connection,$query2);
    }


mysqli_close($connection);
?>

<h2> Database Golden Hearts Amenity</h2>  
 <table border=1>
    <tr>
        <th>AMEN_ID</th>
        <th>Category_Name</th>
        <th>Content</th>
        <th>Quantity</th>
        <th>Price</th>
        <th colspan = 2> Action</th>
    </tr>
    
    <?php 

        while ($row = mysqli_fetch_array($result)){
            echo"
            <tr>
            <td> ".$row['AMEN_ID']."</td>;
            <td> ".$row['Category_Name']."</td>
            <td> ".$row['Content']."</td>
            <td> ".$row['Quantity']."</td>
            <td> ".$row['Price']."</td>
            <td><b>
            <a href='ManageAmenityData.php?AMEN=$row[AMEN_ID]&Category=$row[Category_Name]&Content=$row[Content]&Quantity=$row[Quantity]&Price=$row[Price]'> Edit </a></b></td>
            <td><b><a href='DeleteAmenityData.php?AMEN=$row[AMEN_ID]&Category=$row[Category_Name]&Content=$row[Content]&Quantity=$row[Quantity]&Price=$row[Price]'> Delete </b></td>
        ";  }
        ?>

</body>

            


            
        
    


    