<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_GET) && !empty($_GET['session_number']))
    {
        //Session
        $session=new Session();
        $session->setSession_number($_GET['session_number']);
        $session_exist=$session->loadSession($database);
        
        //delete
        if($session_exist)
        {
            $ok=$session->delete($database);
        }
        
        //If the insert worked we redirect to the session detail 
        header("Location:Sessions_Section.php");
    }
    else
    {
        //add error
         header("Location:Sessions_Section.php");
    }
}
else
{
    header("Location:index.php");
}