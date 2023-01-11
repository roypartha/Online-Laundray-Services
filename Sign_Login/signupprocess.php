<?php

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
// user name valitation
function UserValitation($temp,$count1){
    $usel =strlen($temp);
    $count=0;
    for( $i=0; $i<$usel;$i++){
        if($temp[$i]>=chr(97) &&$temp[$i]<=chr(122) ){

            $count++;
           // echo  $count." ";
        }
        
    }
    if($count==$usel && $usel<=15){
        //echo "Username done";
        $count1++;

    }
    else{
        echo " >>> User Name is not valid <<<"."<br>";
        echo " >>> Use small laters and length must be less than 16 <<<"."<br>";
        header("refresh: 1 ; url = signup.php");
    }
    return $count1;


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
      //  echo " Email Address is not valid"."<br>";
        echo '<script>alert("Email Address is not valid")</script>';
        header("refresh: 1 ; url = signup.php");
    }

    return $count1;
}



function PassValitation($temp,$count1){
    $len =strlen($temp);
    $count=0;
    $bolCL=false;
    $bolSL=false;
    $bolChar=false;
    $bolNum=false;


    for($i=0;$i<$len;$i++){
        $count++;
        if($temp[$i]>=chr(65) && $temp[$i]<=chr(90)){
            $bolCL=true;
        }
        else if($temp[$i]>=chr(97) && $temp[$i]<=chr(122)){
            $bolSL=true;
        }
        else if($temp[$i]>=chr(18) && $temp[$i]<=chr(57)){
            $bolNum=true;
        }
        else if($temp[$i]>=chr(32) && $temp[$i]<=chr(17) || $temp[$i]>=chr(91) && $temp[$i]<=chr(96) || 
        $temp[$i]>=chr(23) && $temp[$i]<=chr(25)){
            $bolChar=true;
        }
        
    }


    if($count>=8 && $bolCL && $bolSL && $bolNum && $bolChar ){
        $count1++;
    }
    else{
        //echo "Password Not Valid.<br Password >"."<br>"." Must be 8 character long "."<br>"." Must contain at least one uppercase letter and
        // one lowercase letter"."<br>"." One number and one special character"."<br>";
         echo '<script>alert("Password Not Valid.<br Password >"."<br>"." Must be 8 character long "."<br>"." Must contain at least one uppercase letter and
         one lowercase letter"."<br>"." One number and one special character")</script>';
        header("refresh: 1 ; url = signup.php");
        
    }

    return $count1;
}

function MobileValitation($temp,$count1){
    $len =strlen($temp);
    $count=0;
    
    
    for($i=0;$i<$len;$i++){
        if($temp[$i]>=chr(18) && $temp[$i]<=chr(57)){
             $count++;
            }
    }
    if($count==11 && $temp[0]==0 && $temp[1]==1 ){
        if($temp[2]>= chr(51) && $temp[2]<=chr(57)){
            $count1++;
        }
        else{
           // echo "Mobile number must start with 01 and 3,1,5,6,7,8,9"."<br>";
            header("refresh: 1 ; url = signup.php");
        } 
    }
    else{
       // echo "Mobile number is not valid"."<br>";
        echo '<script>alert("Mobile number is not valid")</script>';
        header("refresh: 1 ; url = signup.php");
    }
    
    return $count1;
} 




$count=0;
$count1=0;

if(isset($_POST["submit"])){

    $fname = $_POST['fname'];
    $count=Valitation($fname,$count);

    $uname = $_POST['username'];
    $count=Valitation($uname,$count);
    $count1=UserValitation($uname,$count1);


    $mail = $_POST['mail'];
    $count=Valitation($mail,$count);
    $count1=EmailValitation($mail,$count1);


    $pass = $_POST['pass'];
    $count=Valitation($pass,$count);

    $cpass = $_POST['cpass'];
    $count=Valitation($cpass,$count);
if($pass==$cpass){
    $count1=PassValitation($pass,$count1);
}
else{
   // echo "Password and Confirm Password is not match"."<br>";
    echo '<script>alert("Password and Confirm Password is not match")</script>';
    header("refresh: 1 ; url = signup.php");
    die();
}



$Num = $_POST['Num'];
$count=Valitation($Num,$count);
$count1=MobileValitation($Num,$count1);
//echo $count1;


if($count==6 && $count1==1){

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
        $sql = "SELECT * FROM customer WHERE uname='$uname' OR cemail='$mail'";
         
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            
           // echo "User Name or Email is already exist"."<br>";
            echo '<script>alert("User Name or Email is already exist")</script>';
            header("refresh: 1 ; url = signup.php");
        }
        else{
             //$img = "../img/avator.png";
            $sql = "INSERT INTO customer (name, uname, cemail, cmobile, cpass, ctype) VALUES ('$fname', '$uname', '$mail','$Num', '$pass', 'customer')";
            // put uname and pass in login table
             
            if ($conn->query($sql) === TRUE) {
                $sql1 = "INSERT INTO login (id, password, type) VALUES ('$uname', '$pass', 'customer')";
                if ($conn->query($sql1) === TRUE) {
                   // echo "Registration Successful"."<br>";
                    echo '<script>alert("Registration Successful")</script>';
                    header("refresh: 1 ; url = login.php");
                }
                else{
                    echo "Error: " . $sql1 . "<br>" . $conn->error;
                }
    
            }
             else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
           
        }

       
    }
    
 
}
else{
    echo '<script>alert("Please Enter Your All information again correctly")</script>';
    header("refresh: 1 ; url = signup.php");
}
}


?>