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
    <title>Edit Profile</title>
    <link rel="shortcut icon" type="image/png" href="../img/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="customerorder.css"> 
</head>
<body>
    <main>
        <header >
            <nav>
                <div>
                <a class="logo" href="office_profile.php"><img src="../img/Lexpress.png" alt="logo" width="200px"></a>
                </div>
                <div class ="form">
                    <form class="example" action="action_page.php">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit">Search</button>
                    </form>
                </div>
                <div >
                    <ul class = "menu">
                        <li><a href="../Home/index.php">Home</a></li>
                        <li><a href="office_profile.php">Back</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="../Sign_Login/logout.php">Logout</a></li>
                    </ul>
                </div>
                    
            </nav>

        </header>    
        
        <div>
           
            <div class="div_center">
                <a href="viweorder.php">
                    <div class="divlist">
                    <h3>view order</h3>
                    </div>
                </a>
                <a href="ordertake.php">
                    <div class="divlist">
                        <h3>Customer Order</h3>
                    </div>
                </a>
               
                <a href="viwedeliver.php">
                    <div class="divlist">
                    <h3>Order from Company</h3>
                    </div >
                </a>
                <a href="deliverto_company.php">
                    <div class="divlist">
                        <h3>Deliver to Company</h3>
                    </div>
                </a>
            </div>

 
     </div>
    </main>

     
    <nav class = "nav_menu">
    
        <ul class = "menu2" >
        
            <li><a href="view .php">view oder</a></li>
            <li><a href="changepass.php">Shipped to deliver</a></li>
            <li><a href="">Deliver info</a></li>
            <li><a href="">On Deliver </a></li>
    
        </ul>

    </nav>

    
</body>
</html>
