<?php

$psn="";
if(!empty($_POST['user_psn']))
{
    $psn="'".htmlspecialchars($_POST["user_psn"])."'";
}
else 
{
    $psn="null";
}
$session_user->setUser_psn($psn);

//xboxlive
$xboxlive="";
if(!empty($_POST['user_xboxlive']))
{
    $xboxlive="'".htmlspecialchars($_POST["user_xboxlive"])."'";
}
else 
{
    $xboxlive="null";
}
$session_user->setUser_xboxlive($xboxlive);

//nintendo_id
$nintendo_id="";
if(!empty($_POST['user_nintendo_id']))
{
    $nintendo_id="'".htmlspecialchars($_POST["user_nintendo_id"])."'";
}
else 
{
    $nintendo_id="null";
}
$session_user->setUser_nintendo_id($nintendo_id);

//steam
$steam="";
if(!empty($_POST['user_steam']))
{
    $steam="'".htmlspecialchars($_POST["user_steam"])."'";
}
else 
{
    $steam="null";
}
$session_user->setUser_steam($steam);

//battlenet
$battlenet="";
if(!empty($_POST['user_battlenet']))
{
    $battlenet="'".htmlspecialchars($_POST["user_battlenet"])."'";
}
else 
{
    $battlenet="null";
}
$session_user->setUser_battlenet($battlenet);

//uplay
$uplay="";
if(!empty($_POST['user_uplay']))
{
    $uplay="'".htmlspecialchars($_POST["user_uplay"])."'";
}
else 
{
    $uplay="null";
}
$session_user->setUser_uplay($uplay);

//origin
$origin="";
if(!empty($_POST['user_origin']))
{
    $origin="'".htmlspecialchars($_POST["user_origin"])."'";
}
else 
{
    $origin="null";
}
$session_user->setUser_origin($origin);

//youtube
$youtube="";
if(!empty($_POST['user_youtube']))
{
    $youtube="'".htmlspecialchars($_POST["user_youtube"])."'";
}
else 
{
    $youtube="null";
}
$session_user->setUser_youtube_channel($youtube);

//twitch
$twitch="";
if(!empty($_POST['user_twitch']))
{
    $twitch="'".htmlspecialchars($_POST["user_twitch"])."'";
}
else 
{
    $twitch="null";
}
$session_user->setUser_twitch_channel($twitch);

//website
$website="";
if(!empty($_POST['user_website']))
{
    $website="'".htmlspecialchars($_POST["user_website"])."'";
}
else 
{
    $website="null";
}
$session_user->setUser_website($website);

$ok=$session_user->updateUserGamertags($database);
if(!$ok)
{
    $error.="Impossible de modifier votre profil.";
}

