<!--Challenge winner Form -->
<div id="update_challenge_winner_form_div" class="pop_up_div">
    <div id="overlay_update_challenge_winner" class="overlay"></div>
    <form class="pop_up_form" id="update_challenge_winner_form" action="Update_Challenge_Winner.php" method="post">
    <input type="hidden" name="challenge_number" value="<?php echo $challenge->getChallenge_number(); ?>" />
    <div class="pop_up_title">Invitation challenge</div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label>Tentative validées</label>
                </td>
                <td>
                    <select name="winner_number" class="user_option">
                    <?php 
                    if($challenge_takers_exist)
                    {
                        foreach ($challenge->getChallengeTakers() as $challenge_taker)
                        {
                            if($session_user->getUser_number()!=$challenge_taker->getTake_up_user()->getUser_number() AND $challenge->getChallenge_originator()->getUser_number()!=$challenge_taker->getTake_up_user()->getUser_number() AND intval($challenge_taker->getTake_up_verified())==1)
                            {
                        ?>
                            <option value="<?php echo $challenge_taker->getTake_up_user()->getUser_number(); ?>">
                                <?php echo $challenge_taker->getTake_up_user()->getUser_id(); ?>
                            </option>
                        <?php
                            }
                        }
                    }
                    ?>  
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Valider" id="submit_update_challenge_winner"/>
                <input type="reset" value="Annuler" id="reset_update_challenge_winner"/>
                </td>
            </tr>
        </table>

    </form>

</div>