<!--Duel result Form -->
<div id="update_duel_result_form_div" class="pop_up_div">
    <div id="overlay_update_duel_result" class="overlay"></div>
    <form class="pop_up_form" id="update_duel_result_form" action="Update_Duel_Result.php" method="post">
    <input type="hidden" name="duel_number" value="<?php echo $duel->getDuel_number(); ?>" />
    <div class="pop_up_title">Résultats du duel</div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label>Gagnant</label>
                </td>
                <td>
                    <input type="radio" name="winner_number" value="<?php echo $duel->getDuel_originator()->getUser_number(); ?>"> <?php echo $duel->getDuel_originator()->getUser_id(); ?><br/>
                    <input type="radio" name="winner_number" value="<?php echo $duel->getDuel_target()->getUser_number(); ?>"> <?php echo $duel->getDuel_target()->getUser_id(); ?>
                </td>
            </tr>
            
            <tr>
                <td>
                    <label>Déroulement</label>
                </td>
                <td>
                    <textarea  name="progress" maxlength="500"></textarea>
                </td>   
            </tr>
            
            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Valider" id="submit_update_duel_result"/>
                <input type="reset" value="Annuler" id="reset_update_duel_result"/>
                </td>
            </tr>
        </table>

    </form>

</div>