


//form1
function vfun(){
    var uname=document.forms["myform"]["uname"].value;
    var upswd=document.forms["myform"]["upswd"].value;

if(uname != '' && upswd != ''){
    alert("Login Successful");
}
}
//form2

function vfun1(){
    var uname1=document.forms["myform1"]["uname1"].value;
    var email=document.forms["myform1"]["email"].value;
    var upswd1=document.forms["myform1"]["upswd1"].value;
    var cfupswd=document.forms["myform1"]["cfupswd"].value;

if(uname1 != '' && upswd1 != '' && email != '' && cfupswd!=''){
    alert("Registration Successful");
}

}