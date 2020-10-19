<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['message']))
    {
        //target user
        $target_user=new User();
        if(isset($_POST['target_user_number']) AND !empty($_POST['target_user_number']))
        {
            $target_user->setUser_number(htmlspecialchars($_POST['target_user_number']));
            $target_user_exist=$target_user->loadUser($database);
        }
        else
        {
            $target_user->setUser_number('0');
        }
        
        //Message
        $message= addslashes(htmlspecialchars($_POST['message']));
        //event url
        $event_url="";
        //Game version
        $game=new Game();
        $platform=new Platform();
        if(isset($_POST['game_platform']) AND !empty($_POST['game_platform']))
        {
            echo $_POST['game_platform'];
            $game_version=explode("/",$_POST['game_platform']);
            $game_number=$game_version[0];
            $platform_code=$game_version[1];
            $game->setGame_number($game_number);
            $game_exist=$game->loadGame($database);
            $platform->setPlatform_code($platform_code);
            $platform_exist=$platform->loadPlatform($database);
        }
        else
        {
            $game->setGame_number('0');
            $platform->setPlatform_code('');
        }

        //Insert post
        $post=new Post();
        $post->setForInsertPost($session_user, $target_user, $game, $platform, $message, $event_url);
        
        $ok=$post->insert($database);
        if($ok)
        {
            //If the insert worked we redirect to the session_user wall
            header("Location:Profile.php?user_id=".$session_user->getUser_id());
        }
        else 
        {
            //If the insert didn't worked we redirect to the home page
            header("Location:index.php");
        } 
    }
    else
    {
        //add error
        header("Location:index.php");
    }
}
else
{
    header("Location:index.php");
}