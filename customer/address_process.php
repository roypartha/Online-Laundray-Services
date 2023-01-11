<?php
//session 
session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url =../Sign_Login/login.php");
    die("Please Login First");

}

// Data valitation, take from the Signup.php 
function Valitation($temp,$count){
    if(isset($temp)){
       // $name = $_POST['fName'];
        if(!empty($temp)){
            $count++;
            return $count;
        }
    }
}

// check submit button is clicked or not
if(isset($_POST['submit'])){

    $count=0;
    //take value from form of address.php
    $address = $_POST['address'];
    $count=Valitation($address,$count);
    $city = $_POST['city'];
    $count=Valitation($city,$count);
    $postcode = $_POST['postcode'];
    $count=Valitation($postcode,$count);
    $state = $_POST['state'];
    $count=Valitation($state,$count);
    $def = $_POST['def'];
    $count=Valitation($def,$count);

    if($count=5 ){
        include 'db_conn.php';

        $username = $_SESSION['username'];
        $sql = "SELECT * FROM address WHERE id = '$username'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if(isset($row['id']) == $username  ){
            if($def == 'yes'){
                $sql = "UPDATE address SET address = '$address', city = '$city', postcode = '$postcode', state = '$state', status = '$def' WHERE id = '$username'";
            }
            else
            {
                $sql = "UPDATE address SET address = '$address', city = '$city', postcode = '$postcode', state = '$state'  WHERE id = '$username'";
            }

            $result = mysqli_query($conn,$sql);
            if($result){
                echo "Update Successful"."<br>";
                header("refresh: 4 ; url =userprofile.php");
            }
            else{
                echo "Update Failed"."<br>";
                header("refresh: 4 ; url =userprofile.php");
            }
        }
        else{
            if($def == 'yes'){
                $sql = "INSERT INTO address (id, address, city, postcode, state, def) VALUES ('$username', '$address', '$city', '$postcode', '$state', '$def')";
            }
            else
            {
                $sql = "INSERT INTO address (id, address, city, postcode, state) VALUES ('$username', '$address', '$city', '$postcode', '$state')";
            }

            $result = mysqli_query($conn,$sql);
            if($result){
                echo "Insert Successful"."<br>";
                header("refresh: 4 ; url =userprofile.php");
            }
            else{
                echo "Insert Failed"."<br>";
                header("refresh: 4 ; url =userprofile.php");
            }
        }

       

    } 
    else{
        echo "Please fill all the field";
        header("refresh: 4 ; url = address.php");
    }


}
?>
