<?php
$session_user_library_exist=$session_user->loadUserLibrary($database);
$session_user_sessions_hosted_exist=$session_user->loadUserSessionsHosted($database);
$session_user_challenges_made_exist=$session_user->loadUserChallengesMade($database);
$theUser->loadUserGamertags($database);
?>
<div class="content_header">
		
    <a class="current_section_link" href="Profile.php?user_id=<?php echo $theUser->getUser_id(); ?>">
        <img class="profile_section_image" src="VGK_Image/Profile_Picture/<?php echo $theUser->getUser_profile_picture_url(); ?>"/>
        <span class="page_name"><?php echo $theUser->getUser_id(); ?></span>
        <?php
        if($theUser->getUser_gender()=='1')
        {
        ?>
        <img class="header_icon" src="VGK_Image/VGK_Icon/game_blue.png" >
        <?php
        }
        else
        {
        ?>
        <img class="header_icon" src="VGK_Image/VGK_Icon/game_pink.png" >
        <?php
        }
        ?>
    </a>

    <?php require('Profile_Other_User_Test_Friend_Follow.php'); ?>
    
    <div>
        <span class="nothing_left"><?php echo utf8_encode($theUser->getUser_country()->getCountry_name_fr()); ?> (<?php echo utf8_encode($theUser->getUser_main_language()->getLanguage_name_fr()); ?>)</span> 
    </div>
    
    <div class="content_header_main_game">
    <?php
    $theUser_main_game_exist=$theUser->loadUserMainGamePlatform($database);
    if($theUser_main_game_exist)
    {
    ?>
        <a class="profile_main_game" href="Game_Profile.php?game_name=<?php echo urlencode($theUser->getUser_main_game()->getGame_name()); ?>">
            <img class="profile_main_game_image" src="VGK_Image/Game_Cover/<?php echo $theUser->getUser_main_game()->getGame_cover_url(); ?>.jpg"/>
            <span><?php echo $theUser->getUser_main_game()->getGame_name(); ?></span>
        </a>
        <span class="<?php echo $theUser->getUser_main_platform()->getPlatform_code(); ?>_span"><?php echo $theUser->getUser_main_platform()->getPlatform_code(); ?></span>
    <?php
    }
    else 
    {?>
        <span class="nothing_left">Pas de jeu principal</span>
    <?php
    }
    ?>
    </div>
    
    <?php
    if($theUser->getUser_description()!="")
    {
    ?>
    <div class="header_description">
        <p>
            <?php echo nl2br($theUser->getUser_description()); ?>
        </p>
    </div>
    <?php
    }
    ?>
    
    <div>
        <?php
        //youtube
        if($theUser->getUser_youtube_channel()!="")
        {
        ?>
        <img class="header_icon" src="VGK_Image/Platform_Icon/YouTube-icon-full_color.png" >
        <a class="table_link" href="https://www.youtube.com/user/<?php echo $theUser->getUser_youtube_channel(); ?>" target="_blank">
            <?php echo $theUser->getUser_youtube_channel(); ?>
        </a>
        <?php
        }

        //twitch
        if($theUser->getUser_twitch_channel()!="")
        {
        ?>
        <img class="header_icon" src="VGK_Image/Platform_Icon/GlitchIcon_WhiteonPurple.png" >
        <a class="table_link" href="https://www.twitch.tv/<?php echo $theUser->getUser_twitch_channel(); ?>" target="_blank">
            <?php echo $theUser->getUser_twitch_channel(); ?>
        </a>
        <?php
        }

        //website
        if($theUser->getUser_website()!="")
        {
        ?>
        <img class="header_icon" src="VGK_Image/VGK_Icon/online_gold.png" >
        <a class="table_link" href="http://<?php echo $theUser->getUser_website(); ?>" target="_blank">
            <?php echo $theUser->getUser_website(); ?>
        </a>
        <?php
        }
        ?>
    </div>
    <div>
        <?php
        require('Profile_User_Gamertags.php');
        ?>
    </div>
    
    <div class='friend_follow_content_header'>
        <ul class='friend_follow_content_header_nav'>
            <li><a href="Friends_Page.php?user_id=<?php echo $theUser->getUser_id(); ?>">
            <table>
                    <tr><td>amis</td></tr>
                    <tr><td><span class='friend_follow_stat'><?php echo $theUser->getUser_friend_count($database); ?></span></td></tr>
            </table>
            </a></li>
            <li><a href="Follows_Page.php?user_id=<?php echo $theUser->getUser_id(); ?>">
            <table>
                    <tr><td>abonnements</td></tr>
                    <tr><td><span class='friend_follow_stat'><?php echo $theUser->getUser_following_count($database); ?></span></td></tr>
            </table>
            </a></li>
            <li><a href="Followers_Page.php?user_id=<?php echo $theUser->getUser_id(); ?>">
            <table>
                    <tr><td>abonnés</td></tr>
                    <tr><td><span class='friend_follow_stat'><?php echo $theUser->getUser_follower_count($database); ?></span></td></tr>
            </table>
            </a></li>
        </ul>
    </div>
    			
</div>
