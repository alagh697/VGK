<!--Post Form -->
<div id="add_post_form_div" class="pop_up_div">
    <div id="overlay_add_post" class="overlay"></div>
    <form class="pop_up_form" id="add_post_form" action="Add_Post.php" method="post">
    <div class="pop_up_title">Nouveau post</div>

        <table  class="pop_up_tab">
                    
            <tr>
                <td>
                    <label>Message</label>
                    <p class="nothing_left">(300 caractères max)</p>
                </td>
                <td>
                    <textarea  name="message" maxlength="300" placeholder="Quelque chose à déclarer?" required></textarea>
                </td>   
            </tr>
            
            <tr>    
                <td>
                    <label>Vos Jeux</label>
                </td>
                <td>
                    <select name="game_platform">
                        <option value="" selected>Ne concerne pas un jeu</option>
                    <?php 
                    if($session_user_library_exist)
                    {
                        $session_user_main_game_exist=$session_user->loadUserMainGamePlatform($database);
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
                <td>
                    <input  type="submit" value="Valider" id="submit_add_post"/>
                    <input type="reset" value="Annuler" id="reset_add_post"/>
                </td>
            </tr>
        </table>

    </form>

</div>