<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');


if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    if(isset($_GET) AND !empty($_GET['availability_number']))
    {
        $availability=new Availability();
        $availability->setAvailability_number($_GET['availability_number']);
        $availability_exist=$availability->loadAvailability($database);
        if($availability_exist)
        {
            require('VGK_Require/Availability_Detail_Page.php');
        }
        else 
        {
           header("Location:index.php");
        }
    }
    else 
    {
        header("Location:index.php");
    }
}
else
{
    header("Location:index.php");
}            
?>