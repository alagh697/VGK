<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_POST) && !empty($_POST['goal_number']))
    {
        //Goal
        $goal=new Goal();
        $goal->setGoal_number($_POST['goal_number']);
        $goal_exist=$goal->loadGoal($database);
        
        $description="";
        if(!empty($_POST['description']))
        {
            $description= addslashes(htmlspecialchars($_POST['description']));
        }
        
        //update result
        if($goal_exist AND intval($goal->getGoal_achieved())==0)
        {
            $goal->setGoal_achievement_description($description);
            $ok=$goal->updateGoalAchievement($database);
        }
        
        //If the insert worked we redirect to the goal detail 
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