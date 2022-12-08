<?php
    include_once '../Controller/Client.php';
    include_once '../Controller/UserC.php';
    $error = "";
    $img="images/default.jpg";
    $user = null;
    $user_mail = null;
    $admin = null;
    $UserC = new ClientC();
    if (
		isset($_POST["nom"]) &&		
        isset($_POST["prenom"]) &&
		isset($_POST["pwd"]) && 
        isset($_POST["email"])&& 
        isset($_POST["date_naissance"])
    ) {
        if (
			!empty($_POST['nom']) &&
            !empty($_POST["prenom"]) && 
			!empty($_POST["pwd"]) && 
            !empty($_POST["email"]) && 
            !empty($_POST["date_naissance"])
        ) {
            
         if(!empty($_FILES["file"]["name"]))    
         {
         $img="../../images/".$_FILES["file"]["name"];       
         move_uploaded_file($_FILES["file"]["tmp_name"],$img);
         $img="images/".$_FILES["file"]["name"];       
         }       
        $email=$_POST["email"];
        $user_mail=$UserC->recupereruser_email($email);
        if(!empty($user_mail)){
            echo "<script>alert(\"mail has to be unique\")</script>";
        }
        if(empty($user_mail)){
            $user = new Client(
                $_POST['nom'],
                $_POST['prenom'], 
                $_POST['pwd'],
                $_POST['email'],
                $_POST['date_naissance'],
                $img,
            );
            
                $UserC->ajouteradmin($user);
                header("Location: Login.php");
        }
         
        }
        else
            $error = "Missing information";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Login.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/Zlogo.png" type="image/x-icon">
    <title>Login</title>
</head>
<body>
    <section>
    <div class="Title"><img src="images/basketball.png"></div>
    <div class="container">
        <div class="user sign_in">
            <iframe class="img_bx"src='https://my.spline.design/lowpolybasketballcopy-1cb482cbec665e70c6dfd387fd24f4c3/' frameborder='0'></iframe>
            <div class="hide-icon"></div>
            <div class="form_bx">
                <form action="Auth.php" method="POST"id="Login_form">
                    <h2>Log in</h2>
                    <input type="text"placeholder="Email"name="email"id="email">
                    <div id="cemail" style="color:red;" ></div>
                    <input type="password"placeholder="Password"id="password"name="pwd"id="password">
                    <span style="position:absolute;cursor: pointer;transform:translate(0,90%) translateX(-30px);">
                        <i class="fa-solid fa-eye"onclick="showpsdw();"></i>
                    </span>
                    <div id="cpassword" style="color:red;" ></div>
                    <input type="submit"value="Login"onclick='verif();'>
                    <p class="sign_up">Don't have an account?
                        <a onclick="toggleForm();"> Sign Up.</a>
                    </p>
                    <p class="sign_up">Just visiting?<a href="../../index.php"class="Forget-Password"> Click here</a></p>
                    
                </form>
            </div>
        </div>
        
        <div class="user sign_upbx">
            <div class="form_bx">
            <form method="POST"enctype="multipart/form-data"name="signup"id="signup">
                    <h2>Create new Account</h2>
                    <input type="text"placeholder="First Name"name="prenom"id="prenom_signup">
                    <div id="error_prenom" style="color:red;" ></div>
                    <input type="text"placeholder="Last Name"name="nom"id="nom_signup">
                    <div id="error_nom" style="color:red;" ></div>

                    <input type="email"placeholder="Email Address"name="email"id="email_signup">
                    <div id="error_email" style="color:red;" ></div>

                    <input type="date"placeholder="Date of Birth"name="date_naissance"id="date_naissance_signup">
                    <div id="error_date_naissance" style="color:red;" ></div>
                    <div id="error_Gender" style="color:red;" ></div>
                    <span style="position:absolute;cursor: pointer;transform:translate(0,90%) translateX(390px);">
                        <i class="fa-solid fa-eye eye-signup"onclick="showpsdw_signup();"></i>
                    </span>
                    <input type="password"placeholder="Create Password"name="pwd"id="pwd_signup">
                    <div id="error_pwd" style="color:red;" ></div>
                    
                    <input type="password"placeholder="Confirm Password"name="confirm_pwd"id="confirm_pwd_signup">
                    <div id="error_confirm_pwd" style="color:red;" ></div>

                    <input type="file"placeholder="choose pdp"name="file">
                    <input type="submit"value="Sign up"id="signup-btn"style="max-width: 150px"onclick="verif_signup();">
                    <p class="sign_up">Already have an account? <a onclick="toggleForm();"style="color:black;"> Login</a></p>
                </form>
            </div>
            <iframe class="img_bx"src='https://my.spline.design/realisticcapcopy-6fa1f2d8a6e067c36483211e41a9ca89/' frameborder='0' width='100%' height='100%'></iframe>
            <div class="hide-icon-2"></div>
        </div>
        
    </div>
</section>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<script>
    function toggleForm(){
    container= document.querySelector('.container');
    section= document.querySelector('section');
    container.classList.toggle('active');
    section.classList.toggle('active');
}
var state=false;
function showpsdw(){
    if(state)
    {
        document.querySelector(".fa-eye").style.color="rgb(133, 125, 125)";
        document.getElementById("password").setAttribute("type","password"); 
        state=false;
    }
    else if(!state)
    {
        document.querySelector(".fa-eye").style.color="black";
        document.getElementById("password").setAttribute("type","text");
        state=true;
    }
}
function showpsdw_signup(){
    if(state)
    {
        document.querySelector(".eye-signup").style.color="rgb(133, 125, 125)";
        document.getElementById("pwd_signup").setAttribute("type","password"); 
        state=false;
    }
    else if(!state)
    {
        document.querySelector(".eye-signup").style.color="black";
        document.getElementById("pwd_signup").setAttribute("type","text");
        state=true;
    }
}


function verif_signup(){
    var test=true;

    prenom=document.getElementById("prenom_signup");
    nom=document.getElementById("nom_signup");
    email=document.getElementById("email_signup");
    pwd=document.getElementById("pwd_signup");
    confirm_pwd=document.getElementById("confirm_pwd_signup");
    date_naissance=document.getElementById("date_naissance_signup");
    //errors
    cnom=document.getElementById("error_nom");
    cemail=document.getElementById("error_email");
    cpwd=document.getElementById("error_pwd");
    cconfirm_pwd=document.getElementById("error_confirm_pwd");
    cdate_naissance=document.getElementById("error_date_naissance");
    cprenom=document.getElementById("error_prenom");
    //empty error spaces
    cnom.innerHTML="";
    cemail.innerHTML="";
    cpwd.innerHTML="";
    cconfirm_pwd.innerHTML="";
    cdate_naissance.innerHTML="";
    cprenom.innerHTML="";
    if(!prenom.value){
        cprenom.innerHTML="Missing First name";
        test=false;
        // e.preventDefault();
        
    }
    var letters = /^[A-Za-z]+$/;
    if(!prenom.value.match(letters)&&prenom.value)
    {
        cprenom.innerHTML="First name has to be letters!";
        test=false;
        // e.preventDefault();
    }
    if(!nom.value){
        cnom.innerHTML="Missing Last name";
        test=false;
        // e.preventDefault();
    }
    if(!nom.value.match(letters)&&nom.value)
    {
        cnom.innerHTML="Last name has to be letters!";
        test=false;
        // e.preventDefault();
    }
    if(!email.value){
        cemail.innerHTML="Missing email";
        test=false;
        // e.preventDefault();
    }
   
    if(!date_naissance.value){
        cdate_naissance.innerHTML="Missing Birth date";
        test=false;
        // e.preventDefault();
    }
    
    if(!pwd.value){
        cpwd.innerHTML="Missing password";
        test=false;
        // e.preventDefault();
    }
    if(pwd.value.length<8 && pwd.value)
    {
        cconfirm_pwd.innerHTML="Password has to be 8 characters or more";
        test=false;
        // e.preventDefault();
    }
    if(!confirm_pwd.value){
        cconfirm_pwd.innerHTML="Missing confirm password";
        test=false;
        // e.preventDefault();
    }
    if(confirm_pwd.value!=pwd.value)
    {
        cconfirm_pwd.innerHTML="Passwords don't match";
        test=false;
        // e.preventDefault();
    }
    if(test)
         {
             console.log("send mail");
             sendEmail();return false;
         }
   document.forms["signup"].addEventListener("submit",function (e){
       //inputs
        if(!test){
         e.preventDefault();
         test=true;
        }else document.getElementById("signup").submit();

        console.log("test inside submit: ",test);
    });
          
    //sendEmail();reset();return false;
}


function verif(){
    
        cin=document.getElementById("email");
        password=document.getElementById("password");
        Login_form=document.getElementById("Login_form");
         ccin=document.getElementById("cemail")
         ccin.innerHTML=""
         cpassword=document.getElementById("cpassword")
         cpassword.innerHTML=""
        Login_form.addEventListener("submit",function (e){
            if(!cin.value)
        {
            ccin.innerHTML="Missing email";
           e.preventDefault();
        }
        if(!password.value)
        {
           e.preventDefault();
           cpassword.innerHTML="Missing password"
        }
        });
    
   
    
}

date_naissance=document.getElementById("date_naissance_signup");
var today=new Date;
    var dd=String(today.getDate()).padStart(2,'0');
    var yyyy=String(today.getFullYear()-18);
    var mm=String(today.getMonth()+1).padStart(2,'0');
    date_naissance.max=yyyy+"-"+mm+"-"+dd;



    function sendEmail(){
    var email=document.getElementById("email_signup").value;
    //console.log(email);
        Email.send({
        Host : "smtp.gmail.com",
        Username : "oussama.ayari1@esprit.tn",
        Password : "201JMT3063",
        To : email,
        From :'oussama.ayari1@esprit.tn',
        Subject : "ZESTY Welcomes you with its best offers",
        Body : "We thank you for making an account on our platform please respect our guidelines ! Confirm your email here"
    });
    }
    
</script>
</body>
</html>