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
    <link rel="stylesheet" type="text/css" href="deliverprofile.css"> 
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
                <div>
                    <ul class = "menu">
                        <li><a href="../Home/index.php">Home</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="about.php">About</a></li>
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
            $sql = "select * from pick_deliver where id = '".$_SESSION['username']."' ";
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

                <h3></h3>
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
            <a href="customerorder.php">
                <div class="divlist">
                    <img id="icon" src="../img/checkOrder.jfif" alt="ICON">
                    <p>Check Order<br> From customer</p>
                </div>
            </a>
            <a href="companyto_daliver.php">
                <div class="divlist">
                    <img id="icon" src="../img/paymentM.png" alt="ICON">
                    <p>Shipped order <br> From Company </p>
                </div >
            </a>
            <a href="shift_to_customer.php">
                <div class="divlist">
                    <img id="icon" src="../img/oderlist.png" alt="ICON">
                    <p>Order shift <br> to customer</p>
                </div>
            </a>
            
            <a href="servicespage.php">
                <div class="divlist">
                    <img id="icon" src="../img/Services.png" alt="ICON">
                    <p>Services</p>
                </div>
            </a>
          
        </div>
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
