function validate()
{
    var password=document.getElementById("password").value;
    //validation for email input
    if (isuseremailvalid()){
        event.preventDefault();
        document.getElementById("email-error").style.display="block";
    }
    else{
        document.getElementById("email-error").style.display="none";
    }
    //validation for password input
    if (password.length < 8 || password.length > 32){
        event.preventDefault();
        document.getElementById("password-error").style.display="block";

    }
    else{
        document.getElementById("password-error").style.display="none";
    }
}
//function for validating email input to a certain formula.
function isuseremailvalid()
{
    var emailText=document.getElementById("email").value;
    var emailExpr = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (emailText.match(emailExpr)){
        return false;
    }
    else{
        return true;
    }
}