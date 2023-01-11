<?php

// Data valitation, take from the add_transpoter.php 
function Valitation($temp,$count){
    if(isset($temp)){
       // $name = $_POST['fName'];
        if(!empty($temp)){
            $count++;
            return $count;
        }
    }
}
// id valitation
function IdValitation($temp,$count1){
    $usel =strlen($temp);
    $bool = false;

    if($temp[0]=='b' && $temp[1]=='r' && $temp[2]=='-'){
        for( $i=3; $i<$usel;$i++){
            if($temp[$i]>=chr(48) &&$temp[$i]<=chr(57) ){

    
                $bool = true;
            }
            else{
                $bool = false;
                break;
            }  
        }
    }
    
    if($bool==true && $usel<=10){
        
        $count1++;
    }
    else{
        echo " >>> ID is not valid <<<"."<br>";
        echo " >>> Follow instructin and  id formte <br> >>> Length must be less than equle 10 <<<"."<br>";
        header("refresh: 4 ; url = add_pick&deliver_emp.php");
    }
    return $count1;
}
// Email valitation
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
//mobile number valitation
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
            header("refresh: 4 ; url = add_pick&deliver_emp.php");
        } 
    }
    else{
        echo "Mobile number is not valid"."<br>";
        header("refresh: 4 ; url = add_pick&deliver_emp.php");
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
        else if($temp[$i]>=chr(48) && $temp[$i]<=chr(57)){
            $bolNum=true;
        }
        else if($temp[$i]>=chr(32) && $temp[$i]<=chr(47) || $temp[$i]>=chr(91) && $temp[$i]<=chr(96) || 
        $temp[$i]>=chr(23) && $temp[$i]<=chr(25)){
            $bolChar=true;
        }
        
    }


    if($count>=8 && $bolCL && $bolSL && $bolNum && $bolChar ){
        $count1++;
    }
    else{
        echo "Password Not Valid.<br Password >"."<br>"." Must be 8 character long "."<br>"." Must contain at least one uppercase letter and
         one lowercase letter"."<br>"." One number and one special character"."<br>";
        header("refresh: 4 ; url = add_pick&deliver_emp.php");
    }

    return $count1;
}

$count=0;
$count1=0;

if(isset($_POST["submit"])){
    $count=Valitation($_POST["com_id"],$count);
    //$count1=IdValitation($_POST["com_id"],$count1);

    $count=Valitation($_POST["branch_name"],$count);
    $count=Valitation($_POST["email"],$count);
    $count1=EmailValitation($_POST["email"],$count1);

    $count=Valitation($_POST["phone"],$count);
    $count1=MobileValitation($_POST["phone"],$count1);

    $count=Valitation($_POST["jDate"],$count);
    $count=Valitation($_POST["branch_id"],$count);
    $count1=IdValitation($_POST["branch_id"],$count1);

    $count=Valitation($_POST["pass"],$count);
    $count1=PassValitation($_POST["pass"],$count1);


    if($count==7 && $count1==4){
        $com_id = $_POST["com_id"];
        $branch_name = $_POST["branch_name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $jDate = $_POST["jDate"];
        $branch_id = $_POST["branch_id"];
        $branch_pass = $_POST["pass"];
       
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "laundry_service";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: ".mysqli_connect_error());
        }
        else{
            $sql = "SELECT * FROM com_branch WHERE branch_id='$branch_id' OR branch_mail='$email' OR branch_name='$branch_name'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "User Name or Email is already exist"."<br>";
                header("refresh: 4 ; url = update_com.php");
            }
            else{
                $sql= "INSERT INTO com_branch (com_id,branch_name,branch_mail,branch_phn,branch_add_date,branch_id,branch_pass) VALUES ('$com_id','$branch_name','$email','$phone','$jDate','$branch_id','$branch_pass')";
                if(mysqli_query($conn,$sql)){
    
                    echo "New record created successfully";
                    header("refresh: 4 ; url = update_com.php");
                }
                else{
                    echo "Error: ".$sql."<br>".mysqli_error($conn);
                }

            }
           
        }
    }
    else{
        echo "<br>Please fill up all the field correctly";
        header("refresh: 4 ; url = update_com.php");
    }


    

}
?>
