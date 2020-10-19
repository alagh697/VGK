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
        
        if($goal_exist)
        {
            //Goal copy
            $goal_copy=new Goal();
            $goal_copy->setGoal_copy($goal);
            $goal_copy->setGoal_user($session_user);
            $goal_copy_exist=$goal_copy->loadGoalCopy($database);
            if(!($goal_copy_exist))
            {
                $goal_copy->setForInsertGoalCopy($goal->getGoal_game(), $goal->getGoal_platform(), $goal->getGoal_title(), $goal->getGoal_description(), $goal->getGoal_need_help());
                $ok=$goal_copy->insertGoalCopy($database);
            }  
        }
        //If the delete worked we redirect to the goal detail 
        header("Location:Goal_Detail.php?goal_number=".$goal->getGoal_number());
    }
    else
    {
        //add error
         header("Location:Goal_Detail.php?goal_number=".$goal->getGoal_number());
    }
}
else
{
    header("Location:index.php");
}