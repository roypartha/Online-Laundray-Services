<?php
session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}

    


include "db_conn.php";

$trackid = $_SESSION['trackid'];
$area = $_SESSION['area'];
$st ="Accepted";
$delive_id = $_REQUEST['deliverid'];

$sql = "UPDATE `track` SET `order` = '$st' WHERE `order_id` = '$trackid' ";
$result = mysqli_query($conn, $sql);

// check if the data is inserted or not
$sql1 = "SELECT uname, com_name, branch,address,city,zip,service FROM `order` WHERE `order_id` = '$trackid'";

$result1 = mysqli_query($conn, $sql1);
$row = mysqli_fetch_assoc($result1);
$uname = $row['uname'];
$com_name = $row['com_name'];
$branch = $row['branch'];
$address = $row['address'];
$city = $row['city'];
$zip = $row['zip'];
$service = $row['service'];
$status = "shift to deliver";

$sql3 = "SELECT * FROM `order_details` WHERE `order_id` = '$trackid'";

$result3 = mysqli_query($conn, $sql3);
$row1 = mysqli_fetch_assoc($result3);
$shirt = $row1['shirt'];
$tshirt = $row1['t-shirt'];
$pant = $row1['pant'];
$saree= $row1['saree'];  
$suit= $row1['suit'];
$towel= $row1['towel'];
$blanket= $row1['blanket'];
$bedsheet= $row1['bedsheet'];
$curtain= $row1['curtain'];
$toy= $row1['toy'];
$total_amount = $row1['total_amount'];

$sql2 = "INSERT INTO `order_assign` (`order_id`, `uname`,`deliver_id`, `com_name`, `branch`, `address`,
 `city`, `zip`, `service`, `status`, `shirt`, `t-shirt`, `pant`, `saree`, `suit`, `towel`, `blanket`,
  `bedsheet`, `curtain`, `toy`, `total_amount` ) VALUES ('$trackid', '$uname', '$delive_id','$com_name', 
  '$branch', '$address', '$city', '$zip', '$service', '$status', '$shirt', '$tshirt', '$pant', '$saree', 
  '$suit', '$towel', '$blanket', '$bedsheet', '$curtain', '$toy', '$total_amount')";

$result2 = mysqli_query($conn, $sql2);
// check if the data is inserted or not
$sql4 = "UPDATE `order` SET `status` = 'shift to deliver' WHERE `order_id` = '$trackid' ";

$result4 = mysqli_query($conn, $sql4);

if($result && $result2 && $result4){
    echo "Data inserted successfully";
    header("refresh: 4 ; url =shiftdeliver.php");
}
else{
    echo "Data not inserted";
    header("refresh: 4 ; url =shiftdeliver.php");
}

?>