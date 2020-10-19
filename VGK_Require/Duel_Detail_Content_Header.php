<?php
$session_user_library_exist=$session_user->loadUserLibrary($database);
?>
<div class="content_header">
    <div><span class="page_name">Duel</span></div>
    <div>
        <a class="current_section_link" href="Profile.php?user_id=<?php echo $duel->getDuel_originator()->getUser_id(); ?>">
            <img class="profile_section_image" src="VGK_Image/Profile_Picture/<?php echo $duel->getDuel_originator()->getUser_profile_picture_url(); ?>"/>
            <span class="page_name"><?php echo $duel->getDuel_originator()->getUser_id(); ?></span>
        </a>
        <span class="vs">VS</span>
        <a class="current_section_link" href="Profile.php?user_id=<?php echo $duel->getDuel_target()->getUser_id(); ?>">
            <img class="profile_section_image" src="VGK_Image/Profile_Picture/<?php echo $duel->getDuel_target()->getUser_profile_picture_url(); ?>"/>
            <span class="page_name"><?php echo $duel->getDuel_target()->getUser_id(); ?></span>
        </a>
    </div>
    <div>
        <a href="Game_Profile.php?game_name=<?php echo urlencode($duel->getDuel_game()->getGame_name()); ?>">
            <img class="game_profile_image" src="VGK_Image/Game_Cover/<?php echo $duel->getDuel_game()->getGame_cover_url(); ?>.jpg"/>
        </a>
        <a class="current_section_link" href="Duel_Detail.php?duel_number=<?php echo $duel->getDuel_number(); ?>">
            <span class="page_name"><?php echo $duel->getDuel_title(); ?></span>
        </a>
        <span class="<?php echo $duel->getDuel_platform()->getPlatform_code(); ?>_span"><?php echo $duel->getDuel_platform()->getPlatform_code(); ?></span>
        <a class="detail_user" href="Profile.php?user_id=<?php echo $duel->getDuel_originator()->getUser_id(); ?>">
            <img class="detail_user_image" src="VGK_Image/Profile_Picture/<?php echo $duel->getDuel_originator()->getUser_profile_picture_url(); ?>"/>
            <span><?php echo $duel->getDuel_originator()->getUser_id(); ?></span>
        </a>

        <?php 
        //Test if the duel is ended
        $finished=false;
        if($duel->getDuel_end_date()!='0000-00-00 00:00:00')
        {
            $end_date=date_create($duel->getDuel_end_date());
            $now=new DateTime();
            if($now>$end_date)
            {
                $finished=true;
            }
        }
        //test if the session user already has the game version
        $user_own_game=new User_own_game_platform();
        $user_own_game->setAll($session_user, $duel->getDuel_game(), $duel->getDuel_platform());
        $owned_game_exist=$user_own_game->loadOwnedGame($database);
        
        if($session_user->getUser_number()==$duel->getDuel_originator()->getUser_number())
        {
            if(!($finished) AND $duel->getDuel_start_date()!='0000-00-00 00:00:00')
            {
            ?>
            <a><button class="button" id="clickUpdateDuelResult">Résultat</button></a>
            <div class="dropdown">
                <button class="dropbtn_icon"></button>
                <div class="dropdown-content">
                    <a href="#">Mise à jour</a>
                    <a href="Delete_Duel.php?duel_number=<?php echo $duel->getDuel_number(); ?>">Supprimer</a>
                </div>
            </div>
            <?php
            }
            elseif(!($finished) AND $duel->getDuel_start_date()=='0000-00-00 00:00:00')
            {
            ?>
            <div class="dropdown">
                <button class="dropbtn_icon"></button>
                <div class="dropdown-content">
                    <a>Mise à jour</a>
                    <a href="Delete_Duel.php?duel_number=<?php echo $duel->getDuel_number(); ?>">Supprimer</a>
                </div>
            </div>
            <?php
            }
        }
        elseif($session_user->getUser_number()==$duel->getDuel_target()->getUser_number() AND $owned_game_exist)
        {
            if($duel->getDuel_start_date()=='0000-00-00 00:00:00')
            {
            ?>
            <a href="Update_Duel_Start.php?duel_number=<?php echo $duel->getDuel_number(); ?>"><button class="button" id="clickUpdateDuelStart">Accepter</button></a>
            <a href="Delete_Duel.php?duel_number=<?php echo $duel->getDuel_number(); ?>"><button class="button" id="clickDeleteDuel">Refuser</button></a>
            <?php 
            }
            elseif($finished AND $duel->getDuel_winner()->getUser_id()!='' AND intval($duel->getDuel_target_confirmation())==0)
            {
            ?>
            <a href="Update_Duel_Confirm.php?duel_number=<?php echo $duel->getDuel_number(); ?>"><button class="button" id="clickUpdateDuelConfirm">Confirmer résultat</button></a>
            <?php
            }
        }
        //elseif finished witness options for other users
        ?>
            
    </div>
    
    <?php 
    if($duel->getDuel_start_date()!='0000-00-00 00:00:00')
    {
    ?>
    <div>
        <span class="detail_date">A débuté le </span> <span class="important_info"><?php echo date_format(date_create($duel->getDuel_start_date()), 'd/m/Y');?></span><span class="detail_date"> à </span> <span class="important_info"><?php echo date_format(date_create($duel->getDuel_start_date()), 'H:i');?></span>
        <?php
        if($duel->getDuel_end_date()!='0000-00-00 00:00:00')
        {
        ?>
            <span class="detail_date">et a pris fin le </span> <span class="important_info"><?php echo date_format(date_create($duel->getDuel_end_date()), 'd/m/Y');?></span><span class="detail_date"> à </span> <span class="important_info"><?php echo date_format(date_create($duel->getDuel_end_date()), 'H:i');?></span>
        <?php
        }
        ?>
    </div>
    <?php
    }
    else
    {
    ?>
    <div>
        <span class="detail_date">En attente d'acceptation</span>
    </div>
    <?php  
    }
    
    if($duel->getDuel_winner()->getUser_id()!='')
    {?>
    <div>
        Gagnant(e):<a href="Profile.php?user_id=<?php echo $duel->getDuel_winner()->getUser_id(); ?>" class="important_info" > <span><?php echo $duel->getDuel_winner()->getUser_id(); ?></span></a>
    <?php
        //confirmation
        if($duel->getDuel_target_confirmation()=='1')
        {
        ?>
            <span class="need_help">Résultat confirmé.</span>
        <?php
        }
        ?>
        </div>
    <?php
    }
    
    //description
    if($duel->getDuel_description()!="")
    {
    ?>
    <div class="header_description">
        <span class="need_help">Description: </span>
        <p>
            <?php echo nl2br($duel->getDuel_description()); ?>
        </p>
    </div>
    <?php
    }
    //progress
    if($duel->getDuel_progress()!="")
    {
    ?>
    <div class="header_description">
        <span class="need_help">Déroulement: </span>
        <p>
            <?php echo nl2br($duel->getDuel_progress()); ?>
        </p>
    </div>
    <?php
    }
    ?>
    
    
    <div>
        <span class="detail_date">Ajoutée le <?php echo date_format(date_create($duel->getDuel_creation_date()), 'd/m/Y');?> à <?php echo date_format(date_create($duel->getDuel_creation_date()), 'H:i');?></span>
    </div>
     
</div>