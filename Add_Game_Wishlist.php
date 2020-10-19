<?php
session_start();

require('VGK_Config/connect.php');
require('VGK_Require/Cookie_Login.php');


if(isset($_SESSION) AND !empty($_SESSION['user_number']) AND !empty($_SESSION['user_id']))
{
    $session_user=new User();
    $session_user->setUser_number($_SESSION['user_number']);
    $user_exist=$session_user->loadUser($database);
    
    if(isset($_POST) AND !empty($_POST['game_name']) AND !empty($_POST['game_version']))
    {
        $theGame=new Game();
        $theGame->setGame_name(htmlspecialchars($_POST['game_name']));
        $game_exist=$theGame->loadGameByName($database);
        if($game_exist)
        {
            $platform=new Platform();
            $platform->setPlatform_code($_POST['game_version']);
            $platform_exist=$platform->loadPlatform($database);
            if($platform_exist)
            {
                //test if the game is available on this platform
                $version=new Game_platform();
                $version->setAll($theGame, $platform);
                $version_exist=$version->loadGamePlatform($database);
                if($version_exist)
                {
                    //test if the session user already own this version
                    $user_own_game=new User_own_game_platform();
                    $user_own_game->setAll($session_user, $theGame, $platform);
                    $owned_game_exist=$user_own_game->loadOwnedGame($database);
                    //if the session user doesn't already own the game we add it to his wishlist
                    if(!($owned_game_exist))
                    {
                        //test if the session user already has this version on his whishlist
                        $user_wishlist=new User_wishlist();
                        $user_wishlist->setForInsertUser_wishlist($session_user, $theGame, $platform);
                        $wishlist_game_exist=$user_wishlist->loadWishlistGame($database);
                        //if the session user doesn't already have the game we add it to his wishlist
                        if(!($wishlist_game_exist))
                        {
                            $ok=$user_wishlist->insert($database);
                        }
                    }
                }
            }
            header("Location:Game_Profile.php?game_name=".urlencode($theGame->getGame_name()));
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
    
}
else
{
    header("Location:index.php");
}            
?>