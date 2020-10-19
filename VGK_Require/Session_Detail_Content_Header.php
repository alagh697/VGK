<div class="content_header">
    <div><span class="page_name">Session</span></div>
    <div>
        <a href="Game_Profile.php?game_name=<?php echo urlencode($session->getSession_game()->getGame_name()); ?>">
            <img class="game_profile_image" src="VGK_Image/Game_Cover/<?php echo $session->getSession_game()->getGame_cover_url(); ?>.jpg"/>
        </a>
        <a class="current_section_link" href="Session_Detail.php?session_number=<?php echo $session->getSession_number(); ?>">
            <span class="page_name"><?php echo $session->getSession_title(); ?></span>
        </a>
        <span class="<?php echo $session->getSession_platform()->getPlatform_code(); ?>_span"><?php echo $session->getSession_platform()->getPlatform_code(); ?></span>
        
        <a class="detail_user" href="Profile.php?user_id=<?php echo $session->getSession_host()->getUser_id(); ?>">
            <img class="detail_user_image" src="VGK_Image/Profile_Picture/<?php echo $session->getSession_host()->getUser_profile_picture_url(); ?>"/>
            <span><?php echo $session->getSession_host()->getUser_id(); ?></span>
        </a>

        <?php 
        //Test if the session is ended
        $finished=false;
        $end_date=date_create($session->getSession_end_date());
        $now=new DateTime();
        if($now>$end_date)
        {
            $finished=true;
        }
        //Test if the session_user has joined the session
        $session_joined=new Session_joiner();
        $session_joined->setJoin_session($session);
        $session_joined->setJoin_user($session_user);
        $session_joined_exist=$session_joined->loadSession_joiner($database);
        //Test if the session_user has been invited to the session
        $session_invitation=new Session_invitation();
        $session_invitation->setInvitation_session($session);
        $session_invitation->setInvitation_user($session_user);
        $session_invitation_exist=$session_invitation->loadSessionInvitation($database);
        //Test if there are places available
        $nb_joiner=$session->getSession_joiner_count($database);
        $places=intval($session->getSession_max_player())-($nb_joiner+1);
        //test if the session user already own this version
        $user_own_game=new User_own_game_platform();
        $user_own_game->setAll($session_user, $session->getSession_game(), $session->getSession_platform());
        $owned_game_exist=$user_own_game->loadOwnedGame($database);
        //Options
        if($session_user->getUser_number()==$session->getSession_host()->getUser_number())
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
                    <a id="clickAddSessionInvite">Inviter</a>
                    <a href="Delete_Session.php?session_number=<?php echo $session->getSession_number(); ?>">Supprimer</a>
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
                    <a href="Delete_Session.php?session_number=<?php echo $session->getSession_number(); ?>">Supprimer</a>
                </div>
            </div>
            <?php
            }
        }
        elseif(!($finished) AND $owned_game_exist)
        {
            if(!($session_joined_exist) AND intval($places)>0 AND ($session->getSession_private()=='0' OR $session_invitation_exist))
            {
            ?>
            <a href="Add_Session_Joiner.php?session_number=<?php echo $session->getSession_number(); ?>&user_id=<?php echo $session_user->getUser_id(); ?>">
                <button class="button" id="clickAddSessionJoiner">Rejoindre</button>
            </a>
            <?php    
            }
            elseif($session_joined_exist)
            {
            ?>
            <a href="Delete_Session_Joiner.php?session_number=<?php echo $session->getSession_number(); ?>&user_id=<?php echo $session_user->getUser_id(); ?>">
                <button class="button" id="clickAddSessionJoiner">Quitter</button>
            </a>
            <?php   
            }
        }
        ?>
  
    </div>
    
    <div>
        <span class="important_info"><?php echo $session->getSession_max_player() ?> </span><span>Joueurs</span>
    </div>
    
    <div>
        <span class="important_info"><?php echo $nb_joiner ?> </span><span>Joueurs ont rejoint la session </span>
    </div>
    
    <div>
        <?php
        if(!($finished))
        {
        ?>
        <span class="important_info"><?php echo $places ?> </span><span>Places disponibles </span>
        <?php
        }
        else
        {
        ?>
        <span class="need_help">Session terminée</span>
        <?php
        }
        ?>
    </div>
    
    <div>
        <span class="detail_date">Débute le </span> <span class="important_info"><?php echo date_format(date_create($session->getSession_start_date()), 'd/m/Y');?></span><span class="detail_date"> à </span> <span class="important_info"><?php echo date_format(date_create($session->getSession_start_date()), 'H:i');?></span>
        <span class="detail_date">et finit le </span> <span class="important_info"><?php echo date_format(date_create($session->getSession_end_date()), 'd/m/Y');?></span><span class="detail_date"> à </span> <span class="important_info"><?php echo date_format(date_create($session->getSession_end_date()), 'H:i');?></span>
    </div>
    
    <?php 
    if($session->getSession_microphone()=='1')
    {
    ?>
    <div>
        <img width="25" height="20" src="VGK_Image/VGK_Icon/headset_white.png"/>
        <span class="need_help">Micro obligatoire</span>
    </div>
    <?php
    }
    
    if($session->getSession_private()=='1')
    {
    ?>
    <div>
        <img width="25" height="20" src="VGK_Image/VGK_Icon/lock_white.png"/>
        <span class="need_help">Session privée</span>
    </div>
    <?php
    }
  
    if($session->getSession_description()!="")
    {
    ?>
    <div class="header_description">
        <p>
            <?php echo nl2br($session->getSession_description()); ?>
        </p>
    </div>
    <?php
    }
    ?>
    
    <div>
        <span class="detail_date">Ajoutée le <?php echo date_format(date_create($session->getSession_creation_date()), 'd/m/Y');?> à <?php echo date_format(date_create($session->getSession_creation_date()), 'H:i');?></span>
    </div>
     
</div>