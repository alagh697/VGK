<?php
$session_user_games_exist=$session_user->loadUserGames($database);
$session_user_main_game_exist=$session_user->loadUserMainGamePlatform($database);
$session_user_friends_exist=$session_user->loadUserFriends($database);
?>
<div class='right_sidebar'>
    
<?php 
//game list
if($session_user_games_exist)
{
    if($session_user_main_game_exist)
    {
        ?>
    <div class="right_sidebar_main_game">
        <span class="right_sidebar_list_title">Jeu principal</span>
        <a class="right_sidebar_main_game_link" href="Game_Profile.php?game_name=<?php echo urlencode($session_user->getUser_main_game()->getGame_name()); ?>">
            <img class="right_sidebar_game_image" src="VGK_Image/Game_Cover/<?php echo $session_user->getUser_main_game()->getGame_cover_url(); ?>.jpg"/>
            <p><?php echo $session_user->getUser_main_game()->getGame_name(); ?></p>
        </a>
        <span class="<?php echo $session_user->getUser_main_platform()->getPlatform_code(); ?>_span"><?php echo $session_user->getUser_main_platform()->getPlatform_code(); ?></span>
    </div>
    <?php   
    }
    ?>
    <div class="right_sidebar_user_games">
        <span class="right_sidebar_list_title">Vos Jeux</span>
        <ul class="right_sidebar_list">
    <?php
    foreach($session_user->getUserGames() as $game)
    {
        /*if(($session_user_main_game_exist AND $session_user->getUser_main_game()->getGame_number()!=$game->getGame_number()) OR !($session_user_main_game_exist))
        {*/
    ?>
            <li>
            <a class="right_sidebar_list_link" href="Game_Profile.php?game_name=<?php echo urlencode($game->getGame_name()); ?>">
                <img class="right_sidebar_game_image" src="VGK_Image/Game_Cover/<?php echo $game->getGame_cover_url(); ?>.jpg"/>
                <p><?php echo $game->getGame_name(); ?></p>
            </a>
            </li>
    <?php
        //}
    }
    ?>
        </ul>
    </div>
    <?php
}
else
{
?>
    <div class="right_sidebar_main_game">
        <span class="nothing">Pas de jeux</span>
    </div>
<?php  
}

//friend list
if($session_user_friends_exist)
{
?>
    <div class="right_sidebar_user_friends">
        <span class="right_sidebar_list_title">Vos amis</span>
        <ul class="right_sidebar_list">
    <?php
    foreach($session_user->getUserFriends() as $friendship)
    {
    ?>
            <li>
                <a href="Profile.php?user_id=<?php echo $friendship->getFriendship_friend1()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $friendship->getFriendship_friend1()->getUser_profile_picture_url(); ?>" class="right_sidebar_user_pp"></a>
                <a href="Profile.php?user_id=<?php echo $friendship->getFriendship_friend1()->getUser_id(); ?>" class="table_link"><?php echo $friendship->getFriendship_friend1()->getUser_id(); ?></a>
            </li>
    <?php
    }
    ?> 
    </div>
<?php
}
?>  
        
</div>