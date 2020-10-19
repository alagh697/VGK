<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['session_number']) && !empty($_POST['user_number']))
    {
        //Session
        $session=new Session();
        $session->setSession_number($_POST['session_number']);
        $session_exist=$session->loadSession($database);
        
        //user
        $user=new User();
        $user->setUser_number(htmlspecialchars($_POST['user_number']));
        $user_exist=$user->loadUser($database);
        
        //Message
        $message="";
        if(!empty($_POST['message']))
        {
            $message= addslashes(htmlspecialchars($_POST['message']));
        }
        
        //Load session_invitation
        $session_invitation=new Session_invitation();
        $session_invitation->setForInsertSessionInvitation($session, $user, $message);
        $session_invitation_exist=$session_invitation->loadSessionInvitation($database);
        
        //send invitation
        if(!($session_invitation_exist))
        {
            $ok=$session_invitation->insert($database);
            //Notification for the invited user
            if($ok)
            {
                $notif=new Notification();
                $notif->setNotification_user($user);
                $notif->setMessageSession_invitation($session_user->getuser_id(), $session);
                $ok=$notif->insert($database);
            }
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