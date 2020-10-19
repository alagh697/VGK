<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_GET) && !empty($_GET['session_number']) && !empty($_GET['user_id']))
    {
        //Session
        $session=new Session();
        $session->setSession_number($_GET['session_number']);
        $session_exist=$session->loadSession($database);
        
        //user
        $user=new User();
        $user->setUser_id(htmlspecialchars($_GET['user_id']));
        $user_exist=$user->loadUserById($database);
        
        //Load session_joiner
        $session_joiner=new Session_joiner();
        $session_joiner->setJoin_session($session);
        $session_joiner->setJoin_user($user);
        $session_joiner_exist=$session_joiner->loadSession_joiner($database);
        
        //delete session joiner
        if($session_joiner_exist)
        {
            $ok=$session_joiner->delete($database);
        }
        
        //If the insert worked we redirect to the session detail 
        header("Location:Session_Detail.php?session_number=".$session->getSession_number());
    }
    else
    {
        //add error
        header("Location:Session_Detail.php?session_number=".$session->getSession_number());
    }
}
else
{
    header("Location:index.php");
}