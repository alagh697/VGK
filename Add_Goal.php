<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['game_platform']) && !empty($_POST['title']))
    {
        $game_version=explode("/",$_POST['game_platform']);
        $game_number=$game_version[0];
        $game=new Game();
        $game->setGame_number($game_number);
        $game_exist=$game->loadGame($database);
        $platform_code=$game_version[1];
        $platform=new Platform();
        $platform->setPlatform_code($platform_code);
        $platform_exist=$platform->loadPlatform($database);
        $title=  addslashes(htmlspecialchars($_POST['title']));
        $description="";
        if(!empty($_POST['description']))
        {
            $description= addslashes(htmlspecialchars($_POST['description']));
        }
        echo $description;
        $need_help=0;
        if(isset($_POST['need_help']))
        {
            $need_help= 1;
        }
        /*$current_date=new DateTime();
        $creation_date=$current_date->format("Y-m-d H:i:s");*/
        //New Goal
        $goal=new Goal();
        $goal->setForInsertGoal($session_user, $game, $platform, $title, $description, $need_help);
        $ok=$goal->insert($database);
        header("Location:Goals_Section.php");
    }
    else
    {
        //Add error
        header("Location:Goals_Section.php");
    }
}
else
{
    header("Location:index.php");
}