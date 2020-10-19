<?php $searchGames_List=Game::searchGames($database, $keyword);?>
<div class="search_game_list">
    <span class="list_title">Jeux</span>
    
    <?php
    if(!empty($searchGames_List))
    {?>
        <ul class="game_list">
        <?php
        foreach ($searchGames_List as $game) 
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
                </table>
            </li>
        <?php
        }
        ?>
        </ul>
    <?php
    }
    else
    {
    ?>
        <br/><span class="nothing_left">No games found</span>
    <?php
    }
    ?>  
    
</div>