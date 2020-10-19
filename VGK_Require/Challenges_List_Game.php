<?php
    $game_challenges_exist=$theGame->loadGameChallenges($database);
?>
<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="6">Les défis sur <?php echo $theGame->getGame_name(); ?></th>
            </tr>
            <tr>
                <th>Lanceur</th>
                <th>Jeu</th>
                <th>Titre</th>
                <th>Ajoutée</th>
                <th>Fin</th>
                <th>Gagnant</th>
            </tr>
        </thead>
        <tbody>
<?php 
    if($game_challenges_exist)
    {
        foreach ($theGame->getGameChallenges() as $challenge)
        {?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $challenge->getChallenge_originator()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $challenge->getChallenge_originator()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $challenge->getChallenge_originator()->getUser_id(); ?>" class="table_link"><?php echo $challenge->getChallenge_originator()->getUser_id(); ?></a>
                </td>
                <td>
                    <a href="Game_Profile.php?game_name=<?php echo urlencode($challenge->getChallenge_game()->getGame_name()); ?>">
                        <img class="game_table_image" src="VGK_Image/Game_Cover/<?php echo $challenge->getChallenge_game()->getGame_cover_url(); ?>.jpg"/>
                    </a>
                </td>
                <td>
                    <?php echo $challenge->getChallenge_title(); ?>
                </td>
                <td>
                    <?php echo date_format(date_create($challenge->getChallenge_creation_date()), 'd/m/Y');?>
                </td>
                <td>
                    <?php 
                    if($challenge->getChallenge_end_date()!='0000-00-00 00:00:00')
                    {
                        echo date_format(date_create($challenge->getChallenge_end_date()), 'd/m/Y H:i');
                    }
                    else 
                    {
                        echo 'Pas de fin';
                    }
                    ?>
                </td>
                
                <td>
                    <?php
                    if($challenge->getChallenge_winner()->getUser_id()!='')
                    {?>
                        <a href="Profile.php?user_id=<?php echo $challenge->getChallenge_winner()->getUser_id(); ?>" class="table_link"><?php echo $challenge->getChallenge_winner()->getUser_id(); ?></a>
                    <?php
                    }
                    else 
                    {
                        echo $challenge->getChallenge_winner()->getUser_id();
                    }
                    ?>
                </td>
                
                <td class="table_button">
                    <a href="Challenge_Detail.php?challenge_number=<?php echo $challenge->getChallenge_number(); ?>">
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
                    <span class="nothing">Pas de défis</span>
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