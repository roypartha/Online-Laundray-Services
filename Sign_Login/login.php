

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>

   
   
    <div class="login">

       <h1>Login</h1>

       <form id = 'form' action="loginprocess.php" method="post">
            <div id = "login1">
                <input type="text"  name="uname" id ="username"  placeholder="Username"><br>
                <small></small>
            </div> 
            
            <div id ="login1">
                <input type="password"  name="pass" id ="password"  placeholder="Password"><br>
                <small></small>

            </div>
           <p><a href="../Home/forget_password.php" class="a1">Forget Password ?  </a> </p> 
            <input type="submit"class ="submit" name="submit" value="Submit">
            <p class ="p1">Create New Account..!<a href="signup.php" class ="p2"> Signup</a></p> 

       
         
    </form>
    </div>

    <div class="top">
        <a href="../Home/index.php"><img src="../img/logo1.jfif" alt="logo" width="80px"></a>
   
   </div>

   <script type="text/javascript">
         const form = document.getElementById('form');
         const username = document.getElementById('username');
         const password = document.getElementById('password');

         form.addEventListener('input',(e)=>{
        e.preventDefault();
        validate(); 
        // submit form
       // successMasg();

    });

       const validate = () =>{
        const usernameValue = username.value.trim();
        const passwordValue = password.value.trim();

        if(usernameValue === ''){
            setErrorFor(username,'Username cannot be blank');
        }else if(!isUsername(usernameValue)){
            setErrorFor(username,'Not a valid username');
        }else{
            setSuccessFor(username);
        }
       
        if(passwordValue === ''){
            setErrorFor(password,'Password cannot be blank');
        }
        else if(!isPassword(passwordValue)){
            setErrorFor(password,'Not a valid password');
        }else{
            setSuccessFor(password);
        }


       
    }

    function setErrorFor(input,message){
            const formControl = input.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'login1 error';
            small.innerText = message;
        }
        function setSuccessFor(input){
            const formControl = input.parentElement;
            formControl.className = 'login1 success';
        }
        function isUsername(usernameValue){
            return /^[a-zA-Z0-9]{2,30}$/.test(usernameValue);
        }
        //password validation where password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters
        function isPassword(passwordValue){
            return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(passwordValue);
        }


     
    </script>
</body>
</html>