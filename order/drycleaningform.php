<?php
session_start();
include "../customer/db_conn.php";
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";

    
}
else{
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}

if(isset($_POST['submit'])){
    $com = $_POST['com'];
    $_SESSION['com'] = $com;
}
$com = $_SESSION['com'];
$sql = "select * from com_branch where com_id = '$com'";
$result = mysqli_query($conn, $sql);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="drycleaningform.css"> 
    <title>Document</title>
</head>
<body>
    <main>
        <div class ="maindiv">
            <h2>ORDER INFORMATION :</h2>
            <form action="order_process.php" method='post'>
                <label for="">Branche :</label><br>
                <Select name="branche" id ="select_com" >

                <?php while($row = mysqli_fetch_array($result)):;?>
                <option value="<?php echo $row[1];?>"><?php echo $row[1];?></option>
                <?php endwhile;
                ?>
                </select>
                <br>
                <label for="shirt">Shirt :</label>
                <br>
                <input type="number" id="shirt" name="shirt" min="0" max="20">
                <br>
                <label for="t-shirt">T-Shirt :</label>
                <br>
                <input type="number" id="tshirt" name="tshirt" min="0" max="20">
                <br>
                <label for="pant">Pant :</label>
                <br>
                <input type="number" id="pant" name="pant" min="0" max="20">
                <br>
                <label for="saree">Saree :</label>
                <br>
                <input type="number" id="saree" name="saree" min="0" max="20">
                <br>
                <label for="suit">Suit :</label>
                <br>
                <input type="number" id="suit" name="suit" min="0" max="20">
                <br>
                <label for="towel">Towel :</label>
                <br>
                <input type="number" id="towel" name="towel" min="0" max="20">
                <br>
                <label for="blanket">Blanket :</label>
                <br>
                <input type="number" id="blanket" name="blanket" min="0" max="20">
                <br>
                <label for="bedsheet">Bedsheet :</label>
                <br>
                <input type="number" id="bedsheet" name="bedsheet" min="0" max="20">
                <br>
                <label for="curtain">Curtain :</label>
                <br>
                <input type="number" id="curtain" name="curtain" min="0" max="20">
                <br>
                <br>

                <h2>Customer Information :</h2>
                <input id='text' type="text" name="name" placeholder="Name">
                <br>
                <input id='text' type="text" name="email" placeholder="Email">
                <br>
                <input id='text' type="text" name="phone" placeholder="Phone">
                <br>
                <input id='text' type="text" name="address" placeholder="Address">
                <br>
                <input id='text' type="text" name="city" placeholder="City">
                <br>
                <input id='text' type="text" name="zip" placeholder="Zip">
                <br>
                <input id='text' type="text" name="state" placeholder="State">
                <br>

                <h2>Payment Information :</h2>
                <select name="payment" id="">
                    <option value="Cash">Cash on Delevery</option>
                    <option value="online">Online Payment</option>
                    <option value="pos">POS on Delevery</option>
                </select>
                <br>
                
                <input type="submit" name="submit" value="Order">

            </form>

        </div>
    </main>

</body>
</html>
