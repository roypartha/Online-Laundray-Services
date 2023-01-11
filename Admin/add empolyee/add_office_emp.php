


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <link rel="stylesheet" type="text/css" href="add_office_emp.css">
    <title>ADD OFFICE EMPOLYEE</title>
</head>
<body>
    <main>
    <div class="div1" >
        <!--make text registration page for transpoter with image-->
        <img  src="../logo1.jfif" alt="logo" width="80">
        <h1>Laundry Express</h1> <br>
        <h2>Registration Page For Office Empolyee</h2> <br>
        <h4>ID Formate :</h4> <p class ="pl">of-XXXXX(of-20348)</p>
         <h4>Password :</h4>
             
            <ul>
                <li>Must contain at least one number</li>
                <li>Must contain at least one uppercase and one lowercase letter</li>
                <li>Must contain at least one special character</li>
                <li>Must be eight characters or longer</li>
            </ul>
        
    

    </div>
    <div class ="div2">
    <h2 style="text-align:; color: blue;">Registration</h2>
        <form action="office_process.php" method="POST">
            <table>
                <tr>
                    <td class ="td_all">Name</td>
                    <td><input type="text" name="fName" placeholder="Enter Full Name"></td>
                </tr>

                <tr>
                    <td class ="td_all">Birth Date</td>
                    <td><input type="date" name="bDate" placeholder="Brith Date"></td>
                </tr>
                <tr>
                    <td class ="td_all">Address</td>
                    <td><input type="text" name="address" placeholder="Address"></td>
                </tr>
                <tr>
                    <td class ="td_all">NID</td>
                    <td><input type="text" name="nid" placeholder="National ID Number"></td>
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
                        <option value="IT">IT</option>
                        <option value="ACCOUNT">Accounting</option>
                        <option value="OPERATIONS">Operations</option>
                        <option value="LOGISTIC">Logistic </option>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td class ="td_all">Employee Type</td>
                    <td><select name="emp_type">
                        <option value="PRESIDENT">President</option>
                        <option value="MANAGER">Manager</option>
                        <option value="CLERK">Clerk</option>
                       
                    

                    </select></td>
                </tr>
                
        
                <tr>
                    <td class ="td_all">Join Date</td>
                    <td><input type="date" name="jDate" placeholder="Join Date"></td>
                </tr>
                <tr>
                    <td class ="td_all">ID</td>
                    <td><input type="text" name="uname" placeholder="ID"></td>
                </tr>
                <tr>
                    <td class ="td_all">Password</td>
                    <td><input type="password" name="pass" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
    </main>
</body>
</html>