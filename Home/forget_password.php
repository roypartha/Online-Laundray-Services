<?php
//check session is already start or not
//print_r(session_status());
//die;
/*if(session_status() >= 0){

     session_start();
     if(isset($_SESSION['username'])){
        
         header("refresh: 4 ; url = login.php");
     }
     
 }*/
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Password Reset</title>
     <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
</head>
<body>
     
     <p>Enter Email & User Name : </p>
     <form action="reset_password.php" method="POST">
        User name
        <input type="text" name="uname" id="uname" placeholder="Username" ><br><br>
       <!-- Email:
        <input type="text" name="email" placeholder="Enter your email here"><br><br> -->
        Current Password:
        <input type="password" name = 'pass' placeholder="Currenr Password"> <br><br>

        <input type="submit" name="submit" value="Submit">

     </form>
</body>
</html>