<?php
if(!isset($theUser) OR $theUser->getUser_number()==$session_user->getUser_number())
{
    $theUser=$session_user;
}

//psn
if($theUser->getUser_psn()!="")
{
?>
<img class="header_icon" src="VGK_Image/Platform_Icon/PlayStation_Network.png" >
<span><?php echo $theUser->getUser_psn(); ?></span>
<?php
}

//xboxlive
if($theUser->getUser_xboxlive()!="")
{
?>
<img class="header_icon" src="VGK_Image/Platform_Icon/xbox.png" >
<span><?php echo $theUser->getUser_xboxlive(); ?></span>
<?php
}

//nintendo_id
if($theUser->getUser_nintendo_id()!="")
{
?>
<img class="header_icon" src="VGK_Image/Platform_Icon/nintendo_network.png" >
<span><?php echo $theUser->getUser_nintendo_id(); ?></span>
<?php
}

//steam
if($theUser->getUser_steam()!="")
{
?>
<img class="header_icon" src="VGK_Image/Platform_Icon/Steam.png" >
<span><?php echo $theUser->getUser_steam(); ?></span>
<?php
}

//battlenet
if($theUser->getUser_battlenet()!="")
{
?>
<img class="header_icon" src="VGK_Image/Platform_Icon/BattleNet.png" >
<span><?php echo $theUser->getUser_battlenet(); ?></span>
<?php
}

//uplay
if($theUser->getUser_uplay()!="")
{
?>
<img class="header_icon" src="VGK_Image/Platform_Icon/Uplay.png" >
<span><?php echo $theUser->getUser_uplay(); ?></span>
<?php
}

//origin
if($theUser->getUser_origin()!="")
{
?>
<img class="header_icon" src="VGK_Image/Platform_Icon/Origin.png" >
<span><?php echo $theUser->getUser_origin(); ?></span>
<?php
}
?>