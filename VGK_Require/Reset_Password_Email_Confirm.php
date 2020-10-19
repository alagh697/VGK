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
	</div>
        
        <div class="presentation">
            <div class="presentation_top">
                Réinitialiser mot de passe: Adresse email de votre compte
            </div>

            <div class="presentation_content">
                <table class="presentation_table">
                    <tr>
                        <td>
                            <img src="VGK_Image/VGK_Logo/Logo_VGK_init_160x80.png" height="80" width="140"/>
                        </td>
                        <td class="presentation_td">
                            <div class="presentation_text">
                                Un message a été envoyé à l'adresse mail indiquée.<br/>
                                Suivez les instructions présentes dans ce message afin de réinitialiser votre mot de passe.<br/>
                            </div>
                        <td>
                    </tr>
                </table>
            </div>
            
            <div class="presentation_bottom">
                <label>POPULATION: </label><span class="important_info"><?php echo User::getUserCount($database);?></span><br/>
                <img src="VGK_Image/Platform_Icon/Twitter.png" height="20" width="20"/>
                <a href="https://twitter.com/King__Akuma" class="twitter_link" target="_blank">@King__Akuma</a> 
                <a href="https://twitter.com/VidGamKingdom" class="twitter_link" target="_blank">@VidGamKingdom</a>
                <br/>
                <span class="copyright">Gharbi Alaaeddine &copy; 2016</span>
            </div>
        </div>
        
        <?php   
        require('VGK_Config/config_script.php'); 
        ?>
    </body>
</html>