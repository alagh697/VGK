<!--Friend request Form -->
<div id="friend_request_form_div" class="pop_up_div">
    <div id="overlay_friend_request" class="overlay"></div>

    <form class="pop_up_form" id="friend_request_form" action="Add_Friend_Request.php" method="get">

        <div class="pop_up_title">Envoyer demande d'amie à <?php echo $theUser->getUser_id(); ?></div>
        <input type="hidden" name="target_id" value="<?php echo $theUser->getUser_id(); ?>" />
        <table class="pop_up_tab">
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
                <td><input  type="submit" value="Valider" id="submit_friend_request"/>
                <input type="reset" value="Annuler" id="reset_friend_request"/>
                </td>
            </tr>
        </table>

    </form>
</div>

