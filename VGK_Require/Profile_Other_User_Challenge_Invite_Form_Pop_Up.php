<!--Challenge invite Form -->
<div id="add_challenge_invite_form_div" class="pop_up_div">
    <div id="overlay_add_challenge_invite" class="overlay"></div>
    <form class="pop_up_form" id="add_challenge_invite_form" action="Add_Challenge_Invitation.php" method="post">
    <input type="hidden" name="user_number" value="<?php echo $theUser->getUser_number(); ?>" />
    <div class="pop_up_title">Inviter <?php echo $theUser->getUser_id(); ?> à tenter un défi</div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label>Vos défis</label>
                </td>
                <td>
                    <select name="challenge_number" class="user_option">
                    <?php 
                    if($session_user_challenges_made_exist)
                    {
                        foreach($session_user->getUserChallengesMade() as $challenge)
                        {
                        ?>
                            <option value="<?php echo $challenge->getChallenge_number(); ?>">
                                <?php echo $challenge->getChallenge_game()->getGame_name() ; ?> :
                                <?php echo $challenge->getChallenge_title(); ?>
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
                <td><input  type="submit" value="Valider" id="submit_add_challenge_invite"/>
                <input type="reset" value="Annuler" id="reset_add_challenge_invite"/>
                </td>
            </tr>
        </table>

    </form>

</div>