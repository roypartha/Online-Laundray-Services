
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com">
    <title> Admin | Login </title>
</head>
<body>
    <div >
      
       

       <div class= "div1">

            <h3 style="text-align:; color: blue;">ADMIN LOGIN</h3>
            <form id="form" action="admin_log_process.php" method="post"  >
                <div id ="login">
                 <input type="text" name="uname" id="username" placeholder="Enter Uname" ><br>
                    <small></small>
                </div>
                
                <div id ="login">
                   <input type="password" name="pass" id="password" placeholder="Enter Password" ><br>
                    <small></small>
                </div>
               

                <input type="reset" name="reset" value="Reset">

                <input type="submit" name="submit" value="Login" >
                <br>
                <hr>
                <br>
   
                <button> <a href="forget_password.php">Forget Password ?</a></button>
    
    

            </form>
        

       </div>
       <div class="top">
       <img src="logo1.jfif" alt="logo" width="80px">
   
       </div>

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
            formControl.className = 'login error';
            small.innerText = message;
        }
        function setSuccessFor(input){
            const formControl = input.parentElement;
            formControl.className = 'login success';
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