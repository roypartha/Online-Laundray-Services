<?php
//start session
session_start();
//include database connection
include "../customer/db_conn.php";
//check if session variable is set
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}


if($_REQUEST['svcname'] == 'drycleaning'){
    $_SESSION['service'] = 'drycleaning';
    
}
else if($_REQUEST['svcname'] == 'wash_fold'){
    $_SESSION['service'] = 'wash_fold';
    
}
else if(isset($_REQUEST['svcname'])== 'press_fold'){
    $_SESSION['service'] = "press_fold";
}
else if(isset($_REQUEST['svcname'])== 'toyscleaning'){
    $_SESSION['service'] = "toyscleaning";
}
else if(isset($_REQUEST['svcname'])== 'shoecleaning'){
    $_SESSION['service'] = "shoecleaning";
}
else if(isset($_REQUEST['svcname'])== 'carpetcleaning'){
    $_SESSION['service'] = "carpetcleaning";
}

//echo $_SESSION['service'];

$sql = "select * from company";
$result = mysqli_query($conn, $sql);

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="select_com.css"> 
</head>
<body>
<main>
    <div class ="maindiv">
        <h1>Choose Company</h1>
        
        <form action="drycleaningform.php" method = 'POST'>


         <label for="">Select Company : </label>
         <select name="com"  >
                <?php while($row = mysqli_fetch_array($result)):;?>
                <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                <?php endwhile;?>
         </select>
            <br>
            <input type="submit" name = "submit" value = "NEXT">
         
        </form>
        

    </div>
</main>   
</body>
</html>