<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_GET) && !empty($_GET['challenge_number']))
    {
        //Challenge
        $challenge=new Challenge();
        $challenge->setChallenge_number($_GET['challenge_number']);
        $challenge_exist=$challenge->loadChallenge($database);
        
        //delete
        if($challenge_exist)
        {
            $ok=$challenge->delete($database);
        }
        
        //If the insert worked we redirect to the challenge detail 
        header("Location:Challenges_Section.php");
    }
    else
    {
        //add error
         header("Location:Challenges_Section.php");
    }
}
else
{
    header("Location:index.php");
}