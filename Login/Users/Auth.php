<?php
 include '../Controller/UserC.php';
 $error = "";
 $user = null;
 $admin = null;
 $UserC = new ClientC();
 session_start();
 $user=$UserC->recupereruser_email($_POST["email"]);
 if($user)
 {
     if($user["pwd"]==$_POST["pwd"])
     {
         $_SESSION["clientemail"]=$_POST["email"];
         header("Location: ../../index.php");
     }
     else {
     header("Location: Login.php");
     }
 }else {
     header("Location: Login.php");
 }
?> 