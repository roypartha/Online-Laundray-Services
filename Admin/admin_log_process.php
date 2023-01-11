<?php

// check session and redirect to login page if not logged in





// Data valitation, take from the Signup.php 
function Valitation($temp,$count){
    if(isset($temp)){
       // $name = $_POST['fName'];
        if(!empty($temp)){
            return $count;
        }
        else{
            $count=true;
            return $count;
        }
    }
}


// user name 
$count=false;

if($_POST["submit"]){

    $uname = $_POST['uname'];
    $count=Valitation($uname,$count);
    
    $pass = $_POST['pass'];
    $count=Valitation($pass,$count);
    if($count==true){
        echo "Please fill all the fields <br>";
        header("refresh: 4 ; url = index.php");

    }
    else{
    //connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laundry_service";   
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{

        echo "Connected successfully"."<br>";
        
            $sql = "SELECT * FROM admin_table WHERE uname = '$uname' AND a_pass = '$pass'";
            //$result = $conn->query($sql); 
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);   
           /* $count = mysqli_num_rows($result);
            if($count == 1) {
                echo "Login Successful"."<br>";
                header("refresh: 4 ; url = customer.php");
            }
            else{
                echo "Login Failed"."<br>";
                header("refresh: 4 ; url = login.php");
            }*/
            if(isset($row['uname']) == $uname && isset($row['a_pass']) == $pass){
                echo "Login Successful"."<br>";
                session_start();
                $_SESSION['username'] = $uname;
                $_SESSION['password'] = $pass;
                header("refresh: 4 ;  url = admin_profile.php");
            }
            else{
                echo "Username or Password is incorrect"."<br>";
                header("refresh: 4 ; url = index.php");
            }
           

        
       


    }

    }
    
    

}



?>