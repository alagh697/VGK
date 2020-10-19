<!--Add challenge_taker Form -->
<div id="add_challenge_taker_form_div" class="pop_up_div">
    <div id="overlay_add_challenge_taker" class="overlay"></div>

    <form class="pop_up_form" id="add_challenge_taker_form" action="Add_Challenge_Taker.php" method="post">

        <div class="pop_up_title">Relever le défi sur <?php echo $challenge->getChallenge_game()->getGame_name(); ?></div>
        <input type="hidden" name="challenge_number" value="<?php echo $challenge->getChallenge_number(); ?>" />
        <table class="pop_up_tab">
            <tr>
                <td>
                    <label>Version</label>
                </td>
                <td>
                    <select name="game_version">
                    <?php 
                    $challenge->getChallenge_game()->loadAllPlatformsOfGame($database);
                    foreach($challenge->getChallenge_game()->getGamePlatforms() as $platform)
                    {
                        //test if the session user already own this version
                        $user_own_game=new User_own_game_platform();
                        $user_own_game->setAll($session_user, $challenge->getChallenge_game(), $platform);
                        $owned_game_exist=$user_own_game->loadOwnedGame($database);
                        //if the session user own the game we show the option
                        echo $owned_game_exist;
                        if($owned_game_exist)
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
                <td><input  type="submit" value="Valider" id="submit_add_challenge_taker"/>
                <input type="reset" value="Annuler" id="reset_add_challenge_taker"/>
                </td>
            </tr>
        </table>

    </form>
</div>
