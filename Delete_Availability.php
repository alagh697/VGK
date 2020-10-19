<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if (isset($_GET) && !empty($_GET['availability_number']))
    {
        //Availability
        $availability=new Availability();
        $availability->setAvailability_number($_GET['availability_number']);
        $availability_exist=$availability->loadAvailability($database);
        
        //delete
        if($availability_exist)
        {
            $ok=$availability->delete($database);
        }
        
        //If the insert worked we redirect to the availability detail 
        header("Location:Availabilities_Section.php");
    }
    else
    {
        //add error
         header("Location:Availabilities_Section.php");
    }
}
else
{
    header("Location:index.php");
}