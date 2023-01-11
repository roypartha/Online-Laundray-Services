<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup|Laundry Express</title>
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico">
    
    <link rel="stylesheet" type="text/css" href="signup.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com">

</head>
<body>
    <div>
        <div >
            <header>
            <nav>
                <a class="loge" href="../Home/index.php"><img src="../img/Lexpress.png" alt="logo" width="200px"></a>
           
                <ul class="menu">
                    <li><a href="../Home/index.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="../Home/contact.php">Contact</a></li>
                    <li><a href="../Home/about.php">About</a></li>
                </ul>
            </nav>
        
        
        </header>    

    </div>
    <div class = "div2"> 
    <h3 >Signup</h3>

        <form id= 'form' action="signupprocess.php" method="post"  >
             <div class = "sign">
                <input type="text" name="fname" id ="fname" placeholder="Enter Your Name" ><br>
                <small>Error massage</small> 
                    
             </div>
             <div class = "sign">
                <input type="text" name="username" id="username"  placeholder="Enter Username " ><br>
                <small>Error massage</small>
             </div>
            <div class = "sign">
                <input type="email" name="mail" id="mail"  placeholder="Enter Your Email " ><br>
                <small>Error massage</small>
            </div>
            <div class = "sign">
                <input type="text" name="Num" id="number" placeholder=" Enter Your Mobile Number" ><br>
                <small>Error massage</small>
            </div>
            <div class = "sign">
                <input type="password" name="pass" id="password"  placeholder="Password" ><br>
                <small>Error massage</small>
            </div>
            <div class = "sign">
                <input type="password" name="cpass" id="compassword"  placeholder="Confirm Password" ><br>
                <small>Error massage</small>
            </div>

            <br><br>
            <input type="submit" name="submit" value="Submit">
       
        
    </form>
    </div>

    </div>

    <div class="top">
        <a href="../Home/index.php"><img src="../img/logo1.jfif" alt="logo" width="80px"></a>
   
   </div>
   <script type="text/javascript">
    const form = document.getElementById('form');
    const fname = document.getElementById('fname');
    const username = document.getElementById('username');
    const mail = document.getElementById('mail');
    const number = document.getElementById('number');
    const password = document.getElementById('password');
    const compassword = document.getElementById('compassword');
     //add event
    form.addEventListener('input',(e)=>{
        e.preventDefault();
        validate(); 
        // submit form
        successMasg();

    });
    const successMasg=()=>{
        let formCon = document.getElementsByClassName('form-control');
        var count = formCon.length - 1;
        for(var i=0; i<formCon.length; i++){
            if(formCon[i].className === "form-control success"){
                var a = 0 + i;
                consle.log(a);
                if(count === a){
                    form = document.forms[0] //assuming only form.
                    form.submit();
                }
            }else{
                return false;
            }
        }
    } 

    const isEmail = (mailValue) =>{
        var atSymbol = mailValue.indexOf("@");
        if(atSymbol < 1) return false;
        var dot = mailValue.lastIndexOf('.');
        if(dot <= atSymbol + 2) return false;
        if(dot === mailValue.length - 1) return false;
        return true;
    }
    //define the validate function
    const validate = () =>{
        const fnameValue = fname.value.trim();
        const usernameValue = username.value.trim();
        const mailValue = mail.value.trim();
        const numberValue = number.value.trim();
        const passwordValue = password.value.trim();
        const compasswordValue = compassword.value.trim();
        //first name
        if(fnameValue === ''){
            setErrorFor(fname,'First Name cannot be blank');
        }else if(!isName(fnameValue)){
            setErrorFor(fname,'Not a valid name');
        }else{
            setSuccessFor(fname);
        }
        //username
        if(usernameValue === ''){
            setErrorFor(username,'Username cannot be blank');
        }else if(!isUsername(usernameValue)){
            setErrorFor(username,'Not a valid username');
        }else{
            setSuccessFor(username);
        }
        //email
        if(mailValue === ''){
            setErrorFor(mail,'Email cannot be blank');
        }else if(!isEmail(mailValue)){
            setErrorFor(mail,'Not a valid email');
        }else{
            setSuccessFor(mail);
        }
        //number
        if(numberValue === ''){
            setErrorFor(number,'Number cannot be blank');
        }else if(!isNumber(numberValue)){
            setErrorFor(number,'Not a valid number');
        }else{
            setSuccessFor(number);
        }
        //password
        if(passwordValue === ''){
            setErrorFor(password,'Password cannot be blank');
        }else if(!isPassword(passwordValue)){
            setErrorFor(password,'Not a valid password');
        }else{
            setSuccessFor(password);
        }
        //confirm password
        if(compasswordValue === ''){
            setErrorFor(compassword,'Confirm Password cannot be blank');
        }else if(passwordValue !== compasswordValue){
            setErrorFor(compassword,'Password does not match');
        }else{
            setSuccessFor(compassword);
        }


    } 
    function setErrorFor(input,message){
            const formControl = input.parentElement;
            const small = formControl.querySelector('small');
            formControl.className = 'sign error';
            small.innerText = message;
        }
        function setSuccessFor(input){
            const formControl = input.parentElement;
            formControl.className = 'sign success';
        }
        function isName(fnameValue){
            return /^[a-zA-Z ]{2,30}$/.test(fnameValue);
        }
        function isUsername(usernameValue){
            return /^[a-zA-Z0-9]{2,30}$/.test(usernameValue);
        }
        // number validation where number should be 11 digit and start with 01 and 3rd digit should be 3,4,5,6,7,8,9
        function isNumber(numberValue){
            return /^01[3-9]\d{8}$/.test(numberValue);
        }
        // password validation where password should be 8 character long and contain at least one uppercase, one lowercase, one number and one special character
        function isPassword(passwordValue){
            return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/.test(passwordValue);
        }

   </script>
    
</body>
</html>
