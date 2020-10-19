<!--New session Form -->
<div id="add_session_form_div" class="pop_up_div">
    <div id="overlay_add_session" class="overlay"></div>
    <form class="pop_up_form" id="add_session_form" action="Add_Session.php" method="post">

    <div class="pop_up_title">Nouvelle Session</div>

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
                <td>
                    <input  type="submit" value="Valider" id="submit_add_session"/>
                    <input type="reset" value="Annuler" id="reset_add_session"/>
                </td>
            </tr>
        </table>

    </form>

</div>