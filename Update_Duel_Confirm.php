<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_GET) && !empty($_GET['duel_number']))
    {
        //Duel
        $duel=new Duel();
        $duel->setDuel_number($_GET['duel_number']);
        $duel_exist=$duel->loadDuel($database);
        
        //update start date
        if($duel_exist)
        {
            $ok=$duel->updateDuelConfirm($database);
            //Notification for the originator
            if($ok)
            {
                $notif=new Notification();
                $notif->setNotification_user($duel->getDuel_originator());
                $notif->setMessageDuel_Confirm($session_user->getuser_id(), $duel);
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