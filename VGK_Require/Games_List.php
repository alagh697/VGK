<?php $theGames=Game::loadAllGames($database);?>
<div class='content_content'>
		
    <ul class="game_list">
    <?php
    foreach ($theGames as $game) 
    {?>
        <li>
            <table class="game_list_table">
                <tr>
                    <td>
                        <a href="Game_Profile.php?game_name=<?php echo urlencode($game->getGame_name()); ?>">
                        <img class="game_list_image" src="VGK_Image/Game_Cover/<?php echo $game->getGame_cover_url(); ?>.jpg" />
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="game_name" href="Game_Profile.php?game_name=<?php echo urlencode($game->getGame_name()); ?>">
                        <p><?php echo $game->getGame_name(); ?></p>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                </tr>
            </table>
        </li>
    <?php
    }
    ?>
        
    </ul>
		
</div>	