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

$sql = "UPDATE `track` SET `deliver1` = 'received' WHERE `order_id` = '$trackid' ";
$result = mysqli_query($conn, $sql);
$sql1 = "UPDATE `order` SET `status` = 'way to company' WHERE `order_id` = '$trackid' ";
$result1 = mysqli_query($conn, $sql1);
$sql2 = "UPDATE `order_assign` SET `status` = 'way to company' WHERE `order_id` = '$trackid' ";
$result2 = mysqli_query($conn, $sql2);
// check if the data is update or not
if($result && $result1 && $result2){
    echo "Data Update successfully";
    header("refresh: 2 ; url =ordertake.php");
}
else{
    echo "Data not Update";
    header("refresh: 2 ; url =ordertake.php");
}

?>