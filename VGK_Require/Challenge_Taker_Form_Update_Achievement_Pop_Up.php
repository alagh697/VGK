<!--Update challenge_taker Form -->
<div id="update_challenge_taker_form_div" class="pop_up_div">
    <div id="overlay_update_challenge_taker" class="overlay"></div>

    <form class="pop_up_form" id="update_challenge_taker_form" action="Update_Challenge_Taker_Achievement.php" method="post">

        <div class="pop_up_title">Relever le défi sur <?php echo $challenge->getChallenge_game()->getGame_name(); ?></div>
        <input type="hidden" name="challenge_number" value="<?php echo $challenge->getChallenge_number(); ?>" />
        <table class="pop_up_tab">
            <tr>
                <td>
                    <label for="score">Score</label>      
                </td>
                <td>
                    <input type="text" value="<?php echo $challenge_taken->getTake_up_score(); ?>" name="score" id="score" maxlength="80" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="proof">Lien preuve</label>      
                </td>
                <td>
                    <input type="text" value="<?php echo $challenge_taken->getTake_up_proof_url(); ?>" name="proof" id="proof" />
                </td>
            </tr>
            <tr>
                <td>
                    (youtube ou twitch)    
                </td>
                <td>
                    
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Valider" id="submit_update_challenge_taker"/>
                <input type="reset" value="Annuler" id="reset_update_challenge_taker"/>
                </td>
            </tr>
        </table>

    </form>
</div>
