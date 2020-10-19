<!--Add to library Form -->
<div id="add_library_form_div" class="pop_up_div">
    <div id="overlay_add_library" class="overlay"></div>

    <form class="pop_up_form" id="add_library_form" action="Add_Game_Library.php" method="post">

        <div class="pop_up_title">Ajouter une version de <?php echo $theGame->getGame_name(); ?> à votre bibliothèque</div>
        <input type="hidden" name="game_name" value="<?php echo $theGame->getGame_name(); ?>" />
        <table class="pop_up_tab">
            <tr>
                <td>
                    <label>Version</label>
                </td>
                <td>
                    <select name="game_version">
                    <?php 
                    foreach($theGame->getGamePlatforms() as $platform)
                    {
                        //test if the session user already own this version
                        $user_own_game=new User_own_game_platform();
                        $user_own_game->setAll($session_user, $theGame, $platform);
                        $owned_game_exist=$user_own_game->loadOwnedGame($database);
                        //if the session user doesn't already own the game we show the option
                        if(!($owned_game_exist))
                        {
                    ?>
                        <option value="<?php echo $platform->getPlatform_code(); ?>"><?php echo $platform->getPlatform_name(); ?></option>
                    <?php
                        }
                    }
                    ?>  
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Valider" id="submit_add_library"/>
                <input type="reset" value="Annuler" id="reset_add_library"/>
                </td>
            </tr>
        </table>

    </form>
</div>
