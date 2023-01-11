<?php

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

function EmailValitation($temp,$count1){
    $len =strlen($temp);
    $count=0;
   

    for($i=0;$i<$len;$i++){
        if($temp[$i]=='@'){
            $count++;
        }
    }
    if($count==1){
       
        $count1++;
    }
    else{
        echo " Email Address is not valid"."<br>";
        header("refresh: 4 ; url = signup.php");
    }

    return $count1;
}


function MobileValitation($temp,$count1){
    $len =strlen($temp);
    $count=0;
    
    
    for($i=0;$i<$len;$i++){
        if($temp[$i]>=chr(48) && $temp[$i]<=chr(57)){
             $count++;
            }
    }
    if($count==11 && $temp[0]==0 && $temp[1]==1 ){
        if($temp[2]>= chr(51) && $temp[2]<=chr(57)){
            $count1++;
        }
        else{
            echo "Mobile number must start with 01 and 3,4,5,6,7,8,9"."<br>";
            header("refresh: 4 ; url = signup.php");
        } 
    }
    else{
        echo "Mobile number is not valid"."<br>";
        header("refresh: 4 ; url = signup.php");
    }
    
    return $count1;
} 




$count=0;
$count1=0;

if(isset($_POST["submit"])){

    $fname = $_POST['fname'];
    $count=Valitation($fname,$count);

    $uname = $_SESSION['username'];

    $mail = $_POST['mail'];
    $count=Valitation($mail,$count);
    $count1=EmailValitation($mail,$count1);


    $Num = $_POST['Num'];
    $count=Valitation($Num,$count);
    $count1=MobileValitation($Num,$count1);



if($count==3 && $count1==2){

    //echo "Registration Successful"."<br>";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laundry_service";   
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        echo "Connected successfully"."<br>";
        // check user name and email is already exist or not in customer database 
        $sql = "SELECT * FROM customer WHERE uname !='$uname' AND cemail='$mail'";
         
        $result = $conn->query($sql);
        if ($result->num_rows > 0 ) {
            
            echo "User Name or Email is already exist"."<br>";
            header("refresh: 4 ; url = edit_profile.php");
        }
        else{
            $sql = "update customer set name='$fname',cemail='$mail',cmobile='$Num' where uname='$uname'";
            // put uname and pass in login table
            $row = mysqli_fetch_assoc($result);
            if ($conn->query($sql) === TRUE) {
                $_SESSION['name']=$fname;
                echo " Update Successful"."<br>";
                header("refresh: 4 ; url = edit_profile.php");
                
    
            }
             else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
           
        }

        
        

       
    }
    
 
}
else{
    echo "<br>"."Please Enter Your All information again correctly"."<br>";
    header("refresh: 4 ; url = edit_profile.php");
}
}


?>