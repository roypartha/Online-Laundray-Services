<?php
session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}
$uname = $_SESSION['username'];
    
$trackid = $_REQUEST['orderid'];

include "db_conn.php";

$sql = "UPDATE `track` SET `company` = 'complete',`deliver2`='complete' WHERE `order_id` = '$trackid' ";
$result = mysqli_query($conn, $sql);

$sql1 = "UPDATE `order` SET `status` = 'way to delivary' WHERE `order_id` = '$trackid' ";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "UPDATE `order_assign` SET `status` = 'way to delivary' WHERE `order_id` = '$trackid' ";
$result2 = mysqli_query($conn, $sql2);

$sql3= "UPDATE `order_assign_company` SET `status` = 'way to delivary' WHERE `order_id` = '$trackid' ";
$result3 = mysqli_query($conn, $sql3);

// check if the data is update or not
if($result && $result1 && $result2 && $result3){
    echo "Data Update successfully";
    header("refresh: 2 ; url =deliverprofile.php");
}
else{
    echo "Data not Update";
    header("refresh: 2 ; url =deliverprofile.php");
}

?>