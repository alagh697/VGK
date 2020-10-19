<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['challenge_number']) && !empty($_POST['winner_number']))
    {
        //Challenge
        $challenge=new Challenge();
        $challenge->setChallenge_number($_POST['challenge_number']);
        $challenge_exist=$challenge->loadChallenge($database);
        
        //user
        $winner=new User();
        $winner->setUser_number(htmlspecialchars($_POST['winner_number']));
        $winner_exist=$winner->loadUser($database);
        
        //Load challenge_taker
        $challenge_taker=new Challenge_taker();
        $challenge_taker->setTake_up_challenge($challenge);
        $challenge_taker->setTake_up_user($winner);
        $challenge_taker_exist=$challenge_taker->loadChallenge_taker($database);
        
        //update verified
        if($challenge_taker_exist AND intval($challenge_taker->getTake_up_verified())==1)
        {
            $challenge->setChallenge_winner($winner);
            $ok=$challenge->updateChallengeWinner($database);
            //Notification for the taker user
            if($ok)
            {
                $notif=new Notification();
                $notif->setNotification_user($winner);
                $notif->setMessageChallenge_winner($challenge);
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