<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="7">Les tentatives du défi <?php echo $challenge->getChallenge_title(); ?></th>
            </tr>
            <tr>
                <th>Tenté par</th>
                <th>Platforme</th>
                <th>Relevé le</th>
                <th>Réalisé le</th>
                <th>Lien Preuve</th>
                <th>Score</th>
                <th>Validé</th>
            </tr>
            <?php
            if($originator_challenge_taker_exist)
            {   
            ?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $originator_challenge_taker->getTake_up_user()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $originator_challenge_taker->getTake_up_user()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $originator_challenge_taker->getTake_up_user()->getUser_id(); ?>" class="table_link"><?php echo $originator_challenge_taker->getTake_up_user()->getUser_id(); ?></a>
                </td>
                <td>
                    <span class="<?php echo $originator_challenge_taker->getTake_up_platform()->getPlatform_code(); ?>_span">
                        <?php echo $originator_challenge_taker->getTake_up_platform()->getPlatform_code(); ?>
                    </span>
                </td>
                <td>
                    <?php echo date_format(date_create($originator_challenge_taker->getTake_up_date()), 'd/m/Y');?>
                </td>
                <td>
                    <?php 
                    if($originator_challenge_taker->getTake_up_achievement_date()!='0000-00-00 00:00:00')
                    {
                        echo date_format(date_create($originator_challenge_taker->getTake_up_achievement_date()), 'd/m/Y H:i');
                    }
                    else 
                    {
                        echo 'En attente';
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if($originator_challenge_taker->getTake_up_proof_url()!='')
                    {
                    ?>
                       <a class="table_link" href="<?php echo $originator_challenge_taker->getTake_up_proof_url()?>" target="_blank">Preuve</a>
                    <?php
                    }
                    else 
                    {
                        echo 'Pas de preuve';
                    }
                    ?>
                    
                </td>
                <td>
                    <?php echo $originator_challenge_taker->getTake_up_score()?>
                </td>
                
                <td <?php if(intval($originator_challenge_taker->getTake_up_verified()==1)){ echo'class="checked"'; }?>>
                </td>
                
                <td class="table_button">
                </td>
            </tr>	
            <?php
            }   
           
            if($session_user->getUser_number()!=$challenge->getChallenge_originator()->getUser_number() AND $challenge_taken_exist)
            {   
            ?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $challenge_taken->getTake_up_user()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $challenge_taken->getTake_up_user()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $challenge_taken->getTake_up_user()->getUser_id(); ?>" class="table_link"><?php echo $challenge_taken->getTake_up_user()->getUser_id(); ?></a>
                </td>
                <td>
                    <span class="<?php echo $challenge_taken->getTake_up_platform()->getPlatform_code(); ?>_span">
                        <?php echo $challenge_taken->getTake_up_platform()->getPlatform_code(); ?>
                    </span>
                </td>
                <td>
                    <?php echo date_format(date_create($challenge_taken->getTake_up_date()), 'd/m/Y');?>
                </td>
                <td>
                    <?php 
                    if($challenge_taken->getTake_up_achievement_date()!='0000-00-00 00:00:00')
                    {
                        echo date_format(date_create($challenge_taken->getTake_up_achievement_date()), 'd/m/Y H:i');
                    }
                    else 
                    {
                        echo 'En attente';
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if($challenge_taken->getTake_up_proof_url()!='')
                    {
                    ?>
                       <a class="table_link" href="<?php echo $challenge_taken->getTake_up_proof_url()?>" target="_blank">Preuve</a>
                    <?php
                    }
                    else 
                    {
                        echo 'Pas de preuve';
                    }
                    ?>
                    
                </td>
                <td>
                    <?php echo $challenge_taken->getTake_up_score()?>
                </td>
                
                <td <?php if(intval($challenge_taken->getTake_up_verified()==1)){ echo'class="checked"'; }?>>
                </td>
                
                <td class="table_button">
                    <a href="Delete_Challenge_Taker.php?challenge_number=<?php echo $challenge_taken->getTake_up_challenge()->getChallenge_number(); ?>&user_id=<?php echo $challenge_taken->getTake_up_user()->getUser_id(); ?>">
                        <button class="button">Supprimer</button>
                    </a>
                </td>
            </tr>	
            <?php
            }   
            ?>
        </thead>
        <tbody>
<?php 
    if($challenge_takers_exist)
    {
        foreach ($challenge->getChallengeTakers() as $challenge_taker)
        {
            if($session_user->getUser_number()!=$challenge_taker->getTake_up_user()->getUser_number() AND $challenge->getChallenge_originator()->getUser_number()!=$challenge_taker->getTake_up_user()->getUser_number())    
            {?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $challenge_taker->getTake_up_user()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $challenge_taker->getTake_up_user()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $challenge_taker->getTake_up_user()->getUser_id(); ?>" class="table_link"><?php echo $challenge_taker->getTake_up_user()->getUser_id(); ?></a>
                </td>
                <td>
                    <span class="<?php echo $challenge_taker->getTake_up_platform()->getPlatform_code(); ?>_span">
                        <?php echo $challenge_taker->getTake_up_platform()->getPlatform_code(); ?>
                    </span>
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
                <td>
                    <?php 
                    if($challenge_taker->getTake_up_proof_url()!='')
                    {
                    ?>
                       <a class="table_link" href="<?php echo $challenge_taker->getTake_up_proof_url()?>" target="_blank">Preuve</a>
                    <?php
                    }
                    else 
                    {
                        echo 'Pas de preuve';
                    }
                    ?>
                    
                </td>
                <td>
                    <?php echo $challenge_taker->getTake_up_score()?>
                </td>
                
                <td <?php if(intval($challenge_taker->getTake_up_verified()==1)){ echo'class="checked"'; }?>>
                </td>
                
                <td class="table_button">
                    <?php
                    if($session_user->getUser_number()==$challenge->getChallenge_originator()->getUser_number() AND intval($challenge_taker->getTake_up_verified())==0 AND $challenge_taker->getTake_up_proof_url()!='')
                    {?>
                    <a href="Update_Challenge_Taker_Verified.php?challenge_number=<?php echo $challenge_taker->getTake_up_challenge()->getChallenge_number(); ?>&user_id=<?php echo $challenge_taker->getTake_up_user()->getUser_id(); ?>">
                        <button class="button">Valider</button>
                    </a>
                    <?php
                    }
                    ?>
                </td>
            </tr>	
<?php
            }
        }
    }
    else
    {?>
            <tr>
                <td colspan="7">
                    <span class="nothing">Pas de tentatives</span>
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