


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="add_pick&deliver_emp.css">
    <title>Registertion | Pick & Deliver </title>
</head>
<body>
    <main>

    <div class="div1" >
        <!--make text registration page for transpoter with image-->
        <img  src="../logo1.jfif" alt="logo" width="80">
        <h1>Laundry Express</h1> <br>
        <h2>Registration Page For Deliver person</h2> <br>
        <h4>ID Formate :</h4> <p class ="pl">pd-XXXXX(pd-20348)</p>
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
        <form action="pick&deliver_process.php" method="POST">
            <table>
                <tr>
                    <td class ="td_all">First Name</td>
                    <td><input type="text" name="fName" placeholder="First Name"></td>
                </tr>
               
                <tr>
                    <td class ="td_all">Address</td>
                    <td><input type="text" name="address" placeholder="Address"></td>
                </tr>
                <tr>
                    <td class="td_all">NID</td>
                    <td><input type="text" name="nid" placeholder="National ID Number"></td>
                </tr>
                <tr>
                    <td class ="td_all">Phone Number</td>
                    <td><input type="text" name="phone" placeholder="Phone Number"></td>
                </tr>
                <tr>
                    <td class ="td_all">Salary</td>
                    <td><input type="text" name="salary" placeholder="Salary"></td>
                </tr>
                <tr>
                    <td class ="td_all">Department</td>
                    <td><select name="dept">
                        <option value="LOGISTIC">Logistic </option>
                        </select>
                    </td>
                <tr>
                
                <tr>
                    <td class ="td_all">Employee Type</td>
                    <td><select name="emp_type">
                        <option value="1">Pick & Deliver</option>

                    </select></td>

                </tr>
                <tr>
                    <td class ="td_all">Join Date</td>
                    <td><input type="date" name="jDate" placeholder="Join Date"></td>
                </tr>
                <tr>
                    <td class ="td_all">Working Area</td>
                    <td><input type="text" name="wArea" placeholder="Working Area"></td>
                </tr>

                
                <tr>
                    <td class ="td_all">ID</td>
                    <td><input type="text" name="uname" placeholder="Username"></td>
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