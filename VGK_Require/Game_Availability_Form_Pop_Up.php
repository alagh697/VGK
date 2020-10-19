<!--New availability Form -->
<div id="add_availability_form_div" class="pop_up_div">
    <div id="overlay_add_availability" class="overlay"></div>
    <form class="pop_up_form" id="add_availability_form" action="Add_Availability.php" method="post">

    <div class="pop_up_title">Nouvelle Disponibilité sur <?php echo $theGame->getGame_name(); ?></div>

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
                    <label>Date et heure</label>
                </td>
                <td>
                    <input type="text" name="start_date" class="datepicker" id="datepicker_availability" readonly='true' required/>
                    <input type="text" name="start_time" class="timepicker" id="timepicker_availability" readonly='true' required value="<?php echo date("H:i")?>"/>
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
                <td><input  type="submit" value="Valider" id="submit_add_availability"/>
                <input type="reset" value="Annuler" id="reset_add_availability"/>
                </td>
            </tr>
        </table>

    </form>

</div>