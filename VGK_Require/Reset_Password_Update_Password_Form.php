<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Video Game Kingdom</title>
        <link rel="shortcut icon" href="VGK_Image/VGK_Logo/Logo_VGK_init_160x80.png" />
        <?php require('VGK_Config/config_style.php'); ?>
    </head>
    <body>
        
        <div class="top_banner">
            <a href="index.php"><img class="vgk_name_logo" src="VGK_Image/VGK_Logo/vgk1.png" height="45" width="330"/></a>
            <span class="vgk_status">Alpha</span>
	</div>
        
        <div class="form_log_reg">
            <div class="form_log_reg_title">Réinitialiser mot de passe <?php echo $theUser->getUser_id(); ?></div>
            
            <form id="update_password_form" action="" method="post">
                
            <table class="form_tab">
                    <tr>    
                        <td>
                            <label for="password">Nouveau mot de passe</label>
                            <p class="nothing_left">
                                De 8 à 50 caractères.<br/> 
                                (Seulement des lettres, des chiffres et '!@#$%' )<br/>
                                (Au moins 1 lettre et 1 chiffre.)
                            </p>
                        </td>
                        <td>
                            <input type="password" name="password" id="password" maxlength="50" required/>
                        </td>

                    </tr>
                    <tr>    
                        <td>
                            <label for="password_confirm">Confirmez mot de passe</label>
                        </td>
                        <td>
                            <input type="password" name="password_confirm" id="password_confirm" maxlength="50" required/>
                        </td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <span class="error_span">
                                <?php 
                                    if(isset($error))
                                    {
                                        echo $error;
                                    }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td><input  type="submit" value="Valider" id="submit_update_password"/>
                        <input type="reset" value="Annuler" id="reset_update_password"/>
                        </td>
                    </tr>
            </table>

            </form>
        </div>
        
     
        
        <?php require('VGK_Config/config_script.php'); ?>
    </body>
</html>

