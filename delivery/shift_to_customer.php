<?php
session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}
$uname = $_SESSION['username'];


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
    <link rel="stylesheet" type="text/css" href="companyto_daliver.css"> 
</head>
<body>
    <main>
        <header >
            <nav>
                <div>
                <a class="logo" href="deliverprofile.php"><img src="../img/Lexpress.png" alt="logo" width="200px"></a>
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
                        <li><a href="deliverprofile.php">Back</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="../Sign_Login/logout.php">Logout</a></li>
                    </ul>
                </div>
                    
            </nav>

        </header>    
        
        <div>
           
        <div class="div_center">
               
            </div>

            <div class="show">
                <table>
                    <tr>
                        
                        <th>Order ID</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Post Code</th>
                        <th>Company</th>
                        <th>Branch</th>
                        <th>Service</th>
                        <th>Status</th>
                        <th class ="th1">Click to Shift</th>
                        
                       
                    </tr>
                    <?php
                        $sql = "SELECT * FROM `order_assign_company` WHERE (`status` = 'way to delivary') AND `deliver_id`='$uname'";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        // show data in table
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result )){
                                echo "<tr><td>".$row["order_id"]."</td><td>".$row["uname"]."</td><td>".$row["address"]."</td><td>".$row["city"]."</td><td>".$row["zip"].
                                "</td><td>".$row["com_name"]."</td><td>".$row["branch"]."</td><td>".$row["service"]."</td><td>".$row["status"]."</td><td class ='td1' >"."<a href='shift_to_customer_process.php?orderid=$row[order_id]'>Shift</a>"."</td></tr>";
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
