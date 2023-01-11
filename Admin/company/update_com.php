


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="update_com.css">
    <title>Registertion | Update </title>
</head>
<body>
    <main>

    <div class="div1" >
       
        <a href="../index.php"><img  src="../logo1.jfif" alt="logo" width="80"></a>
       
        <h2>Laundry Express</h1> 
        <h3>Registration Page For Update Company</h2> 
        <h4>ID Formate :</h4>
        <p class ="pl">br-XXXXX(br-20348)</p>
        <h4>Password :</h4>
             
            <ul>
                <li>Must contain at least one number</li>
                <li>Must contain at least one uppercase and one lowercase letter</li>
                <li>Must contain at least one special character</li>
                <li>Must be eight characters or longer</li>
            </ul>

    </div>

    <div class = "div2">
        <h2 style="text-align:; color: blue;">Registration</h2>
        <form action="update_com_process.php" method="POST">
            <table>
                <tr>
                    <td class ="td_all">Company ID</td>
                    <td><input type="text" name="com_id" placeholder="Company ID"></td>
                </tr>
                <tr>
                    <td class ="td_all">Branch Area Name</td>
                    <td><input type="text" name="branch_name" placeholder="Branch Area Name"></td>
                <tr>
                    <td class="td_all">Email</td>
                    <td><input type="text" name="email" placeholder="Email"></td>
                </tr>
               
                <tr>
                    <td class ="td_all">Phone Number</td>
                    <td><input type="text" name="phone" placeholder="Phone Number"></td>
                </tr>
                <tr>
                    <td class ="td_all">Add Date</td>
                    <td><input type="date" name="jDate" placeholder="Join Date"></td>
                </tr>

                
                <tr>
                    <td class ="td_all">Branch ID</td>
                    <td><input type="text" name="branch_id" placeholder="Branch ID"></td>
                </tr>
                <tr>
                    <td class ="td_all">Password</td>
                    <td><input type="password" name="pass" placeholder="Password"></td>
                </tr>
                <tr>
                    <td class ="td_all"><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
</main>
</body>
</html>