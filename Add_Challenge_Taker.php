<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['challenge_number']) && !empty($_POST['game_version']))
    {
        //Challenge
        $challenge=new Challenge();
        $challenge->setChallenge_number($_POST['challenge_number']);
        $challenge_exist=$challenge->loadChallenge($database);
        
        //Platform
        $platform=new Platform();
        $platform->setPlatform_code($_POST['game_version']);
        $platform_exist=$platform->loadPlatform($database);
        
        //New challenge_taker
        $challenge_taker=new Challenge_taker();
        $challenge_taker->setForInsertChallenge_taker($session_user, $challenge, $platform);
        $challenge_taker_exist=$challenge_taker->loadChallenge_taker($database);
        if(!($challenge_taker_exist))
        {
            $ok=$challenge_taker->insert($database);
            //Notification for the originator user
            if($ok AND $session_user->getUser_number()!=$challenge->getChallenge_originator()->getUser_number())
            {
                $notif=new Notification();
                $notif->setNotification_user($challenge->getChallenge_originator());
                $notif->setMessageChallenge_taker($session_user->getuser_id(), $challenge);
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