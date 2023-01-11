<?php
//check session is already start or not

if(session_status()>=0){
    session_start();
    session_unset();
    session_destroy();
    echo "Logout Successful"."<br>";
}
header("refresh: 4 ; url =../Home/index.php");


?>