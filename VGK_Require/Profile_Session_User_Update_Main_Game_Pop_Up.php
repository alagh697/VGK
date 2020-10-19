<!--Add to library Form -->
<div id="update_main_game_form_div" class="pop_up_div">
    <div id="overlay_update_main_game" class="overlay"></div>

    <form class="pop_up_form" id="update_main_game_form" action="Update_Main_Game.php" method="get">

        <div class="pop_up_title">Jeu principal</div>
        <table class="pop_up_tab">
            <tr>
                <td>
                    <label>Vos jeux</label>
                </td>
                <td>
                    <select name="main_game_platform">
                    <?php 
                    if($session_user_library_exist)
                    {
                        foreach($session_user->getUserLibrary() as $game_version)
                        {
                        ?>
                            <option value="<?php echo $game_version->getGame()->getGame_number(); ?>/<?php echo $game_version->getPlatform()->getPlatform_code(); ?>">
                                <?php echo $game_version->getGame()->getGame_name(); ?> <?php echo $game_version->getPlatform()->getPlatform_name(); ?>
                            </option>
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
                <td><input  type="submit" value="Valider" id="submit_update_main_game"/>
                <input type="reset" value="Annuler" id="reset_update_main_game"/>
                </td>
            </tr>
        </table>

    </form>
</div>
