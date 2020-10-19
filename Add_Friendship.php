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
                $friendship=new Friendship();
                $friendship->setForInsertFriendship($theUser, $session_user);
                $ok=$friendship->insert($database);
                if($ok)
                {
                    $ok=$friend_request_received->delete($database);
                    //Add mutual follow if not the case
                    //add follow session user as follower if not the case
                    $follow=new Follow();
                    $follow->setFollow_following($session_user);
                    $follow->setFollow_followed($theUser);
                    $follow_exist=$follow->loadFollow($database);
                    if(!($follow_exist))
                    {
                        $ok=$follow->insert($database);
                    }
                    //add follow the other user as follower if not the case
                    $follow->setFollow_following($theUser);
                    $follow->setFollow_followed($session_user);
                    $follow_exist=$follow->loadFollow($database);
                    if(!($follow_exist))
                    {
                        $ok=$follow->insert($database);
                    }
                    
                    //Notification for both friends
                    if($ok)
                    {
                        //to the other user
                        $notif=new Notification();
                        $notif->setNotification_user($theUser);
                        $notif->setMessageFriendship($session_user->getuser_id());
                        $ok=$notif->insert($database);
                        //to the session user
                        $notif->setNotification_user($session_user);
                        $notif->setMessageFriendship($theUser->getuser_id());
                        $ok=$notif->insert($database);
                    }
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