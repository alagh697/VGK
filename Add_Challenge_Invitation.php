<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['challenge_number']) && !empty($_POST['user_number']))
    {
        //Challenge
        $challenge=new Challenge();
        $challenge->setChallenge_number($_POST['challenge_number']);
        $challenge_exist=$challenge->loadChallenge($database);
        
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
        
        //Load challenge_invitation
        $challenge_invitation=new Challenge_invitation();
        $challenge_invitation->setForInsertChallengeInvitation($challenge, $user, $message);
        $challenge_invitation_exist=$challenge_invitation->loadChallengeInvitation($database);
        
        //send invitation
        if(!($challenge_invitation_exist))
        {
            $ok=$challenge_invitation->insert($database);
            //Notification for the invited user
            if($ok)
            {
                $notif=new Notification();
                $notif->setNotification_user($user);
                $notif->setMessageChallenge_invitation($session_user->getuser_id(), $challenge);
                $ok=$notif->insert($database);
            }
        }
        
        //If the insert worked we redirect to the challenge detail 
        header("Location:Challenge_Detail.php?challenge_number=".$challenge->getChallenge_number());
    }
    else
    {
        //add error
        header("Location:Challenge_Detail.php?challenge_number=".$challenge->getChallenge_number());
    }
}
else
{
    header("Location:index.php");
}