<?php
    if(!isset($theUser))
    {
        $theUser=$session_user;
    }
    $user_library_duels_originated_exist=$theUser->loadUserLibraryDuelsOriginated($database);
?>
<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="9">Les duels provoqués sur les jeux de <?php echo $theUser->getUser_id(); ?></th>
            </tr>
            <tr>
                <th>Provocateur</th>
                <th>Cible</th>
                <th>Jeu</th>
                <th>Platforme</th>
                <th>Titre</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Vainqueur</th>
                <th>Ajoutée</th>
            </tr>
        </thead>
        <tbody>
<?php 
    if($user_library_duels_originated_exist)
    {
        foreach ($theUser->getUserLibraryDuelsOriginated() as $duel)
        {?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $duel->getDuel_originator()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $duel->getDuel_originator()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $duel->getDuel_originator()->getUser_id(); ?>" class="table_link"><?php echo $duel->getDuel_originator()->getUser_id(); ?></a>
                </td>
                <td>
                    <a href="Profile.php?user_id=<?php echo $duel->getDuel_target()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $duel->getDuel_target()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $duel->getDuel_target()->getUser_id(); ?>" class="table_link"><?php echo $duel->getDuel_target()->getUser_id(); ?></a>
                </td>
                <td>
                    <a href="Game_Profile.php?game_name=<?php echo urlencode($duel->getDuel_game()->getGame_name()); ?>">
                        <img class="game_table_image" src="VGK_Image/Game_Cover/<?php echo $duel->getDuel_game()->getGame_cover_url(); ?>.jpg"/>
                    </a>
                </td>
                <td>
                    <span class="<?php echo $duel->getDuel_platform()->getPlatform_code(); ?>_span">
                        <?php echo $duel->getDuel_platform()->getPlatform_code(); ?>
                    </span>
                </td>
                <td>
                    <?php echo $duel->getDuel_title(); ?>
                </td>
                <td>
                    <?php 
                    if($duel->getDuel_start_date()!='0000-00-00 00:00:00')
                    {
                        echo date_format(date_create($duel->getDuel_start_date()), 'd/m/Y H:i');
                    }
                    else 
                    {
                        echo 'En attente';
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if($duel->getDuel_end_date()!='0000-00-00 00:00:00')
                    {
                        echo date_format(date_create($duel->getDuel_end_date()), 'd/m/Y H:i');
                    }
                    else 
                    {
                        echo 'En attente';
                    }
                    ?>
                </td>
                <td>
                    <a href="Profile.php?user_id=<?php echo $duel->getDuel_winner()->getUser_id(); ?>" class="table_link"><?php echo $duel->getDuel_winner()->getUser_id(); ?></a>
                </td>
                <td>
                    <?php echo date_format(date_create($duel->getDuel_creation_date()), 'd/m/Y');?>
                </td>
                <td class="table_button">
                    <a href="Duel_Detail.php?duel_number=<?php echo $duel->getDuel_number(); ?>">
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
                <td colspan="9">
                    <span class="nothing">Pas de duels provoqués</span>
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