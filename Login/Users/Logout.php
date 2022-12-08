<?php
session_start();

unset($_SESSION["clientemail"]);
unset($_SESSION["cart"]);
header("Location: Login.php");

?>