<?php
$VGK=new User();
$VGK->setUser_number('1');
$target_user=new User();
$target_user->setUser_number('0');
$game=new Game();
$game->setGame_number('0');
$platform=new Platform();
$platform->setPlatform_code('');
//Message
$message= addslashes(htmlspecialchars($theUser->getUser_id()." vient de rejoindre VGK."));
//profil url
$profil_url="Profile.php?user_id=".$theUser->getUser_id();
//Insert post
$post=new Post();
$post->setForInsertPost($VGK, $target_user, $game, $platform, $message, $profil_url);

$ok_post=$post->insert($database);
?>
