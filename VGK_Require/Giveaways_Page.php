<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Video Game Kingdom</title>
        <link rel="shortcut icon" href="VGK_Image/VGK_Logo/Logo_VGK_init_160x80.png" />
        <?php require('VGK_Config/config_style.php'); ?>
    </head>
    <body>
        <?php 
        require('Sidebar_Menu.php'); 
        require('Right_Sidebar.php');
        ?>
        <div class="content">
            <?php require('Giveaways_Content_Header.php'); ?>
            <?php require('Giveaways_Content_Menu.php'); ?>
            <?php require('Giveaways_List.php'); ?>
        </div>
        
        <?php require('VGK_Config/config_script.php'); ?>
    </body>
</html>