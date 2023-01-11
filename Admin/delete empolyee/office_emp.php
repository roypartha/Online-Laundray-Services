


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Empolyee</title>
</head>
<body>
    <div>
        <div style= "margin-right: 380px;margin-left: 400px; margin-top:8px;"><h1> Laundry Express >>> </h1>
        </div>
        <button><a href="../admin_profile.php">BACK</a></button>
        <button><a href="logout.php">Logout</a></button><br><br>

    </div>
    <div>
        <form action="add_emp_process.php" method="POST">
            <table>
                <tr>
                    <td>First Name</td>
                    <td><input type="text" name="fName" placeholder="First Name"></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><input type="text" name="lName" placeholder="Last Name"></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td><input type="text" name="address" placeholder="Address"></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><input type="text" name="phone" placeholder="Phone Number"></td>
                </tr>
                <tr>
                    <td>Employee Type</td>
                    <td><select name="emp_type">
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">Employee</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="uname" placeholder="Username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pass" placeholder="Password"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="submit" value="Submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>