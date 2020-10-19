<?php
$session_user_library_exist=$session_user->loadUserLibrary($database);
?>
<div class="content_header">
    <div><span class="page_name">Disponibilité</span></div>
    <div>
        <a href="Game_Profile.php?game_name=<?php echo urlencode($availability->getAvailability_game()->getGame_name()); ?>">
            <img class="game_profile_image" src="VGK_Image/Game_Cover/<?php echo $availability->getAvailability_game()->getGame_cover_url(); ?>.jpg"/>
        </a>
        <a class="current_section_link" href="Availability_Detail.php?availability_number=<?php echo $availability->getAvailability_number(); ?>">
            <span class="page_name"><?php echo $availability->getAvailability_title(); ?></span>
        </a>
        <span class="<?php echo $availability->getAvailability_platform()->getPlatform_code(); ?>_span"><?php echo $availability->getAvailability_platform()->getPlatform_code(); ?></span>
        
        <a class="detail_user" href="Profile.php?user_id=<?php echo $availability->getAvailability_user()->getUser_id(); ?>">
            <img class="detail_user_image" src="VGK_Image/Profile_Picture/<?php echo $availability->getAvailability_user()->getUser_profile_picture_url(); ?>"/>
            <span><?php echo $availability->getAvailability_user()->getUser_id(); ?></span>
        </a>

        <?php 
        //Test if the availability is ended
        $finished=false;
        $end_date=date_create($availability->getAvailability_end_date());
        $now=new DateTime();
        if($now>$end_date)
        {
            $finished=true;
        }
        if($session_user->getUser_number()==$availability->getAvailability_user()->getUser_number())
        {
            if(!($finished))
            {
        ?>
            <div class="dropdown">
                <button class="dropbtn_icon"></button>
                <div class="dropdown-content">
                        <a>Ouvrir une session</a>
                        <a href="Delete_Availability.php?availability_number=<?php echo $availability->getAvailability_number(); ?>">Supprimer</a>
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
                    <a href="Delete_Availability.php?availability_number=<?php echo $availability->getAvailability_number(); ?>">Supprimer</a>
                </div>
            </div>
            <?php
            }
        }    
        ?>
  
    </div>
    <div>
        <span class="detail_date">Débute le </span> <span class="important_info"><?php echo date_format(date_create($availability->getAvailability_start_date()), 'd/m/Y');?></span><span class="detail_date"> à </span> <span class="important_info"><?php echo date_format(date_create($availability->getAvailability_start_date()), 'H:i');?></span>
        <span class="detail_date">et finit le </span> <span class="important_info"><?php echo date_format(date_create($availability->getAvailability_end_date()), 'd/m/Y');?></span><span class="detail_date"> à </span> <span class="important_info"><?php echo date_format(date_create($availability->getAvailability_end_date()), 'H:i');?></span>
    </div>
    
    <?php 
    if($availability->getAvailability_description()!="")
    {
    ?>
    <div class="header_description">
        <p>
            <?php echo nl2br($availability->getAvailability_description()); ?>
        </p>
    </div>
    <?php
    }
    ?>
    
    <div>
        <span class="detail_date">Ajoutée le <?php echo date_format(date_create($availability->getAvailability_creation_date()), 'd/m/Y');?> à <?php echo date_format(date_create($availability->getAvailability_creation_date()), 'H:i');?></span>
    </div>
     
</div>