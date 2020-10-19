<?php
    if(!isset($theUser))
    {
        $theUser=$session_user;
    }
    $user_challenges_taken_exist=$theUser->loadUserChallengesTaken($database);
?>
<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="7">Les défis relevés par <?php echo $theUser->getUser_id(); ?></th>
            </tr>
            <tr>
                <th>Lanceur</th>
                <th>Jeu</th>
                <th>Platforme</th>
                <th>Titre</th>
                <th>Relevé le</th>
                <th>Réalisé le</th>
                <th>Validé</th>
            </tr>
        </thead>
        <tbody>
<?php 
    if($user_challenges_taken_exist)
    {
        foreach ($theUser->getUserChallengesTaken() as $challenge_taker)
        {
            ?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $challenge_taker->getTake_up_challenge()->getChallenge_originator()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $challenge_taker->getTake_up_challenge()->getChallenge_originator()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $challenge_taker->getTake_up_challenge()->getChallenge_originator()->getUser_id(); ?>" class="table_link"><?php echo $challenge_taker->getTake_up_challenge()->getChallenge_originator()->getUser_id(); ?></a>
                </td>
                <td>
                    <a href="Game_Profile.php?game_name=<?php echo urlencode($challenge_taker->getTake_up_challenge()->getChallenge_game()->getGame_name()); ?>">
                        <img class="game_table_image" src="VGK_Image/Game_Cover/<?php echo $challenge_taker->getTake_up_challenge()->getChallenge_game()->getGame_cover_url(); ?>.jpg"/>
                    </a>
                </td>
                <td>
                    <span class="<?php echo $challenge_taker->getTake_up_platform()->getPlatform_code(); ?>_span">
                        <?php echo $challenge_taker->getTake_up_platform()->getPlatform_code(); ?>
                    </span>
                </td>
                <td>
                    <?php echo $challenge_taker->getTake_up_challenge()->getChallenge_title(); ?>
                </td>
                <td>
                    <?php echo date_format(date_create($challenge_taker->getTake_up_date()), 'd/m/Y');?>
                </td>
                <td>
                    <?php 
                    if($challenge_taker->getTake_up_achievement_date()!='0000-00-00 00:00:00')
                    {
                        echo date_format(date_create($challenge_taker->getTake_up_achievement_date()), 'd/m/Y H:i');
                    }
                    else 
                    {
                        echo 'En attente';
                    }
                    ?>
                </td>
                
                <td <?php if(intval($challenge_taker->getTake_up_verified()==1)){ echo'class="checked"'; }?>>
                </td>
                
                <td class="table_button">
                    <a href="Challenge_Detail.php?challenge_number=<?php echo $challenge_taker->getTake_up_challenge()->getChallenge_number(); ?>">
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
                <td colspan="7">
                    <span class="nothing">Pas de défis relevés</span>
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