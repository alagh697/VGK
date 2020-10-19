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
            <div class="form_log_reg_title">CONNEXION</div>
            
            <form id="login_form" action="Login.php" method="post">
                
            <table class="form_tab">
                    <tr>
                        <td>
                            <label>Identifiant</label>
                        </td>
                        <td>
                            <input type="text" name="id" maxlength="100" required/>
                        </td>
                    </tr>
                    <tr>    
                        <td>
                            <label>Mot de passe</label>
                        </td>
                        <td>
                            <input type="password" name="password" required/>
                        </td>

                    </tr>
                    <tr class="remember_me">
                        <td>
                            <label>Se souvenir de moi</label>
                        </td>
                        <td>

                            <div class="onoffswitch">
                                <input type="checkbox" name="remember_me" class="onoffswitch-checkbox" id="myonoffswitch"/>
                                <label class="onoffswitch-label" for="myonoffswitch">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>

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
                        <td><input  type="submit" value="Valider" id="submit_login"/>
                        <input type="reset" value="Annuler" id="reset_login"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <a class="notif_link" href="Reset_Password.php">Mot de passe oublié?
                            </a>
                        </td>
                    </tr>
            </table>

            </form>
        </div>
        
     
        
        <?php require('VGK_Config/config_script.php'); ?>
    </body>
</html>

