<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');


if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    $error="";
    if(isset($_POST) OR isset($_FILES))
    {
        require('VGK_Require/Update_Profile_Picture.php');
        require('VGK_Require/Update_Profile_Info.php');
        require('VGK_Require/Update_Profile_Gamertags.php');
        if(!empty($error))
        {
            header("Location:Settings.php?error=".$error);
        }
        else
        {
            header("Location:Profile.php?user_id=".$session_user->getUser_id());
        }
    }
    else 
    {
        header("Location:Settings.php");
    }
    
}
else
{
    header("Location:index.php");
}            
?>

