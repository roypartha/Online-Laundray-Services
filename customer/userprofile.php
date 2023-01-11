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
    <link rel="stylesheet" type="text/css" href="userprofile.css"> 
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
                        <li><a href="userprofile.php">Home</a></li>
                        <li><a href="#SUPPORT">Contact</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="../Sign_Login/logout.php">Logout</a></li>
                    </ul>
                </div>
                    
            </nav>

        </header>             
        
       <div>

       
       <div class ="div_profile">

            
            <div class="div1">

            <?php
            include "db_conn.php";
            $sql = "select * from customer where uname = '".$_SESSION['username']."' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $image = $row['image'];
            if($image == ""){
                ?> <img class="avator" src="../img/avator.png" alt="avator"> <?php ;
            }else{ ?>
                 <img class="avator" src='uploads/<?= $image ?>' alt='profile' > <?php ;
            } ?>
            
            </div>

            <div class="div2">

                <h3>Profile</h3>
                <br><br>
                <h4>Welcome</h4><br>
                <p><?php echo $_SESSION['name']; ?></p>
                
            </div>

           
            
        </div>
       

        <div class="div_center">
            <a href="edit_profile.php">
                <div class="divlist">
                    <img id="icon" src="../img/editpro.jpg" alt="ICON">
                    <p>Edit Profile</p>
                </div>
            </a>
            <a href="changepass.php">
                <div class="divlist">
                    <img id="icon" src="../img/changpass.png" alt="ICON">
                    <p>Change Password</p>
                </div>
            </a>
            <a href="address.php">
                <div class="divlist">
                    <img id="icon" src="../img/address.png" alt="ICON">
                    <p>Address</p>
                </div>
            </a>
            <a href="orderhistory.php">
                <div class="divlist">
                    <img id="icon" src="../img/oderlist.png" alt="ICON">
                    <p>Order History</p>
                </div>
            </a>
            <a href="paymentmethod.php">
                <div class="divlist">
                    <img id="icon" src="../img/paymentM.png" alt="ICON">
                    <p>Payment Method</p>
                </div >
            </a>
            <a href="servicespage.php">
                <div class="divlist">
                    <img id="icon" src="../img/Services.png" alt="ICON">
                    <p>Services</p>
                </div>
            </a>
            <a href="">
                <div class="divlist">
                    <img id="icon" src="../img/pricelist.jfif" alt="ICON">
                    <p>Price List</p>
                </div>
            </a>
            <a href="">
                <div class="divlist">
                    <img id="icon" src="../img/reviwe.jfif" alt="ICON">
                    <p>My Reviews</p>
                </div>
            </a>
            <a href="">
                <div class="divlist">
                    <img id="icon" src="../img/starpoints.png" alt="ICON">
                    <p>Star Points</p>
                </div> 
            </a>
        </div>
    </div>

       

    </main>

    <div class = "order_butt">
        <button><a href="../order/order.php">Order Now</a></button>
       </div>

       <div id="main-footer">
        <div id="main-footergrid">
            <h4 id = "SUPPORT">SUPPORT</h4>
            <button class ="buttongaid">
                <div>
                    <img id="icon" src="../img/phon.jfif" alt="">
                </div>
                <div>
                    <p>Phone <br> 01815059590</p> 
                </div>
               
                
            </button>
            <button class ="buttongaid">
                <div>
                    <img id="icon" src="../img/location.jfif" alt="">
                </div>
                <div>
                    <p>E-mail <br> <b style= "text-color:red;">lexpress@gmail.com</b></p> 
                </div>
               
                
            </button>

             
        </div>
        <div id="main-footergrid">
            <h4 id = "about">Company</h4>
            <div class = "footer_link">
                <br>
                <a href="#">About Us</a> <br><br>
                <a href="#">Our Services</a> <br><br>
                <a href="#">Privacy Policy</a> <br><br>
                <a href="#">Terms & Conditions</a> <br><br>

            </div>
           

        </div>
       <!-- <div id="main-footergrid">

            <h4>STAY CONNECTED</h4>
            <br>
            <div class = "footer_link">
                <p>Laundry Express Ltd</p>
                <p>House # 12, Road # 12, Block # B</p>
                <p>Bashundhara R/A, Dhaka-1229</p>
                <p>Bangladesh</p>
            </div>
                
     </div>*/-->

     <div id="main-footergrid">

            <h4>Follow Us</h4>
            <br>
            <div class = "footer_link">
                <a href="https://www.facebook.com/profile.php?id=100046048730860"><img id="icon" src="../img/facebook.png" alt="facebook" width="30px"></a> 
                <a href="#"><img id="icon" src="../img/instagram.jfif" alt="instagram" width="30px"></a> 
                <a href="https://github.com/roypartha"><img id="icon" src="../img/github.png" alt="github" width="30px"></a> 

            </div>
                
     </div>
    
    
</body>
</html>
