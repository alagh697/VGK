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
        
        //delete
        if($duel_exist)
        {
            $ok=$duel->delete($database);
            //Notif for the originator the target deny the duel
            if($ok AND $session_user->getUser_number()==$duel->getDuel_target()->getUser_number())
            {
                $notif=new Notification();
                $notif->setNotification_user($duel->getDuel_originator());
                $notif->setMessageDuel_Deny($session_user->getUser_id(), $duel->getDuel_title());
                $ok=$notif->insert($database);
            }
        }
        
        //If the insert worked we redirect to the duel detail 
        header("Location:Duels_Section.php");
    }
    else
    {
        //add error
         header("Location:Duels_Section.php");
    }
}
else
{
    header("Location:index.php");
}