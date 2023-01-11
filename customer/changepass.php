<?php
session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup|Laundry Express</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    
    <link rel="stylesheet" type="text/css" href="changepass.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com">

</head>
<body>
    
    <div class = "formpage"> 
       
            <div>
                <a href="../Home/index.php"><img  src="../img/logo1.jfif" alt="logo" width="80px"></a>
            </div>
            <br>
            <div>
                <h2>Change Password</h2>
            </div>
            <br>
            <hr>
            <br>
        <div>
            <form action="changepass_process.php" method="post"  >

                <input type="password" name="pass"  placeholder="Current Password" ><br>
                <input type="password" name="newpass"  placeholder="New Password" ><br>
                <input type="password" name="cpass"  placeholder="Confirm Password" ><br>

                <br><br>
                <input type="submit"class ="submit" name="submit" value="Submit">


            </form>

        </div>
    
    </div>

    </div>

    

    
        
    
       

</body>
</html>
