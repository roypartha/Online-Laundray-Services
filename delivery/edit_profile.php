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
    <link rel="stylesheet" type="text/css" href="edit_profile.css"> 
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
        
        <div>
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
                <a href="">
                    <div class="divlist">
                        <img id="icon" src="../img/address.png" alt="ICON">
                        <p>Address</p>
                    </div>
                </a>
                <a href="">
                    <div class="divlist">
                        <img id="icon" src="../img/oderlist.png" alt="ICON">
                        <p>Order History</p>
                    </div>
                </a>
                <a href="">
                    <div class="divlist">
                        <img id="icon" src="../img/paymentM.png" alt="ICON">
                        <p>Payment Method</p>
                    </div >
                </a>
                <a href="">
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


            <div class = "div_com"> 

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
                        


                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
                            <input type="submit" value="Upload Image" name="submit">
                        </form>
                    </div>
                    <div class="div2">
                        <br><br>
                        <h4>Hello,</h4><br>
                        <p><?php echo $_SESSION['name']; ?></p>
                            
                    </div>

    
                    
                </div>

                <div class = "edit">

                    <h4>REQUST FOR CHANGE INFORMATION :</h4>

                    <form action="update.php" method="post" >

                        <label for="">Name :</label>
                        <input type="text" name="fname" placeholder=" Enter Your Name" ><br>
                        <label for="">Email :</label>
                        <input type="email" name="mail"   placeholder="Enter Your Email " ><br>
                        <label for="">Mobile :</label>
                        <input type="text" name="Num"  placeholder=" Enter Your Mobile Number" ><br>
                        <label for="">Address :</label>
                        <input type="text" name="address"  placeholder=" Enter Your Address" ><br>

                        <br><br>
                        <input type="submit"class ="submit" name="submit" value="Submit">
                    </form>
                </div>
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
