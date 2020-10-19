<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['game_platform']) && !empty($_POST['title']) && !empty($_POST['start_date']) && !empty($_POST['start_time']) && !empty($_POST['duration']) && !empty($_POST['nb_player']))
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
        $max_player=$_POST['nb_player'];
        //start date
        $date= explode("/",$_POST['start_date']);
        $date_day=$date[0];
        $date_month=$date[1];
        $date_year=$date[2];
        $start_date=$date_year."-".$date_month."-".$date_day." ".$_POST['start_time'].":00";
        //end date
        $start_date_datetime=  new DateTime($start_date);
        $duration=$_POST['duration'];
        //we add the duration in hours to the start datetime
        $start_date_datetime->add(new DateInterval('PT'.$duration.'H'));
        $end_date=date_format($start_date_datetime,'Y-m-d H:i:s');
        //Mic on
        $microphone=0;
        if(isset($_POST['microphone']))
        {
            $microphone= 1;
        }
        //Private
        $private=0;
        if(isset($_POST['private']))
        {
            $private= 1;
        }
        //New session
        $session=new Session();
        $session->setForInsertSession($session_user, $game, $platform, $max_player, $title, $description, $start_date, $end_date, $microphone, $private);
        $ok=$session->insert($database);
        //If the insert worked we redirect to the session user's sessions list
        header("Location:Sessions_Section.php?page=yours");
    }
    else
    {
        header("Location:Sessions_Section.php");
    }
}
else
{
    header("Location:index.php");
}