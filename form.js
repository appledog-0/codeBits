function clicked()
{
    flag=1;
//user
var User=document.getElementById('User');
if(User.value==="" || User.value==null)
{
    document.getElementById('Usererror').innerHTML="User name must fill";
    flag= 0;
}
else if(User.value.length<4){
document.getElementById('Usererror').innerHTML="User name is too short";
flag=0;
}
else{
    document.getElementById('Usererror').innerHTML="";
}

//Email
var Email=document.getElementById('Email');
var AB=Email.value.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);


if(Email.value ===""|| Email.value==null)
{
    document.getElementById('Emailerror').innerHTML="Email cant be empty";
    flag=0;
}
else if(AB!=0)
{
    document.getElementById('Emailerror').innerHTML="Email format doesnt match";
    flag=0;
}
else{
    document.getElementById('Emailerror').innerHTML="";
}



//Phone

//Password

var Password=document.getElementById('Password');
if(Password.value==="" || Password.value==null)
{
    document.getElementById('Passworderror').innerHTML="Password must fill";
}
else if(Password.value.length<4){
document.getElementById('Passworderror').innerHTML="Password is too short";

}
else{
    document.getElementById('Passworderror').innerHTML="";
}

//Confirm password

var CPassword=document.getElementById('CPassword');
if(Password.value==="" || CPassword.value==null)
{
    document.getElementById('Cpassworderror').innerHTML="Confirm Password must fill";
}
else if(Password.value!=CPassword.value){
document.getElementById('Cpassworderror').innerHTML="Password and Confirm password doesnt match";

}
else{
    document.getElementById('Cpassworderror').innerHTML="";
}
return false;
}