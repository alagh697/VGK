<?php
    if(!isset($theUser))
    {
        $theUser=$session_user;
    }
    $user_sessions_joined_exist=$theUser->loadUserSessionsJoined($database);
?>
<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="6">Les sessions rejointes par <?php echo $theUser->getUser_id(); ?></th>
            </tr>
            <tr>
                <th>Hôte</th>
                <th>Jeu</th>
                <th>Platforme</th>
                <th>Titre</th>
                <th>Début</th>
                <th>Fin</th>               
            </tr>
        </thead>
        <tbody>
<?php 
    if($user_sessions_joined_exist)
    {
        foreach ($theUser->getUserSessionsJoined() as $session)
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
                    <?php echo date_format(date_create($session->getSession_start_date()), 'd/m/Y H:i');?>
                </td>
                <td>
                    <?php echo date_format(date_create($session->getSession_end_date()), 'd/m/Y H:i');?>
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
                <td colspan="6">
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