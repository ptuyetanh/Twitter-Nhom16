function showsignuppassword(){
    let password1=document.getElementById("inputpassword1");
    let password2=document.getElementById("inputpassword2");
    if(password1.type=== "password" || password2.type ==="password"){
        password1.type="text";
        password2.type="text";
    }else{
        password1.type="password";
        password2.type="password";
    }
}
function showsigninpassword(){
    let password=document.getElementById("inputPassword");
    if(password.type === "password"){
        password.type="text";
    }else{
        password.type="password";
    }
}