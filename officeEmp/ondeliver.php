<?php
session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}

include "db_conn.php";

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
    <link rel="stylesheet" type="text/css" href="viweorder.css"> 
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
                <a href="shiftdeliver.php">
                    <div class="divlist">
                        <h3>Shipped to deliver</h3>
                    </div>
                </a>
 
                <a href="viwedeliver.php">
                    <div class="divlist">
                    <h3>Deliver info</h3>
                    </div >
                </a>
                <a href="ondeliver.php">
                    <div class="divlist">
                        <h3>On Deliver</h3>
                    </div>
                </a>
            </div>

            <div class="show">
                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer name</th>
                        <th>Address</th>
                        <th>company</th>
                        <th>Area</th>
                        <th>service</th>
                        <th>Status</th>
                    </tr>
                    <?php
                        $sql = "SELECT * FROM `order` WHERE `status` = 'shift to deliver'";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        // show data in table
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result )){
                               
                                echo "<tr><td>".$row['order_id']."</td><td>".$row['uname'].
                                "</td><td>".$row['address']."</td><td>".$row['com_name']."</td><td>".$row['branch'].
                                "</td><td>".$row['service']."</td><td>".$row['status']."</td></tr>";
                            }
                            echo "</table>";
                        }
                        else{
                            echo "0 result";
                        }
                    ?>
                </table>
             
            </div>
    
     </div>
    </main>
   
    
</body>
</html>
