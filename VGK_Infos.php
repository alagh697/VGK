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
        require('VGK_Require/VGK_Infos_Sidebar_Menu.php'); 
        require('VGK_Require/VGK_Infos_Right_Sidebar.php');
        ?>
        <div class="content">
            <?php
            //Navigation in the settings
            if(isset($_GET['page']) AND !empty($_GET['page']))
            {
                $page=$_GET['page'];
                switch ($page)
                {
                    case 'terms':
                        $page_number=1;
                        $header="Conditions d'utilisation";
                        break;
                    case 'press':
                        $page_number=2;
                        $header="Presse";
                        break;
                    case 'advertising':
                        $page_number=3;
                        $header="Publicité";
                        break;
                    case 'partnership':
                        $page_number=4;
                        $header="Partenaire";
                        break;
                    default :
                        $page_number=0;
                        $header="Contact";
                }
            }
            else
            {
                $page_number=0;
                $header="Contact";
            }
            require('VGK_Require/VGK_Infos_Content_Header.php'); 
            require('VGK_Require/VGK_Infos_Content_Menu.php');
            switch ($page_number)
            {
                case 0:
                    require('VGK_Require/VGK_Infos_Contact.php');
                    break;
                case 1:
                    require('VGK_Require/VGK_Infos_Terms_Of_Use.php');
                    break;
                case 2:
                    require('VGK_Require/VGK_Infos_Press.php');
                    break;
                case 3:
                    require('VGK_Require/VGK_Infos_Advertising.php');
                    break;
                case 4:
                    require('VGK_Require/VGK_Infos_Partnership.php');
                    break;
                default :
                    require('VGK_Require/VGK_Infos_Contact.php');
            }
            ?>
        </div>
        
        <?php 
        require('VGK_Require/News_Feed_Post_Form_Pop_Up.php');
        require('VGK_Require/VGK_Config/config_script.php'); 
        ?>
    </body>
</html>