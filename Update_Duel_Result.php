<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['duel_number']) && !empty($_POST['winner_number']))
    {
        //Duel
        $duel=new Duel();
        $duel->setDuel_number($_POST['duel_number']);
        $duel_exist=$duel->loadDuel($database);
        
        //user
        $winner=new User();
        $winner->setUser_number(htmlspecialchars($_POST['winner_number']));
        $winner_exist=$winner->loadUser($database);
        
        $progress="";
        if(!empty($_POST['progress']))
        {
            $progress= addslashes(htmlspecialchars($_POST['progress']));
        }
        
        //update result
        if($duel_exist)
        {
            $duel->setDuel_winner($winner);
            $duel->setDuel_progress($progress);
            $ok=$duel->updateDuelResult($database);
            //Notification for the taker user
            if($ok)
            {
                $notif=new Notification();
                $notif->setNotification_user($duel->getDuel_target());
                $notif->setMessageDuel_Result($session_user->getUser_id(), $duel);
                $ok=$notif->insert($database);
            }
        }
        
        //If the insert worked we redirect to the duel detail 
        header("Location:Duel_Detail.php?duel_number=".$duel->getDuel_number());
    }
    else
    {
        //add error
        header("Location:Duel_Detail.php?duel_number=".$duel->getDuel_number());
    }
}
else
{
    header("Location:index.php");
}