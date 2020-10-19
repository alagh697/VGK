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
            
            <div class="log_reg">
                <a id="clickLogin">CONNEXION</a>
                <a id="clickRegister">INSCRIPTION</a>
            </div>
	</div>
        
        <?php 
        require('Presentation_Slider.php');     
        require('Login_Pop_Up.php'); 
        require('Register_Pop_Up.php'); 
        require('VGK_Config/config_script.php'); 
        ?>
    </body>
</html>