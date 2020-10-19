<?php
$session_user_library_exist=$session_user->loadUserLibrary($database);
$session_user->loadUserGamertags($database);
?>
<div class="content_header">
    <div>	
        <a class="current_section_link" href="Profile.php?user_id=<?php echo $session_user->getUser_id(); ?>">
            <img class="profile_section_image" src="VGK_Image/Profile_Picture/<?php echo $session_user->getUser_profile_picture_url(); ?>"/>
            <span class="page_name"><?php echo $session_user->getUser_id(); ?></span>
            <?php
            if($session_user->getUser_gender()=='1')
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
        
        
        
        <a href="Settings.php"><button id="settings_button" class="icon_button"></button></span></a>

        <div class="dropdown">
            <button class="dropbtn_icon"></button>
            <div class="dropdown-content">
                <a class="dropdown_link">Ouvrir une session</a>
                <a class="dropdown_link">Provoquer un duel</a>
                <a class="dropdown_link">Lancer un défi</a>
            </div>
        </div>
        
        
    </div>
    
    <div>
        <span class="nothing_left"><?php echo utf8_encode($session_user->getUser_country()->getCountry_name_fr()); ?> (<?php echo utf8_encode($session_user->getUser_main_language()->getLanguage_name_fr()); ?>)</span> 
    </div>
    
    <div class="content_header_main_game">
    <?php
    $session_user_main_game_exist=$session_user->loadUserMainGamePlatform($database);
    if($session_user_main_game_exist)
    {
    ?>
        <a class="profile_main_game" href="Game_Profile.php?game_name=<?php echo urlencode($session_user->getUser_main_game()->getGame_name()); ?>">
            <img class="profile_main_game_image" src="VGK_Image/Game_Cover/<?php echo $session_user->getUser_main_game()->getGame_cover_url(); ?>.jpg"/>
            <span><?php echo $session_user->getUser_main_game()->getGame_name(); ?></span>
        </a>
        <span class="<?php echo $session_user->getUser_main_platform()->getPlatform_code(); ?>_span"><?php echo $session_user->getUser_main_platform()->getPlatform_code(); ?></span>
        <a><button class="button" id="clickUpdateMainGame">Changer</button></a>
    <?php
    }
    else 
    {?>
        <a><button class="button" id="clickUpdateMainGame">Jeu Principal</button></a>
    <?php
    }
    ?>
    </div>
    
    <?php
    if($session_user->getUser_description()!="")
    {
    ?>
    <div class="header_description">
        <p>
            <?php echo nl2br($session_user->getUser_description()); ?>
        </p>
    </div>
    <?php
    }
    ?>
    <div>
        <?php
        //youtube
        if($session_user->getUser_youtube_channel()!="")
        {
        ?>
        <img class="header_icon" src="VGK_Image/Platform_Icon/YouTube-icon-full_color.png" >
        <a class="table_link" href="https://www.youtube.com/user/<?php echo $session_user->getUser_youtube_channel(); ?>" target="_blank">
            <?php echo $session_user->getUser_youtube_channel(); ?>
        </a>
        <?php
        }

        //twitch
        if($session_user->getUser_twitch_channel()!="")
        {
        ?>
        <img class="header_icon" src="VGK_Image/Platform_Icon/GlitchIcon_WhiteonPurple.png" >
        <a class="table_link" href="https://www.twitch.tv/<?php echo $session_user->getUser_twitch_channel(); ?>" target="_blank">
            <?php echo $session_user->getUser_twitch_channel(); ?>
        </a>
        <?php
        }

        //website
        if($session_user->getUser_website()!="")
        {
        ?>
        <img class="header_icon" src="VGK_Image/VGK_Icon/online_gold.png" >
        <a class="table_link" href="http://<?php echo $session_user->getUser_website(); ?>" target="_blank">
            <?php echo $session_user->getUser_website(); ?>
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
            <li><a href="Friends_Page.php?user_id=<?php echo $session_user->getUser_id(); ?>">
            <table>
                    <tr><td>amis</td></tr>
                    <tr><td><span class='friend_follow_stat'><?php echo $session_user->getUser_friend_count($database); ?></span></td></tr>
            </table>
            </a></li>
            <li><a href="Friend_Requests_Page.php">
            <table>
                    <tr><td>demande</td></tr>
                    <tr><td><span class='friend_follow_stat'><?php echo $session_user->getUser_friend_request_count($database); ?></span></td></tr>
            </table>
            </a></li>
            <li><a href="Follows_Page.php?user_id=<?php echo $session_user->getUser_id(); ?>">
            <table>
                    <tr><td>abonnements</td></tr>
                    <tr><td><span class='friend_follow_stat'><?php echo $session_user->getUser_following_count($database); ?></span></td></tr>
            </table>
            </a></li>
            <li><a href="Followers_Page.php?user_id=<?php echo $session_user->getUser_id(); ?>">
            <table>
                    <tr><td>abonnés</td></tr>
                    <tr><td><span class='friend_follow_stat'><?php echo $session_user->getUser_follower_count($database); ?></span></td></tr>
            </table>
            </a></li>
        </ul>
  </div>
				
</div>

