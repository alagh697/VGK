<!--New session Form -->
<div id="add_session_form_div" class="pop_up_div">
    <div id="overlay_add_session" class="overlay"></div>
    <form class="pop_up_form" id="add_session_form"action="Add_Session.php" method="post">
    <div class="pop_up_title">Nouvelle Session sur <?php echo $theGame->getGame_name(); ?></div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label>Vos versions</label>
                </td>
                <td>
                    <select name="game_platform">
                    <?php 
                    foreach($theGame->getGamePlatforms() as $platform)
                    {
                        //test if the session user already own this version
                        $user_own_game=new User_own_game_platform();
                        $user_own_game->setAll($session_user, $theGame, $platform);
                        $owned_game_exist=$user_own_game->loadOwnedGame($database);
                        //if the session user doesn't already own the game we show the option
                        if($owned_game_exist)
                        {
                    ?>
                        <option value="<?php echo $theGame->getGame_number(); ?>/<?php echo $platform->getPlatform_code(); ?>"><?php echo $platform->getPlatform_name(); ?></option>
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
                    <label>Nombre de joueurs max</label>
                </td>
                <td>
                    <select name="nb_player">
                    <?php 
                    for ($nb = 1 ; $nb <= 100 ; $nb++)
                    {
                    ?>
                        <option value="<?php echo $nb ?>"><?php echo $nb; ?></option>
                    <?php              
                    }
                    ?>  
                    </select>
                </td>
            </tr>
            
            <tr>    
                <td>
                    <label>Date et heure</label>
                </td>
                <td>
                    <input type="text" name="start_date" class="datepicker" id="datepicker" readonly='true'/>
                    <input type="text" name="start_time" class="timepicker" id="timepicker" readonly='true' value="<?php echo date("H:i")?>"/>
                </td>
            </tr>
            
            <tr>    
                <td>
                    <label>Durée (en heure)</label>
                </td>
                <td>
                    <select name="duration">
                    <?php 
                    for ($hour = 1 ; $hour <= 12 ; $hour++)
                    {
                    ?>
                        <option value="<?php echo $hour ?>"><?php echo $hour; ?></option>
                    <?php              
                    }
                    ?>  
                    </select>
                </td>
            </tr>
            
            <tr>    
                <td>
                    <label>Privée</label>
                </td>
                <td>

                    <div class="onoffswitch">
                        <input type="checkbox" name="private" class="onoffswitch-checkbox" id="myonoffswitch"/>
                        <label class="onoffswitch-label" for="myonoffswitch">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>

                </td>
            </tr>
            
            <tr>    
                <td>
                    <label>Micro</label>
                </td>
                <td>

                    <div class="onoffswitch">
                        <input type="checkbox" name="microphone" class="onoffswitch-checkbox" id="myonoffswitch_mic"/>
                        <label class="onoffswitch-label" for="myonoffswitch_mic">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>

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
                <td><input  type="submit" value="Valider" id="submit_add_session"/>
                <input type="reset" value="Annuler" id="reset_add_session"/>
                </td>
            </tr>
        </table>

    </form>

</div>