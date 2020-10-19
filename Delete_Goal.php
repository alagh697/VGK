<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_GET) && !empty($_GET['goal_number']))
    {
        //Goal
        $goal=new Goal();
        $goal->setGoal_number($_GET['goal_number']);
        $goal_exist=$goal->loadGoal($database);
        
        //delete
        if($goal_exist)
        {
            $ok=$goal->delete($database);
        }
        
        //If the delete worked we redirect to the goal detail 
        header("Location:Goals_Section.php");
    }
    else
    {
        //add error
         header("Location:Goals_Section.php");
    }
}
else
{
    header("Location:index.php");
}