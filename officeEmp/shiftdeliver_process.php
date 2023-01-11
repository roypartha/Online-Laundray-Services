<?php
session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
   $_SESSION['trackid'] = $_REQUEST['trackid'];
   $_SESSION['area'] = $_GET['branch'];
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
    <link rel="stylesheet" type="text/css" href="shiftdeliver_process.css"> 
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
                        <li><a href="shiftdeliver.php">Back</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="../Sign_Login/logout.php">Logout</a></li>
                    </ul>
                </div>
                    
            </nav>

        </header>    


        <div class="show">
            <div class="div1">
                <h1>Deliver List</h1>
                <br>
                <p>Assign Order to Deliver preson <br>Press <b>CLICK </b>  </p>
            </div>
            
            <div class="table">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>ID</th>
                        <th>Customer Phone</th>
                        <th>Area</th>
                        <th>Click to Shift</th>  
                        
                    </tr>
                    <?php
                        $sql = "SELECT * FROM `pick_deliver` WHERE `area` = '$_SESSION[area]'";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        // show data in table
                        if ($resultCheck > 0) {
                            while ($row = mysqli_fetch_assoc($result )){
                                
                                echo "<tr><td>".$row['name']."</td><td>".$row['id']."</td><td>".$row['phone'].
                                "</td><td>".$row['area']."</td><td>"."<a href ='shiftdeliver_processdb.php?deliverid=$row[id]'>CLICK</a>"."</td></tr>";
                            }
                            echo "</table>";
                        }
                        else{
                            echo "No result";
                            header("refresh: 4 ; url =shiftdeliver.php");
                        }
                        ?>
                </table>
            
            </div>

        </div>
    </main>
   
    
</body>
</html>