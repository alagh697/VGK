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
        if($user_exist AND ($theUser->getUser_number()!=$session_user->getUser_number()))
        {
            $follow=new Follow();
            $follow->setFollow_following($session_user);
            $follow->setFollow_followed($theUser);
            $follow_exist=$follow->loadFollow($database);
            if(!($follow_exist))
            {
                $ok=$follow->insert($database);
                //Notification for the followed user
                if($ok)
                {
                    $notif=new Notification();
                    $notif->setNotification_user($theUser);
                    $notif->setMessageFollow($session_user->getuser_id());
                    $ok=$notif->insert($database);
                }
            }
            header("Location:Profile.php?user_id=".$theUser->getUser_id());
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