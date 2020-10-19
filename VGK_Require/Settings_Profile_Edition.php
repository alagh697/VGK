<?php
$session_user->loadUserGamertags($database);
?>
<div class="content_content">
			
    <form  class="form" id="update_profil_info_form" action="Update_Profile.php" enctype="multipart/form-data" method="post">			
        <table class="form_tab">


            <tr>
                <td>
                    <label>Photo de profil</label>
                </td>
                <td>
                    
                    <div id="wrapper">       
                    <input id="fileUpload" name="user_new_pp" type="file" />
                    
                </td>  
                						
            </tr>
            <tr>
                <td>
                    <img src="VGK_Image/Profile_Picture/<?php echo $session_user->getUser_profile_picture_url(); ?>"  class="profile_edition_pp">
                </td>
                <td>
                    <div id="image-holder"> </div>
                    </div>
                </td>	
            </tr>
            
            <tr class="description">
                <td>
                    Bio 
                    <p class="nothing_left">(300 caractères max)</p>
                </td>
                <td>
                    <textarea  name="user_description" maxlength="300"><?php echo $session_user->getUser_description() ; ?></textarea>
                </td>   
            </tr>
            
            <tr>
                <td>
                    Compte Playstation Network
                </td>
                <td>
                    <input type="text" name="user_psn" value="<?php echo $session_user->getUser_psn() ; ?>"/>
                </td>   
            </tr>

            <tr>
                <td>
                    Compte Xbox Live
                </td>
                <td>
                    <input type="text" name="user_xboxlive" value="<?php echo $session_user->getUser_xboxlive() ; ?>"/>
                </td>   
            </tr>
            
            <tr>
                <td>
                    Compte Nintendo
                </td>
                <td>
                    <input type="text" name="user_nintendo_id" value="<?php echo $session_user->getUser_nintendo_id() ; ?>"/>
                </td>   
            </tr>
            
            <tr>
                <td>
                    Compte Steam
                </td>
                <td>
                    <input type="text" name="user_steam" value="<?php echo $session_user->getUser_steam() ; ?>"/>
                </td>   
            </tr>
            
            <tr>
                <td>
                    Compte Battle.net
                </td>
                <td>
                    <input type="text" name="user_battlenet" value="<?php echo $session_user->getUser_battlenet() ; ?>"/>
                </td>   
            </tr>
            
            <tr>
                <td>
                    Compte Uplay
                </td>
                <td>
                    <input type="text" name="user_uplay" value="<?php echo $session_user->getUser_uplay() ; ?>"/>
                </td>   
            </tr>
            
            <tr>
                <td>
                    Compte Origin
                </td>
                <td>
                    <input type="text" name="user_origin" value="<?php echo $session_user->getUser_origin() ; ?>"/>
                </td>   
            </tr>
            
            <tr>
                <td>
                    Chaîne Youtube
                </td>
                <td>
                    <input type="text" name="user_youtube" value="<?php echo $session_user->getUser_youtube_channel() ; ?>"/>
                </td>   
            </tr>

            <tr>
                <td>
                    Chaîne Twitch
                </td>
                <td>
                    <input type="text" name="user_twitch" value="<?php echo $session_user->getUser_twitch_channel() ; ?>"/>
                </td>   
            </tr>

            <tr>
                <td>
                    Site internet
                </td>
                <td>
                    <input type="text" name="user_website" value="<?php echo $session_user->getUser_website() ; ?>"/>
                </td>   
            </tr>

            

            <tr>
                <td>
                </td>
                <td><input  type="submit" value="Valider" class="submit_button" id="submit_update_profil_info">
                <input type="reset" value="Annuler" id="reset_update_profil_info">
                </td>
            </tr>

        </table>

    </form>
		
</div>