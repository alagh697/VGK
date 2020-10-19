<!--New availability Form -->
<div id="add_availability_form_div" class="pop_up_div">
    <div id="overlay_add_availability" class="overlay"></div>
    <form class="pop_up_form" id="add_availability_form" action="Add_Availability.php" method="post">

    <div class="pop_up_title">Nouvelle Disponibilité</div>

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
            
            <tr>    
                <td>
                    <label>Date et heure</label>
                </td>
                <td>
                    <input type="text" name="start_date" class="datepicker" id="datepicker" readonly='true' required/>
                    <input type="text" name="start_time" class="timepicker" id="timepicker" readonly='true' required value="<?php echo date("H:i")?>"/>
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