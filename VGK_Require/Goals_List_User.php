<?php
    if(!isset($theUser))
    {
        $theUser=$session_user;
    }
    $user_goals_exist=$theUser->loadUserGoals($database);
?>
<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="6">Les objectifs de <?php echo $theUser->getUser_id(); ?></th>
            </tr>
            <tr>
                <th>Jeu</th>
                <th>Platforme</th>
                <th>Titre</th>
                <th>Date</th>
                <th>Atteint</th>
                <th>Date d'atteinte</th>
            </tr>
        </thead>
        <tbody>
<?php 
    if($user_goals_exist)
    {
        foreach ($theUser->getUserGoals() as $goal)
        {?>
            <tr>
                <td>
                    <a href="Game_Profile.php?game_name=<?php echo urlencode($goal->getGoal_game()->getGame_name()); ?>">
                        <img class="game_table_image" src="VGK_Image/Game_Cover/<?php echo $goal->getGoal_game()->getGame_cover_url(); ?>.jpg"/>
                    </a>
                </td>
                <td>
                    <span class="<?php echo $goal->getGoal_platform()->getPlatform_code(); ?>_span">
                        <?php echo $goal->getGoal_platform()->getPlatform_code(); ?>
                    </span>
                </td>
                <td>
                    <?php echo $goal->getGoal_title(); ?>
                </td>
                <td>
                    <?php echo date_format(date_create($goal->getGoal_creation_date()), 'd/m/Y');?>
                </td>
                <td <?php if(intval($goal->getGoal_achieved()==1)){ echo'class="checked"'; }?>>
                </td>
                <td>
                    <?php if(intval($goal->getGoal_achieved()==1)){ echo date_format(date_create($goal->getGoal_achievement_date()), 'd/m/Y'); } ?>
                </td>
                <td class="table_button">
                    <a href="Goal_Detail.php?goal_number=<?php echo $goal->getGoal_number(); ?>">
                        <button class="button">Voir</button>
                    </a>
                </td>
            </tr>	
<?php
        }
    }
    else
    {?>
            <tr>
                <td colspan="6">
                    <span class="nothing">Pas d'objectifs</span>
                </td>
            </tr>
<?php   
    }
?>
            
        </tbody>

        <tfoot>
        </tfoot>
    </table>
</div>