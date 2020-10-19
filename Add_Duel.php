<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['target_number']) && !empty($_POST['game_platform']) && !empty($_POST['title']))
    {
        //Target user
        $target_user_number=$_POST['target_number'];
        $target_user=new User();
        $target_user->setUser_number($target_user_number);
        $target_user_exist=$target_user->loadUser($database);
        //Game version
        $game_version=explode("/",$_POST['game_platform']);
        $game_number=$game_version[0];
        $game=new Game();
        $game->setGame_number($game_number);
        $game_exist=$game->loadGame($database);
        $platform_code=$game_version[1];
        $platform=new Platform();
        $platform->setPlatform_code($platform_code);
        $platform_exist=$platform->loadPlatform($database);
        //Title
        $title=  addslashes(htmlspecialchars($_POST['title']));
        $description="";
        if(!empty($_POST['description']))
        {
            $description= addslashes(htmlspecialchars($_POST['description']));
        }
        //New duel
        $duel=new Duel();
        $duel->setForInsertDuel($session_user, $target_user, $game, $platform, $title, $description);
        $ok=$duel->insert($database);
        //Notification for the target user
        if($ok)
        {
            $notif=new Notification();
            $notif->setNotification_user($target_user);
            $notif->setMessageDuelInvite($session_user->getuser_id(), $game->getGame_name());
            $ok=$notif->insert($database);
        }
        //If the insert worked we redirect to the session user's availabilities list
        header("Location:Duels_Section.php");
    }
}
else
{
    header("Location:index.php");
}