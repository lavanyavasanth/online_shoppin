    //getting all input objects
var username = document.forms["valform"]["username"];
var password = document.forms["valform"]["password"];
var firstname = document.forms["valform"]["firstname"];
var lastname = document.forms["valform"]["lastname"];
var email = document.forms["valform"]["email"];
var role = document.forms["valform"]["role"];
//getting all error display objects
var msg1 = document.getElementById("msg1");
var msg2 = document.getElementById("msg2");
var msg3 = document.getElementById("msg3");
var msg4 = document.getElementById("msg4");
var msg5 = document.getElementById("msg5");
var msg6 = document.getElementById("msg6");
//setting all event listeners
username.addEventListener("blur",unameVerify,true);
password.addEventListener("blur",pnameVerify,true);
firstname.addEventListener("blur",fnameVerify,true);
lastname.addEventListener("blur",lnameVerify,true);
email.addEventListener("blur",emailVerify,true);
role.addEventListener("blur",roleVerify,true);
//validation function
function errmsg(){
    if(username.value == ""){
        username.style.border = "1px solid red";
        msg1.textContent = "Username is required";
        username.focus();
        return false;
    }
     if(password.value == ""){
        password.style.border = "1px solid red";
        msg2.textContent = "Password is required with atleast 1 number";
        password.focus();
        return false;
    }
     if(firstname.value == ""){
        firstname.style.border = "1px solid red";
        msg3.textContent = "Firstname is required";
        firstname.focus();
        return false;
    }
     if(lastname.value == ""){
        lastname.style.border = "1px solid red";
        msg4.textContent = "Lastname is required";
        lastname.focus();
        return false;
    }
     if(email.value == ""){
        email.style.border = "1px solid red";
        msg5.textContent = "Email is required";
        email.focus();
        return false;
    }
     if(role.value == ""){
        role.style.border = "1px solid red";
        msg6.textContent = "Role is required";
        role.focus();
        return false;
    }
}
//event handler function
function unameVerify(){
    if(username.value !==""){
         username.style.border = "1px solid #5E6E66";
         msg1.innerHTML = "";
        return true;
    }
}
function pnameVerify(){
    if(password.value !==""){
         password.style.border = "1px solid #5E6E66";
         msg2.innerHTML = "";
        return true;
    }
}
function fnameVerify(){
    if(firstname.value !==""){
         firstname.style.border = "1px solid #5E6E66";
         msg3.innerHTML = "";
        return true;
    }
}
function lnameVerify(){
    if(lastname.value !==""){
         lastname.style.border = "1px solid #5E6E66";
         msg4.innerHTML = "";
        return true;
    }
}
function emailVerify(){
    if(email.value !==""){
         email.style.border = "1px solid #5E6E66";
         msg5.innerHTML = "";
        return true;
    }
}
function roleVerify(){
    if(role.value !==""){
         role.style.border = "1px solid #5E6E66";
         msg6.innerHTML = "";
        return true;
    }
}


