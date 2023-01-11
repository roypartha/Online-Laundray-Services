<?php
session_start();
if(isset($_SESSION['username'])){
    echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url = login.php");
    die("Please Login First");

}
?>


<?php 

function PassValitation($temp){
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
        else if($temp[$i]>=chr(48) && $temp[$i]<=chr(57)){
            $bolNum=true;
        }
        else if($temp[$i]>=chr(32) && $temp[$i]<=chr(47) || $temp[$i]>=chr(91) && $temp[$i]<=chr(96) || 
        $temp[$i]>=chr(23) && $temp[$i]<=chr(25)){
            $bolChar=true;
        }
        
    }


    if($count>=8 && $bolCL && $bolSL && $bolNum && $bolChar ){
        echo "Password valide <br>";
    }
    else{
        echo "Password Not Valid.<br Password >"."<br>"." 
        Must be 8 character long "."<br>".
        " Must contain at least one uppercase letter and
         one lowercase letter"."<br>"." One number and one special character"."<br>";
        header("refresh: 3 ; url = new_password.php");
        die();
    }

    
}

 


 

    if(isset($_POST['submit'])){
       // echo "Welcome to Change Password  Page"."<br>";
        if(isset($_POST['newpass'])== isset($_POST['cnewpass'])){
            //echo "Welcome to Change Password  Page"."<br>";
            $newpass = $_POST['newpass'];
            
            $uname = $_SESSION['username'];
           // $email = $_SESSION['email'];
            $count1=PassValitation($newpass);
            //print_r(session_status());
           // echo $uname;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "laundry_service";   
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $sql = "UPDATE customer SET cpass = '$_POST[newpass]' WHERE uname = '$uname' ";
            
            if ($conn->query($sql) === TRUE) {
            
                echo "Update successfully <br>";
                session_unset();
                session_destroy();
                echo "Logout Successful"."<br>";
            
            
                header("refresh: 4 ; url = index.php");
            }
            else{
                echo "Update loss <br>";
                header("refresh: 3 ; url = new_password.php");
            }



        }
        else {
            echo "Both password are mustbe same <br>";
            header("refresh: 3 ; url = new_password.php");
        }
                    


    }
    

?>