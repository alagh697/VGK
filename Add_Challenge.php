<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['game']) && !empty($_POST['title']))
    {
        $game_number=$_POST['game'];
        $game=new Game();
        $game->setGame_number($game_number);
        $game_exist=$game->loadGame($database);
        $title=  addslashes(htmlspecialchars($_POST['title']));
        $description="";
        if(!empty($_POST['description']))
        {
            $description= addslashes(htmlspecialchars($_POST['description']));
        }
        
        //end date
        $end_date='0000-00-00 00:00:00';
        if(isset($_POST['end_date_check']))
        {
            $date= explode("/",$_POST['end_date']);
            $date_day=$date[0];
            $date_month=$date[1];
            $date_year=$date[2];
            $end_date=$date_year."-".$date_month."-".$date_day." ".$_POST['end_time'].":00";
        }
        
        //New challenge
        $challenge=new Challenge();
        $challenge->setForInsertChallenge($session_user, $game, $title, $description, $end_date);
        $ok=$challenge->insert($database);
        //If the insert worked we redirect to the challenge user's challenges list
        header("Location:Challenges_Section.php");
    }
    else
    {
        header("Location:Challenges_Section.php");
    }
}
else
{
    header("Location:index.php");
}