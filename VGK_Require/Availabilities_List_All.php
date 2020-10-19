<?php
    if(!isset($theUser))
    {
        $theUser=$session_user;
    }
    $user_library_availabilities_exist=$theUser->loadUserLibraryAvailabilities($database);
?>
<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="7">Les disponibilités les jeux de  <?php echo $theUser->getUser_id(); ?></th>
            </tr>
            <tr>
                <th>Joueur</th>
                <th>Jeu</th>
                <th>Platforme</th>
                <th>Titre</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Ajoutée</th>
            </tr>
        </thead>
        <tbody>
<?php 
    if($user_library_availabilities_exist)
    {
        foreach ($theUser->getUserLibraryAvailabilities() as $availability)
        {?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $availability->getAvailability_user()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $availability->getAvailability_user()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $availability->getAvailability_user()->getUser_id(); ?>" class="table_link"><?php echo $availability->getAvailability_user()->getUser_id(); ?></a>
                </td>
                <td>
                    <a href="Game_Profile.php?game_name=<?php echo urlencode($availability->getAvailability_game()->getGame_name()); ?>">
                        <img class="game_table_image" src="VGK_Image/Game_Cover/<?php echo $availability->getAvailability_game()->getGame_cover_url(); ?>.jpg"/>
                    </a>
                </td>
                <td>
                    <span class="<?php echo $availability->getAvailability_platform()->getPlatform_code(); ?>_span">
                        <?php echo $availability->getAvailability_platform()->getPlatform_code(); ?>
                    </span>
                </td>
                <td>
                    <?php echo $availability->getAvailability_title(); ?>
                </td>
                <td>
                    <?php echo date_format(date_create($availability->getAvailability_start_date()), 'd/m/Y H:i');?>
                </td>
                <td>
                    <?php echo date_format(date_create($availability->getAvailability_end_date()), 'd/m/Y H:i');?>
                </td>
                <td>
                    <?php echo date_format(date_create($availability->getAvailability_creation_date()), 'd/m/Y');?>
                </td>
                <td class="table_button">
                    <a href="Availability_Detail.php?availability_number=<?php echo $availability->getAvailability_number(); ?>">
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
                    <span class="nothing">Pas de disponibilités</span>
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