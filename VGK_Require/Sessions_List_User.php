<?php
    if(!isset($theUser))
    {
        $theUser=$session_user;
    }
    $user_sessions_hosted_exist=$theUser->loadUserSessionsHosted($database);
?>
<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="9">Les sessions hébergées par <?php echo $theUser->getUser_id(); ?></th>
            </tr>
            <tr>
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
    if($user_sessions_hosted_exist)
    {
        foreach ($theUser->getUserSessionsHosted() as $session)
        {?>
            <tr>
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
                <td colspan="9">
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