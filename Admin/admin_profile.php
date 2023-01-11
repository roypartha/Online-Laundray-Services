<?php
session_start();
if(isset($_SESSION['username'])){
    //echo "Welcome ".$_SESSION['username']."<br>";
    
}
else{
    
    header("refresh: 4 ; url = index.php");
    die("Please Login First");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title> Admin Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style.css"> 
    <style type="text/css">
        *{padding: 0; margin : 0;}
        a{
            text-decoration: none;
        }
        li{
            list-style: none;
        }
    </style>
</head>
<body>
    <!--<div>
        <div style= "text-align:center;">
        <h1> >>>>Laundry Express<<<< </h1>
        <h3>>>>>LESS LAUNDRY MORE TIME WITH FAMILY<<<<</h3>
        <hr>
    </div>--->

    <div>
        <header>
            <nav>
                <h2 class="loge">>>>>Laundry Express<<<<</h2>
                <ul class = "menu">
                    <li><a href="admin_profile.php">Home</a></li>
                    <li><a href="view_emp.php">View Employee</a></li>
                    <li><a href="viwecustomer.php">View Customer</a></li>
                    <li><a href="viweorder.php">View Order</a></li>
                    <li><a href="edit_profile.php">Profile</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
        
        </header>
    </div>

    <div >
        <nav class = "nav_menu">
        
            <ul class = "menu2" >
                <li><a href="#"><b>Menu</b></a>
                <li><a href="#"><b>ADD Empolyee</b><spend class ="spend_arrow"></spend></a>
                <ul>
                    <li> <a href="add empolyee/add_office_emp.php">office Empolyee </a></li>
                    <li><a href="add empolyee/add_Transpoter.php">Transpoter</a></li>
                    <li><a href="add empolyee/add_pick&deliver_emp.php">Deliver</a></li>
                </ul>
                </li>

                <li><a href="#"><b>Delete Employee</b><spend class ="spend_arrow"></a>
                <ul>
                    <li> <a href="delete empolyee/office_emp.php">office Empolyee </a></li>
                    <li><a href="delete empolyee/transpoter_emp.php"> Transpoter</a></li>
                    <li><a href="delete empolyee/pick&deliver_emp.php">Pick & Deliver</a></li>
                </ul>

                </li>

                <li><a href="#"><b>Company</b> <spend class ="spend_arrow"></a>
                <ul>
                    <li> <a href="company/add_company.php">Add Company </a></li>
                    <li><a href=""> Delete Company</a></li>
                    <li><a href="company/update_com.php">Update Company</a></li>
                </ul>
                </li>
                
                
                    
            </ul>

        </nav>

    </div> 
      
        
        
            

           

       
   

    
    
</body>
</html>


<?php
if(isset($_POST['submit1'])){
    $add_emp = $_POST['add_emp'];

    if($add_emp == "office_emp"){
        header("refresh: 0 ; url = add empolyee/add_emp.php");
    }
    elseif($add_emp == "transpoter"){
        
    }

    elseif($add_emp == "pick_del_person"){
        
    }
    else{
        echo "Please Select Employee Type";
    }
}
?>
