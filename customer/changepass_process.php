<?php
 session_start();
 if(isset($_SESSION['username'])){
     //echo "Welcome ".$_SESSION['username']."<br>";
     
 }
 else{
     
     header("refresh: 4 ; url =../Sign_Login/login.php");
     die("Please Login First");
 
 }

 include 'db_conn.php';


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
        else if($temp[$i]>=chr(48) && $temp[$i]<=chr(57)){
            $bolNum=true;
        }
        else if($temp[$i]>=chr(32) && $temp[$i]<=chr(47) || $temp[$i]>=chr(91) && $temp[$i]<=chr(96) || 
        $temp[$i]>=chr(23) && $temp[$i]<=chr(25)){
            $bolChar=true;
        }
        
    }


    if($count>=8 && $bolCL && $bolSL && $bolNum && $bolChar ){
        $count1 = true;
    }
    else{
        echo "Password Not Valid.<br Password >"."<br>"." Must be 8 character long "."<br>"." Must contain at least one uppercase letter and
         one lowercase letter"."<br>"." One number and one special character"."<br>";
        header("refresh: 4 ; url = changepass.php");
    }

    return $count1;
}


 // check submit button is clicked or not from change_password.php
    if(isset($_POST['submit'])){
        //echo "submit button is clicked";
        $pass =$_POST['pass'];
        $newpass = $_POST['newpass'];
        $cnewpass = $_POST['cpass'];
        $uname = $_SESSION['username'];
        //echo $uname;
        //echo $newpass;
        //echo $cnewpass;
        $sql= "SELECT * FROM `customer` WHERE `uname` = '$uname' AND `cpass` = '$pass'";
        $_request = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($_request);
        $bool = false;
        PassValitation($newpass,$bool);
        if($count==1 && $bool =true){
           

            if($newpass==$cnewpass){
                $sql = "UPDATE `customer` SET `cpass` = '$newpass' WHERE `customer`.`uname` = '$uname'";
                $result = mysqli_query($conn,$sql);
                if($result){
                    echo "Password Changed Successfully";
                    session_unset();
                    session_destroy();
                    header("refresh: 4 ; url =../Sign_Login/login.php");
                }
                else{
                    echo "Password Not Changed";
                    header("refresh: 4 ; url =changepass.php");
                }
            }
            else{
                echo "New Password and Confirm New Password is not same";
                header("refresh: 4 ; url =changepass");
            }
        }
        else{
            echo "Current Password is not correct";
            header("refresh: 4 ; url =changepass.php");
        }
    }

?>