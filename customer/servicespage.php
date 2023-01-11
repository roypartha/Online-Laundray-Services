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
    <title>Customer Profile</title>
    <link rel="shortcut icon" type="image/png" href="../img/favicon.ico">
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="servicespage.css"> 
</head>
<body>
    <main>
        <header >
            <nav>
                <div>
                <a class="logo" href="userprofile.php"><img src="../img/Lexpress.png" alt="logo" width="200px"></a>
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
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="../Sign_Login/logout.php">Logout</a></li>
                    </ul>
                </div>
                    
            </nav>

        </header>             
        
        <div class="div_header">
            <a href="edit_profile.php">
                <div class="header_item">
                    <img id="icons" src="../img/editpro.jpg" alt="ICON">
                    <p>Edit Profile</p>
                </div>
            </a>
            <a href="changepass.php">
                <div class="header_item">
                    <img id="icons" src="../img/changpass.png" alt="ICON">
                    <p>Change Password</p>
                </div>
            </a>
            <a href="address.php">
                <div class="header_item">
                    <img id="icons" src="../img/address.png" alt="ICON">
                    <p>Address</p>
                </div>
            </a>
            <a href="">
                <div class="header_item">
                    <img id="icons" src="../img/oderlist.png" alt="ICON">
                    <p>Order History</p>
                </div>
            </a>
            <a href="paymentmethod.php">
                <div class="header_item">
                    <img id="icons" src="../img/paymentM.png" alt="ICON">
                    <p>Payment Method</p>
                </div >
            </a>
            <a href="#">
                <div class="header_item">
                    <img id="icons" src="../img/Services.png" alt="ICON">
                    <p>Services</p>
                </div>
            </a>
            <a href="">
                <div class="header_item">
                    <img id="icons" src="../img/pricelist.jfif" alt="ICON">
                    <p>Price List</p>
                </div>
            </a>
            <a href="">
                <div class="header_item">
                    <img id="icons" src="../img/reviwe.jfif" alt="ICON">
                    <p>My Reviews</p>
                </div>
            </a>
            <a href="">
                <div class="header_item">
                    <img id="icons" src="../img/starpoints.png" alt="ICON">
                    <p>Star Points</p>
                </div> 
            </a>
        </div>

          
        <div class="div_center">
            
            <a href= "#" >
                <div class="divlist">
                    <img id="icon" src="../img/Dry cleaning.jpg" alt="ICON">
                    <p>Dry Cleaning</p>
                </div>
            </a>
            <a href="#">
                <div class="divlist">
                    <img id="icon" src="../img/Wash and fold.jpg" alt="ICON">
                    <p>Wash & Fold</p>
                </div>
            </a>
            <a href="#">
                <div class="divlist">
                    <img id="icon" src="../img/Press and Fold.jpg" alt="ICON">
                    <p>Press & Fold</p>
                </div>
            
            </a>
            <a href="#">
                <div class="divlist">
                    <img id="icon" src="../img/Toys cleaning.jpg" alt="ICON">
                    <p>Toys Cleaning</p>
                </div>
            </a>
            <a href="#">
                <div class="divlist">
                    <img id="icon" src="../img/Shoe cleaning.jpg" alt="ICON">
                    <p>Shoe Cleaning</p>
                </div>
            </a>
            <a href="#">
                <div class="divlist">
                    <img id="icon" src="../img/Carpet cleaning.jpg" alt="ICON">
                    <p>Carpet Cleaning</p>
                </div >
            </a>
            
        </div>
    

       

    </main>

    <div id="main-footer">
        <div id="main-footergrid">
            <h4>SUPPORT</h4>
            <button id ="buttongaid">
                <div>
                    <img id="icon" src="../img/phon.jfif" alt="">
                </div>
                <div>
                    <p>Phone <br> 01815059590</p> 
                </div>
               
                
            </button>
            <button id ="buttongaid">
                <div>
                    <img id="icon" src="../img/location.jfif" alt="">
                </div>
                <div>
                    <p>Company <br> <b style= "text-color:red;">Find Out Branches</b></p> 
                </div>
               
                
            </button>

             
        </div>
        <div id="main-footergrid">
            <h4>ABOUT US</h4>
        </div>
        <div id="main-footergrid">
            <h4>STAY CONNECTED</h4>
     </div>
   <!-- <div>
        <div><h1> Laundry Express >>> </h1></div>
        <button><a href="../Home/index.php">HOME</a></button>
        <button><a href="../Sign_Login/logout.php">Logout</a></button>

    </div>-->
    
    
</body>
</html>
