<?php

if(!isset($_SESSION['user_number']) AND isset($_COOKIE['user_id']) AND !empty($_COOKIE['user_id']) AND isset($_COOKIE['user_password']) AND !empty($_COOKIE['user_password']))
{
    $id=$_COOKIE['user_id'];
    $password=$_COOKIE['user_password'];
    $session_user=new User();
    $auth_ok=$session_user->UserAuthentification($database, $id, $password);
    if($auth_ok)
    {
        $_SESSION["user_number"]=$session_user->getUser_number();
        $_SESSION["user_id"]=$session_user->getUser_id();
    }
}

