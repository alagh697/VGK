<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');
if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if(isset($_GET) AND !empty($_GET['main_game_platform']))
    {
        $main_game_version=explode("/",$_GET['main_game_platform']);
        $game_number=$main_game_version[0];
        $game=new Game();
        $game->setGame_number($game_number);
        $game_exist=$game->loadGame($database);
        $platform_code=$main_game_version[1];
        $platform=new Platform();
        $platform->setPlatform_code($platform_code);
        $platform_exist=$platform->loadPlatform($database);
        if($game_exist AND $platform_exist)
        {
            //Test if the game is available on this platform
            $version=new Game_platform();
            $version->setAll($game, $platform);
            $version_exist=$version->loadGamePlatform($database);
            if($version_exist)
            {
                $session_user->setUser_main_game($game);
                $session_user->setUser_main_platform($platform);
                $ok=$session_user->updateUserMainGamePlatform($database); 
            }
            header("Location:Profile.php?user_id=".$session_user->getUser_id()."&page=library");
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

