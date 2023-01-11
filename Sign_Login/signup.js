function check_fullname(){
    var fullname = document.getElementById('f_name').value;
    var fullname_regex = /^[a-zA-Z ]{3,25}$/;
    if(fullname_regex.test(fullname)){
        document.getElementById('fullname_error').innerHTML = "Name is valid";
        document.getElementById('fullname_error').style.color = "blue";
        document.getElementById('fullname_error').style.fontSize = "12px";
        document.getElementById('fullname_error').style.marginTop = "-10px";
        return true;
    }
    else{
        document.getElementById('fullname_error').innerHTML = "Name is not valid";
        document.getElementById('fullname_error').style.color='red';
        document.getElementById('fullname_error').style.fontSize = "12px";
        document.getElementById('fullname_error').style.marginTop = "-10px";
        return false;
    }
}