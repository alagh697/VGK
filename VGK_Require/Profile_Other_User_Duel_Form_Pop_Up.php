<!--New duel Form -->
<div id="add_duel_form_div" class="pop_up_div">
    <div id="overlay_add_duel" class="overlay"></div>
    <form class="pop_up_form" id="add_duel_form" action="Add_Duel.php" method="post">
        <input type="hidden" name="target_number" value="<?php echo $theUser->getUser_number() ;?>" />
    <div class="pop_up_title">Provoquer <?php echo $theUser->getUser_id(); ?> en Duel</div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label>Vos jeux</label>
                </td>
                <td>
                    <select name="game_platform">
                    <?php 
                    if($session_user_library_exist)
                    {
                        $session_user_main_game_exist=$session_user->loadUserMainGamePlatform($database);
                        foreach($session_user->getUserLibrary() as $game_version)
                        {
                            //If the session user has a main game we select it first
                            $selected=false;
                            if($session_user_main_game_exist AND $session_user->getUser_main_game()->getGame_number()==$game_version->getGame()->getGame_number() AND $session_user->getUser_main_platform()->getPlatform_code()==$game_version->getPlatform()->getPlatform_code())
                            {
                                $selected=true;
                            }
                        ?>
                            <option value="<?php echo $game_version->getGame()->getGame_number(); ?>/<?php echo $game_version->getPlatform()->getPlatform_code(); ?>" <?php if($selected){ echo 'selected'; }?>>
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
                    <label for="title">Titre</label>      
                </td>
                <td>
                    <input type="text" name="title" id="title" maxlength="100" required/>
                </td>

            </tr>
            
            <tr class="description">
                <td>
                    <label for="description">Description</label>
                </td>
                <td>
                    <textarea  name="description" id="description" maxlength="500"></textarea>
                </td>   
            </tr>

            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Valider" id="submit_add_duel"/>
                <input type="reset" value="Annuler" id="reset_add_duel"/>
                </td>
            </tr>
        </table>

    </form>

</div>