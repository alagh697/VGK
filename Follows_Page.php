<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');


if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if(isset($_GET) AND !empty($_GET['user_id']))
    {
        $theUser=new User();
        $theUser->setUser_id(htmlspecialchars($_GET['user_id']));
        $user_exist=$theUser->loadUserById($database);
        if($user_exist)
        {
            if($theUser->getUser_number()==$session_user->getUser_number())
            {
                require('VGK_Require/Follows_Session_User.php');
            }
            else
            {
                require('VGK_Require/Follows_Other_User.php');
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
    
}
else
{
    header("Location:index.php");
}            
?>

