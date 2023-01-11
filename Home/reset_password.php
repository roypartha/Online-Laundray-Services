<?php

 

   if($_POST["submit"]){
        $uname = $_POST['uname'];
        //$email = $_POST['email'];
        $pass = $_POST['pass'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "laundry_service";   
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "SELECT * FROM customer WHERE uname = '$uname' AND cpass = '$pass'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC); 
    
        if(isset($row['uname']) == $uname && isset($row['cpass']) == $pass){

            //echo "Username or Email is incorrect"."<br>";
            header("refresh: 4 ; url = login.php");
            die(" Try to login again"."<br>");
            
        }
        else{

            session_start();
            $_SESSION['username'] = $uname;
            //$_SESSION['email'] = $email;
            echo "   Loading......... ";
            header("refresh: 4 ;  url = new_password.php");
            
         }

    }

?>


