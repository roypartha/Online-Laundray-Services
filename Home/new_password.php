<?php

if(session_status() >= 0){
    session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url = login.php");
    die("Please Login First");

}

    
}
 


?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>new-password</title>
     <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
</head>
<body>
     <h1>Set New Password</h1>

     <form action="change_password.php" method="POST">

     <label>New password</label>
	<input type="password" name="newpass"> <br><br>

     <label>Confirm new password</label>
     <input type="password" name="cnewpass"><br><br>

     <input type="submit" name="submit" value="submit">


</body>
</html>

<?php

 

   
        $uname = $_SESSION['username'];
        
        

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "laundry_service";   
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "SELECT cemail FROM customer WHERE uname = '$uname';
         
        $email =$sql;
       
        $_SESSION['email'] = $email;
       
            
         

    

?>


