<?php
    $challenge_takers_exist=$challenge->loadChallengeTakers($database);
    $originator_challenge_taker=new Challenge_taker();
    $originator_challenge_taker->setTake_up_challenge($challenge);
    $originator_challenge_taker->setTake_up_user($challenge->getChallenge_originator());
    $originator_challenge_taker_exist=$originator_challenge_taker->loadChallenge_taker($database);
?>
<div class="content_header">
    <div><span class="page_name">Défi</span></div>
    <div>
        <a href="Game_Profile.php?game_name=<?php echo urlencode($challenge->getChallenge_game()->getGame_name()); ?>">
            <img class="game_profile_image" src="VGK_Image/Game_Cover/<?php echo $challenge->getChallenge_game()->getGame_cover_url(); ?>.jpg"/>
        </a>
        <a class="current_section_link" href="Challenge_Detail.php?challenge_number=<?php echo $challenge->getChallenge_number(); ?>">
            <span class="page_name"><?php echo $challenge->getChallenge_title(); ?></span>
        </a>
        
        <a class="detail_user" href="Profile.php?user_id=<?php echo $challenge->getChallenge_originator()->getUser_id(); ?>">
            <img class="detail_user_image" src="VGK_Image/Profile_Picture/<?php echo $challenge->getChallenge_originator()->getUser_profile_picture_url(); ?>"/>
            <span><?php echo $challenge->getChallenge_originator()->getUser_id(); ?></span>
        </a>

        <?php 
        //Test if the challenge is ended
        $finished=false;
        if($challenge->getChallenge_end_date()!='0000-00-00 00:00:00')
        {
            $end_date=date_create($challenge->getChallenge_end_date());
            $now=new DateTime();
            if($now>$end_date)
            {
                $finished=true;
            }
        }
        //Test if the session_user has taken up the challenge
        $challenge_taken=new Challenge_taker();
        $challenge_taken->setTake_up_challenge($challenge);
        $challenge_taken->setTake_up_user($session_user);
        $challenge_taken_exist=$challenge_taken->loadChallenge_taker($database);
        //test if the session user already the game on any platform
        $user_own_game=new User_own_game_platform();
        $thePlatforms=  Platform::loadAllPlatforms($database);
        $can_challenge=false;
        foreach($thePlatforms as $platform)
        {
            $user_own_game->setAll($session_user, $challenge->getChallenge_game(), $platform);
            $owned_game_exist=$user_own_game->loadOwnedGame($database);
            if($owned_game_exist)
            {
                $can_challenge=true;
            }
        }
        //Options
        if(!($challenge_taken_exist) AND !($finished) AND $can_challenge)
        {
        ?>
        <a><button class="button" id="clickAddChallengeTaker">Relever</button></a>
        <?php    
        }
        elseif(intval($challenge_taken_exist AND $challenge_taken->getTake_up_verified()==0) AND !($finished))
        {
        ?>
        <a><button class="button" id="clickUpdateChallengeTaker">Votre Tentative</button></a>
        <?php   
        }
        //Options for the originator
        if($session_user->getUser_number()==$challenge->getChallenge_originator()->getUser_number())
        {
            //For pop up forms
            $session_user_library_exist=$session_user->loadUserLibrary($database);
            $session_user_friends_exist=$session_user->loadUserFriends($database);
            
            if(!($finished))
            {
                
        ?>      
            <div class="dropdown">
                <button class="dropbtn_icon"></button>
                <div class="dropdown-content">
                    <a id="clickAddChallengeInvite">Inviter</a>
                    <a id="clickUpdateChallengeWinner">Gagnant</a>
                    <a href="Delete_Challenge.php?session_number=<?php echo $challenge->getChallenge_number(); ?>">Supprimer</a>
                </div>
            </div>
        <?php
            }
            else 
            {
            ?>
            <div class="dropdown">
                <button class="dropbtn_icon"></button>
                <div class="dropdown-content">
                    <a href="Delete_Challenge.php?challenge_number=<?php echo $challenge->getChallenge_number(); ?>">Supprimer</a>
                </div>
            </div>
            <?php
            }
        }
        ?>
            
    </div>
    
    <?php 
    if($challenge->getChallenge_end_date()!='0000-00-00 00:00:00')
    {
    ?>
    <div>
        <span class="detail_date">Finit le </span> <span class="important_info"><?php echo date_format(date_create($challenge->getChallenge_end_date()), 'd/m/Y');?></span><span class="detail_date"> à </span> <span class="important_info"><?php echo date_format(date_create($challenge->getChallenge_end_date()), 'H:i');?></span>
    </div>
    <?php
    }
    
    if($challenge->getChallenge_winner()->getUser_id()!='')
    {?>
    <div>
        Gagnant(e):<a href="Profile.php?user_id=<?php echo $challenge->getChallenge_winner()->getUser_id(); ?>" class="important_info"> <span><?php echo $challenge->getChallenge_winner()->getUser_id(); ?></span></a>
    </div>
    <?php
    }
    
    if($challenge->getChallenge_description()!="")
    {
    ?>
    <div class="header_description">
        <p>
            <?php echo nl2br($challenge->getChallenge_description()); ?>
        </p>
    </div>
    <?php
    }
    ?>
    
    <div>
        <span class="detail_date">Ajoutée le <?php echo date_format(date_create($challenge->getChallenge_creation_date()), 'd/m/Y');?> à <?php echo date_format(date_create($challenge->getChallenge_creation_date()), 'H:i');?></span>
    </div>
     
</div>