<?php
$session_user_library_exist=$session_user->loadUserLibrary($database);
?>
<div class="content_header">
    <div><span class="page_name">Objectif</span></div>
    <div>
        <a href="Game_Profile.php?game_name=<?php echo urlencode($goal->getGoal_game()->getGame_name()); ?>">
            <img class="game_profile_image" src="VGK_Image/Game_Cover/<?php echo $goal->getGoal_game()->getGame_cover_url(); ?>.jpg"/>
        </a>
        <a class="current_section_link" href="Goal_Detail.php?goal_number=<?php echo $goal->getGoal_number(); ?>">
            <span class="page_name"><?php echo $goal->getGoal_title(); ?></span>
        </a>
        <span class="<?php echo $goal->getGoal_platform()->getPlatform_code(); ?>_span"><?php echo $goal->getGoal_platform()->getPlatform_code(); ?></span>
        
        <a class="detail_user" href="Profile.php?user_id=<?php echo $goal->getGoal_user()->getUser_id(); ?>">
            <img class="detail_user_image" src="VGK_Image/Profile_Picture/<?php echo $goal->getGoal_user()->getUser_profile_picture_url(); ?>"/>
            <span><?php echo $goal->getGoal_user()->getUser_id(); ?></span>
        </a>

        <?php
        //Options
        if($session_user->getUser_number()==$goal->getGoal_user()->getUser_number())
        {
            if(intval($goal->getGoal_achieved())==0)
            {
        ?>
            <a><button class="button" id="clickUpdateGoalAchievement">Atteint</button></a>
            <div class="dropdown">
                <button class="dropbtn_icon"></button>
                <div class="dropdown-content">
                        <a id="clickAddSession">Ouvrir une session</a>
                        <a id="clickAddUpdateGoal">Mise à jour</a>
                        <a href="Delete_Goal.php?goal_number=<?php echo $goal->getGoal_number(); ?>">Supprimer</a>
                </div>
            </div>
        <?php
            }
        }
        elseif($goal->getGoal_copy()->getGoal_number()=='0') 
        {
            //Goal copy
            $goal_copy=new Goal();
            /*if($goal->getGoal_copy()->getGoal_number()!='0')
            {
                $goal_copy->setGoal_copy($goal->getGoal_copy());
            }
            else 
            {
                
            }*/
            $goal_copy->setGoal_copy($goal);
            $goal_copy->setGoal_user($session_user);
            $goal_copy_exist=$goal_copy->loadGoalCopy($database);
            if(!($goal_copy_exist))
            {
            ?>
            <a href="Add_Goal_Copy.php?goal_number=<?php echo $goal->getGoal_number(); ?>"><button class="button" id="clickCopyGoal">Copier</button></a>
            <?php 
            }
            else
            {
            ?>
            <a href="Goal_Detail.php?goal_number=<?php echo $goal_copy->getGoal_number(); ?>"><button class="button">Votre Copie</button></a>
            <?php 
            }
        }
        ?>

            
    </div>
    <?php 
    //Test if the goal is a copy
    if($goal->getGoal_copy()->getGoal_number()!='0')
    {
    ?>
    <div>
        <span><a href="Goal_Detail.php?goal_number=<?php echo $goal->getGoal_copy()->getGoal_number(); ?>" class="important_info">Objectif</a> copié sur <a href="Profile.php?user_id=<?php echo $goal->getGoal_copy()->getGoal_user()->getUser_id(); ?>" class="important_info"><?php echo $goal->getGoal_copy()->getGoal_user()->getUser_id(); ?></a></span>
    </div>
    <?php 
    }
    
    if($goal->getGoal_achieved()=='1')
    {
    ?>
    <div>
        <img width="25" height="20" src="VGK_Image/VGK_Icon/goal_gold.png"/>
        <span class="important_info">Objectif atteint le <?php echo date_format(date_create($goal->getGoal_achievement_date()), 'd/m/Y');?> à <?php echo date_format(date_create($goal->getGoal_achievement_date()), 'H:i');?></span>
    </div>
    <?php
    }
    
    if($goal->getGoal_need_help()=='1')
    {
    ?>
    <div>
        <img width="25" height="20" src="VGK_Image/VGK_Icon/help_white.png"/>
        <span class="need_help">Besoin d'aide</span>
    </div>
    <?php
    }
     
    if($goal->getGoal_description()!="")
    {
    ?>
    <div class="header_description">
        <span class="need_help">Description:</span>
        <p>
            <?php echo nl2br($goal->getGoal_description()); ?>
        </p>
    </div>
    <?php
    }
    
    if($goal->getGoal_achievement_description()!="")
    {
    ?>
    <div class="header_description">
        <span class="need_help">Déroulement:</span>
        <p>
            <?php echo nl2br($goal->getGoal_achievement_description()); ?>
        </p>
    </div>
    <?php
    }
    ?>
    
    <div>
        <span class="detail_date">Ajouté le <?php echo date_format(date_create($goal->getGoal_creation_date()), 'd/m/Y');?> à <?php echo date_format(date_create($goal->getGoal_creation_date()), 'H:i');?></span>
    </div>
     
</div>