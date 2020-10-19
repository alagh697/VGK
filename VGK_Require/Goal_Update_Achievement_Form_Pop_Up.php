<!--Goal achievement Form -->
<div id="update_goal_achievement_form_div" class="pop_up_div">
    <div id="overlay_update_goal_achievement" class="overlay"></div>
    <form class="pop_up_form" id="update_goal_achievement_form" action="Update_Goal_Achievement.php" method="post">
    <input type="hidden" name="goal_number" value="<?php echo $goal->getGoal_number(); ?>" />
    <div class="pop_up_title">Atteinte de l'objectif</div>

        <table  class="pop_up_tab">
            <tr>
                <td>
                    <label>Déroulement</label>
                </td>
                <td>
                    <textarea  name="description" maxlength="500"></textarea>
                </td>   
            </tr>
            
            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Valider" id="submit_update_goal_achievement"/>
                <input type="reset" value="Annuler" id="reset_update_goal_achievement"/>
                </td>
            </tr>
        </table>

    </form>

</div>