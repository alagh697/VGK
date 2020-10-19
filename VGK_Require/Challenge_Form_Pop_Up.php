<!--New challenge Form -->
<div id="add_challenge_form_div" class="pop_up_div">
    <div id="overlay_add_challenge" class="overlay"></div>
    <form class="pop_up_form" id="add_challenge_form" action="Add_Challenge.php" method="post">

    <div class="pop_up_title">Nouveau Défi</div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label>Vos jeux</label>
                </td>
                <td>
                    <select name="game">
                    <?php 
                    if($session_user_games_exist)
                    {
                        $session_user_main_game_exist=$session_user->loadUserMainGamePlatform($database);
                        foreach($session_user->getUserGames() as $game)
                        {
                            //If the session user has a main game we select it first
                            $selected=false;
                            if($session_user_main_game_exist AND $session_user->getUser_main_game()->getGame_number()==$game->getGame_number())
                            {
                                $selected=true;
                            }
                        ?>
                            <option value="<?php echo $game->getGame_number(); ?>" <?php if($selected){ echo 'selected'; }?>>
                                <?php echo $game->getGame_name(); ?> 
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
            
            <tr>    
                <td>
                    <label>Date et heure de fin</label>
                </td>
                <td>

                    <div class="onoffswitch">
                        <input type="checkbox" name="end_date_check" class="onoffswitch-checkbox" id="end_date_check"/>
                        <label class="onoffswitch-label" for="end_date_check">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>

                </td>
            </tr>
            
            <tr id="end_date" class="challenge_end_date">    
                <td>
                    
                </td>
                <td>
                    <input type="text" name="end_date" class="datepicker" id="datepicker" readonly='true'/>
                    <input type="text" name="end_time" class="timepicker" id="timepicker" readonly='true' value="<?php echo date("H:i")?>"/>
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
                <td><input  type="submit" value="Valider" id="submit_add_challenge"/>
                <input type="reset" value="Annuler" id="reset_add_challenge"/>
                </td>
            </tr>
        </table>

    </form>

</div>