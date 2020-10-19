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
            //Test if the session user already received a friend request from the user
            $friend_request_received=new Friend_request();
            $friend_request_received->setRequest_sender($theUser);
            $friend_request_received->setRequest_target($session_user);
            $friend_request_exist=$friend_request_received->loadFriend_request($database);
            if($friend_request_exist)
            {
                $ok=$friend_request_received->delete($database);
            }
            else
            {
                //Test if the session user already sent a friend request to the user
                $friend_request_sent=new Friend_request();
                $friend_request_sent->setRequest_sender($session_user);
                $friend_request_sent->setRequest_target($theUser);
                $friend_request_exist=$friend_request_sent->loadFriend_request($database);
                if($friend_request_exist)
                {
                    $ok=$friend_request_sent->delete($database);
                }
            }
            header("Location:Friend_Requests_Page.php");
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