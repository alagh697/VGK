<!--Challenge invite Form -->
<div id="add_challenge_invite_form_div" class="pop_up_div">
    <div id="overlay_add_challenge_invite" class="overlay"></div>
    <form class="pop_up_form" id="add_challenge_invite_form" action="Add_Challenge_Invitation.php" method="post">
    <input type="hidden" name="challenge_number" value="<?php echo $challenge->getChallenge_number(); ?>" />
    <div class="pop_up_title">Invitation challenge</div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label>Vos amis</label>
                </td>
                <td>
                    <select name="user_number" class="user_option">
                    <?php 
                    if($session_user_friends_exist)
                    {
                        foreach($session_user->getUserFriends() as $friendship)
                        {
                        ?>
                            <option value="<?php echo $friendship->getFriendship_friend1()->getUser_number(); ?>">
                                <?php echo $friendship->getFriendship_friend1()->getUser_id(); ?>
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