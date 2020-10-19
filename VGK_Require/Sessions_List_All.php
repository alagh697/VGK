<?php
    if(!isset($theUser))
    {
        $theUser=$session_user;
    }
    $user_library_sessions_hosted_exist=$theUser->loadUserLibrarySessionsHosted($database);
?>
<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="10">Les sessions hébergées sur les jeux de <?php echo $theUser->getUser_id(); ?></th>
            </tr>
            <tr>
                <th>Hôte</th>
                <th>Jeu</th>
                <th>Platforme</th>
                <th>Titre</th>
                <th>Joueurs max</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Micro</th>
                <th>Privée</th>
                <th>Ajoutée</th>
            </tr>
        </thead>
        <tbody>
<?php 
    if($user_library_sessions_hosted_exist)
    {
        foreach ($theUser->getUserLibrarySessionsHosted() as $session)
        {?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $session->getSession_host()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $session->getSession_host()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $session->getSession_host()->getUser_id(); ?>" class="table_link"><?php echo $session->getSession_host()->getUser_id(); ?></a>
                </td>
                <td>
                    <a href="Game_Profile.php?game_name=<?php echo urlencode($session->getSession_game()->getGame_name()); ?>">
                        <img class="game_table_image" src="VGK_Image/Game_Cover/<?php echo $session->getSession_game()->getGame_cover_url(); ?>.jpg"/>
                    </a>
                </td>
                <td>
                    <span class="<?php echo $session->getSession_platform()->getPlatform_code(); ?>_span">
                        <?php echo $session->getSession_platform()->getPlatform_code(); ?>
                    </span>
                </td>
                <td>
                    <?php echo $session->getSession_title(); ?>
                </td>
                <td>
                    <?php echo $session->getSession_max_player(); ?>
                </td>
                <td>
                    <?php echo date_format(date_create($session->getSession_start_date()), 'd/m/Y H:i');?>
                </td>
                <td>
                    <?php echo date_format(date_create($session->getSession_end_date()), 'd/m/Y H:i');?>
                </td>
                <td <?php if(intval($session->getSession_microphone()==1)){ echo'class="checked"'; }?>>
                </td>
                <td <?php if(intval($session->getSession_private()==1)){ echo'class="checked"'; }?>>
                </td>
                <td>
                    <?php echo date_format(date_create($session->getSession_creation_date()), 'd/m/Y');?>
                </td>
                <td class="table_button">
                    <a href="Session_Detail.php?session_number=<?php echo $session->getSession_number(); ?>">
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
                <td colspan="10">
                    <span class="nothing">Pas de sessions</span>
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