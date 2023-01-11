<?php
session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}

    
$trackid = $_REQUEST['orderid'];

include "db_conn.php";

$sql = "UPDATE `track` SET `deliver1` = 'shifted' WHERE `order_id` = '$trackid' ";
$result = mysqli_query($conn, $sql);
$sql1 = "UPDATE `order` SET `status` = 'shifted to company' WHERE `order_id` = '$trackid' ";
$result1 = mysqli_query($conn, $sql1);
$sql2 = "UPDATE `order_assign` SET `status` = 'waiting' WHERE `order_id` = '$trackid' ";
$result2 = mysqli_query($conn, $sql2);
$sql3= "INSERT INTO `order_assign_company` SELECT * FROM `order_assign` WHERE `order_id` = '$trackid'";
$result3 = mysqli_query($conn, $sql3);

// check if the data is update or not
if($result && $result1 && $result2 && $result3){
    echo "Data Update successfully";
    header("refresh: 2 ; url =deliverto_company.php");
}
else{
    echo "Data not Update";
    header("refresh: 2 ; url =deliverto_company.php");
}

?>
