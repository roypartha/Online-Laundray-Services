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

    if($temp[0]=='p' && $temp[1]=='d'&& $temp[2]=='-'){
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
            header("refresh: 4 ; url = signup.php");
        } 
    }
    else{
        echo "Mobile number is not valid"."<br>";
        header("refresh: 4 ; url = signup.php");
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
        header("refresh: 4 ; url = signup.php");
    }

    return $count1;
}


$count=0;
$count1=0;
if(isset($_POST["submit"])){
   
    $count=Valitation($_POST["fName"],$count);
    $count=Valitation($_POST["address"],$count);
    $count=Valitation($_POST["nid"],$count);
    $count=Valitation($_POST["phone"],$count);
    $count1=MobileValitation($_POST["phone"],$count1);

    $count=Valitation($_POST["salary"],$count);
    $count=Valitation($_POST["jDate"],$count);

    $count=Valitation($_POST["uname"],$count);
    $count1=IdValitation($_POST["uname"],$count1);

    $count=Valitation($_POST["pass"],$count);
    $count1=PassValitation($_POST["pass"],$count1);

    $count=Valitation($_POST["dept"],$count);
    $count=Valitation($_POST["emp_type"],$count);
    
    if($count==10 && $count1==3){
        $name = $_POST["fName"];
        $address = $_POST["address"];
        $nid = $_POST["nid"];
        $phone = $_POST["phone"];
        $salary = $_POST["salary"];
        $jDate = $_POST["jDate"];
        $uname = $_POST["uname"];
        $pass = $_POST["pass"];
        $dept = $_POST["dept"];
        $emp_type = $_POST["emp_type"];
        $depid = 12;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "laundry_service";   
        $conn = new mysqli($servername, $username, $password, $dbname);
        if(!$conn){
            die("Connection failed: ".mysqli_connect_error());
        }
        else{
            $sql = "INSERT INTO transpoter (name,address,nid,phone,salary,dept,etype,jDate,id,pass,depid) VALUES ('$name','$address','$nid','$phone','$salary','$dept','$emp_type','$jDate','$uname','$pass','$depid')";
            $sql1 = "INSERT INTO login (id, password, type) VALUES ('$uname','$pass','$emp_type')";
            if(mysqli_query($conn,$sql)&&mysqli_query($conn,$sql1)){
                //session start
                session_start();
                $_SESSION["id"] = $uname;
                $_SESSION["pass"] = $pass;

                echo "New record created successfully";
                header("refresh: 4 ; url = add_transpoter.php");
                }
                else{
                    echo "Error: ".$sql."<br>".mysqli_error($conn);
                    echo "Error: ".$sql1."<br>".mysqli_error($conn);
                }   
            
        } 
         
    }
    else{
        echo " >>> Please fill up all the field <<<"."<br>";
        header("refresh: 4 ; url = add_Transpoter.php");
    }

}


?>
