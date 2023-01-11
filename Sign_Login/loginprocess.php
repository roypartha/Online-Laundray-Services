<?php

// Data valitation, take from the Signup.php 
function Valitation($temp,$count){
    if(isset($temp)){
       // $name = $_POST['fName'];
        if(!empty($temp)){
            return $count;
        }
        else{
            $count=true;
            return $count;
        }
    }
}

function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}


// user name 
$count=false;

if($_POST["submit"]){

    $uname = $_POST['uname'];
    $count=Valitation($uname,$count);
    
    $pass = $_POST['pass'];
    $count=Valitation($pass,$count);
    if($count==true){
        // Function call
        function_alert("Please fill all the fields");
       // echo "Please fill all the fields <br>";
        header("refresh: 1 ; url = login.php");
        

    }
    else{
    //connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "laundry_service";   
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{

        echo "Connected successfully"."<br>";
       // if(isset($_POST['type'])== 'customer'){
        if($uname[0]=='t'&&$uname[1]=='r'){} // for the transporter

        else if($uname[0]=='p'&&$uname[1]=='d'){
            $sql = "SELECT * FROM pick_deliver WHERE id = '$uname' AND pass = '$pass'";
            //$result = $conn->query($sql); 
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            
            if(isset($row['id']) == $uname && isset($row['pass']) == $pass){
                echo "Login Successful"."<br>";
                session_start();
                
                $_SESSION['username'] = $uname;
                $_SESSION['name'] = $row['name']; 
                $_SESSION['phone'] = $row['phone'];
                header("refresh: 1 ;  url = ../delivery/deliverprofile.php");
            }
            else{
                echo "Username or Password is incorrect"."<br>";
                header("refresh: 1 ; url = login.php");
            }

        }
        else if($uname[0]=='o'&& $uname[1]=='f'){ // for the offfice staff
            $sql = "SELECT * FROM office_emp WHERE id = '$uname' AND pass = '$pass'";
            //$result = $conn->query
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if(isset($row['id']) == $uname && isset($row['pass']) == $pass){
                echo "Login Successful"."<br>";
                session_start();
                
                $_SESSION['username'] = $uname;
                $_SESSION['name'] = $row['name']; 
                $_SESSION['phone'] = $row['phone'];
                header("refresh: 1 ;  url = ../officeEmp/office_profile.php");
            }
            else{
                echo "Username or Password is incorrect"."<br>";
                header("refresh: 1 ; url =login.php");
            }

        }
        else if($uname[0]=='b'&& $uname[1]=='r'){ // for company branch
            $sql = "SELECT * FROM com_branch WHERE branch_id = '$uname' AND branch_pass = '$pass'";
            //$result = $conn->query($sql); 
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);   
           
            if(isset($row['branch_id']) == $uname && isset($row['branch_pass']) == $pass){
                echo "Login Successful"."<br>";
                session_start();
                
                $_SESSION['username'] = $uname;
                $_SESSION['branch_name'] = $row['branch_name']; 
                $_SESSION['company'] = $row['com_id'];
                header("refresh: 1 ;  url = ../branch/branchprofile.php");
            }
            else{
                echo "Username or Password is incorrect"."<br>";
                header("refresh: 1 ; url = login.php");
            }
    }
        // for the customer
        else{
            $sql = "SELECT * FROM customer WHERE uname = '$uname' AND cpass = '$pass'";
            //$result = $conn->query($sql); 
            $result = mysqli_query($conn, $sql);
            
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);   
           /* $count = mysqli_num_rows($result);
            if($count == 1) {
                echo "Login Successful"."<br>";
                header("refresh: 1 ; url = customer.php");
            }
            else{
                echo "Login Failed"."<br>";
                header("refresh: 1 ; url = login.php");
            }*/
            if(isset($row['uname']) == $uname && isset($row['cpass']) == $pass){
                echo "Login Successful"."<br>";
                session_start();
                
                $_SESSION['username'] = $uname;
                $_SESSION['name'] = $row['name']; 
                $_SESSION['email'] = $row['cemail'];
                $_SESSION['phone'] = $row['cmobile'];
                header("refresh: 1 ;  url = ../customer/userprofile.php");
            }
            else{
                echo "Username or Password is incorrect"."<br>";
                header("refresh: 1 ; url = login.php");
            }
           

        }
      }
       


    }

}
    


?>