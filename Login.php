<?php
session_start();
require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');
if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $session_user->loadUser($database);
    header("Location:index.php");
}
else
{
    require("VGK_Require/Login_Script.php");
}
?>

