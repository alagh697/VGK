<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');

if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if(isset($_GET) AND !empty($_GET['search_keyword']))
    {
        $keyword=htmlspecialchars($_GET['search_keyword']);
        //$searchUsers_List=User::searchUsers($database, $keyword);
        //$searchGames_List=Game::searchGames($database, $keyword);
        require('VGK_Require/Search_Result_Page.php');
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