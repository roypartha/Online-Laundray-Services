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

// Data valitation, take from the drycleaning.php
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
        header("refresh: 4 ; url = drycleaningform.php");
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
            echo " Mobile Number is not valid"."<br>";
            header("refresh: 4 ; url = drycleaningform.php");
        }
    }
    else{
        echo " Mobile Number is not valid"."<br>";
        header("refresh: 4 ; url = drycleaningform.php");
    }
    return $count1;
}

if($_SESSION['service']== 'drycleaning' || $_SESSION['service']== 'wash_fold' || $_SESSION['service']== 'press_fold'){
    if(isset($_POST["submit"])){
        $count=0;
        $count1=0;
        $count=Valitation($_POST["branche"],$count);
        
        $count=Valitation($_POST["shirt"],$count);
        
        $count=Valitation($_POST["tshirt"],$count);
        
        $count=Valitation($_POST["pant"],$count);
        
        $count=Valitation($_POST["saree"],$count);
        
        $count=Valitation($_POST["suit"],$count);
        
        $count=Valitation($_POST["towel"],$count);
        
        $count=Valitation($_POST["blanket"],$count);
        
        $count=Valitation($_POST["bedsheet"],$count);
        
        $count=Valitation($_POST["curtain"],$count);
        
        $count=Valitation($_POST["name"],$count);
        
    
        $count=Valitation($_POST["email"],$count);
        
        $count1=EmailValitation($_POST["email"],$count1);
    
        $count=Valitation($_POST["phone"],$count);
        
        $count1=MobileValitation($_POST["phone"],$count1);
    
        $count=Valitation($_POST["address"],$count);
        
        $count=Valitation($_POST["city"],$count);
        
        $count=Valitation($_POST["zip"],$count);
        
        $count=Valitation($_POST["state"],$count);
        
    
        
    
        if($count==17 && $count1==2){
            $branche=$_POST["branche"];
            $shirt=$_POST["shirt"];
            $tshirt=$_POST["tshirt"];
            $pant=$_POST["pant"];
            $saree=$_POST["saree"];
            $suit=$_POST["suit"];
            $towel=$_POST["towel"];
            $blanket=$_POST["blanket"];
            $bedsheet=$_POST["bedsheet"];
            $curtain=$_POST["curtain"];
            $name=$_POST["name"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $address=$_POST["address"];
            $city=$_POST["city"];
            $zip=$_POST["zip"];
            $state=$_POST["state"];

            $username=$_SESSION['username'];
            $company = $_SESSION['com'];
            $service = $_SESSION['service'];

            if($service=='drycleaning'){
                $total=$shirt*40+$tshirt*30+$pant*50+$saree*60+$suit*120+$towel*80+$blanket*100+$bedsheet*80+$curtain*90;
            }
            else if($service=='wash_fold'){
                $total=$shirt*30+$tshirt*20+$pant*30+$saree*40+$suit*80+$towel*60+$blanket*80+$bedsheet*60+$curtain*70;
            }
            else if($service=='press_fold'){
                $total=$shirt*30+$tshirt*20+$pant*30+$saree*40+$suit*80+$towel*60+$blanket*80+$bedsheet*60+$curtain*70;
            }
            date_default_timezone_set('Asia/Dhaka');
            $date=date("Y-m-d");
            $time=date("h:i:sa");
            $status="Pending";
            
            $loop = true;
            $num = 0;
            while( $loop ){
            $num = rand(100000,999999);
            $orderid = "T-".$num;
            $sqlch = "SELECT * FROM `order` WHERE `user_id`='$username' AND `order_id` = '$orderid'";
            $resultch = mysqli_query($conn,$sqlch);
            $numch = mysqli_num_rows($resultch);
            if($numch>0){
                $loop = true;
            }
            else{
                $loop = false;
            }
    
            }
    
            $sql = "INSERT INTO `order`(`user_id`,`uname`, `com_name`, `branch`, `phone`, `u_mail`, `address`, `city`, `zip`, `state`, `order_id`, `service`, `date`, `time` , `status`) VALUES ('$username','$name','$company','$branche','$phone','$email','$address','$city','$zip','$state','$orderid','$service','$date','$time','$status')";
            $sql1 = "INSERT INTO `order_details`(`order_id`, `shirt`, `t-shirt`, `pant`, `saree`, `suit`, `towel`, `blanket`, `bedsheet`, `curtain`, `total_amount`) VALUES ('$orderid','$shirt','$tshirt','$pant','$saree','$suit','$towel','$blanket','$bedsheet','$curtain','$total')";
            $sql3 = "INSERT INTO `track` (`order_id`,`order`,`deliver1`,`company`,`deliver2`,`customer`) VALUES ('$orderid','Pending','Pending','Pending','Pending','Pending')";
            $result = mysqli_query($conn,$sql);
            $result1 = mysqli_query($conn,$sql1);
            $result3 = mysqli_query($conn,$sql3);
            if($result && $result1 && $result3){
                echo "Order Successfully Placed";
                header("refresh: 4 ; url =order.php");
            }
            else{
                echo "Order Not Placed";
                header("refresh: 4 ; url =order.php");
            }
           
        }
        else{
            echo "Please Fill Up All The Field";
            header("refresh: 2 ; url =drycleaningform.php");
        }
    }

}
else {
    header("location:order.php");
}





?>