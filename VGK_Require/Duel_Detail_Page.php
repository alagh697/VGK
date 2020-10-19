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
            <?php 
            //Navigation in the challenge detail
            if(isset($_GET['page']) AND !empty($_GET['page']))
            {
                $page=$_GET['page'];
                switch ($page)
                {
                    case 'updates':
                        $page_number=1;
                        break;
                    default :
                        $page_number=0;
                }
            }
            else
            {
                $page_number=0; 
            }
            require('Duel_Detail_Content_Header.php'); 
            require('Duel_Detail_Content_Menu.php');
            switch ($page_number)
            {
                case 0:
                    require('Duel_Detail_Content_Witnesses.php');
                    break;
                case 1:
                    require('Duel_Detail_Content_Updates.php');
                    break;
                default :
                    require('Duel_Detail_Content_Witnesses.php');
            }
            ?>
        </div>
        <?php 
        require('Duel_Detail_Pop_Ups.php'); 
        require('VGK_Config/config_script.php');
        ?>
    </body>
</html>