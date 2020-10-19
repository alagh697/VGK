<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_GET) && !empty($_GET['challenge_number']) && !empty($_GET['user_id']))
    {
        //Challenge
        $challenge=new Challenge();
        $challenge->setChallenge_number($_GET['challenge_number']);
        $challenge_exist=$challenge->loadChallenge($database);
        
        //user
        $user=new User();
        $user->setUser_id(htmlspecialchars($_GET['user_id']));
        $user_exist=$user->loadUserById($database);
        
        //Load challenge_taker
        $challenge_taker=new Challenge_taker();
        $challenge_taker->setTake_up_challenge($challenge);
        $challenge_taker->setTake_up_user($user);
        $challenge_taker_exist=$challenge_taker->loadChallenge_taker($database);
        
        //delete
        if($challenge_taker_exist)
        {
            $ok=$challenge_taker->delete($database);
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