<!--Session invite Form -->
<div id="add_session_invite_form_div" class="pop_up_div">
    <div id="overlay_add_session_invite" class="overlay"></div>
    <form class="pop_up_form" id="add_session_invite_form" action="Add_Session_Invitation.php" method="post">
    <input type="hidden" name="user_number" value="<?php echo $theUser->getUser_number(); ?>" />
    <div class="pop_up_title">Inviter <?php echo $theUser->getUser_id(); ?> à une session</div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label>Vos sessions</label>
                </td>
                <td>
                    <select name="session_number" class="session_option">
                    <?php 
                    if($session_user_sessions_hosted_exist)
                    {
                        foreach($session_user->getUserSessionsHosted() as $session)
                        {
                        ?>
                            <option value="<?php echo $session->getSession_number(); ?>">
                                <?php echo $session->getSession_game()->getGame_name() ; ?> :
                                <?php echo $session->getSession_title(); ?>
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
                    <label>Message</label>
                </td>
                <td>
                    <textarea  name="message" maxlength="300"></textarea>
                </td>   
            </tr>

            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Valider" id="submit_add_session_invite"/>
                <input type="reset" value="Annuler" id="reset_add_session_invite"/>
                </td>
            </tr>
        </table>

    </form>

</div>