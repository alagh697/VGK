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
            //Navigation in the profile
            if(isset($_GET['page']) AND !empty($_GET['page']))
            {
                $page=$_GET['page'];
                switch ($page)
                {
                    case 'teams':
                        $page_number=1;
                        break;
                    case 'communities':
                        $page_number=2;
                        break;
                    case 'press':
                        $page_number=3;
                        break;
                    case 'vip':
                        $page_number=4;
                        break;
                    case 'esport':
                        $page_number=5;
                        break;
                    case 'deals':
                        $page_number=6;
                        break;
                    case 'vgk':
                        $page_number=7;
                        break;
                    default :
                        $page_number=0;
                }
            }
            else
            {
                $page_number=0; 
            }
            require('News_Feed_Content_Header.php'); 
            require('News_Feed_Content_Menu.php');
            switch ($page_number)
            {
                case 0:
                    require('News_Feed_Content_Subscriptions.php');
                    break;
                case 1:
                    require('News_Feed_Content_Teams.php');
                    break;
                case 2:
                    require('News_Feed_Content_Communities.php');
                    break;
                case 3:
                    require('News_Feed_Content_Press.php');
                    break;
                case 4:
                    require('News_Feed_Content_Vip.php');
                    break;
                case 5:
                    require('News_Feed_Content_Esport.php');
                    break;
                case 6:
                    require('News_Feed_Content_Deals.php');
                    break;
                case 7:
                    require('News_Feed_Content_VGK.php');
                    break;
                default :
                    require('News_Feed_Content_Subscriptions.php');
            }
            ?>
        </div> 
        <?php 
        require('News_Feed_Pop_Ups.php'); 
        require('VGK_Config/config_script.php'); 
        ?>
    </body>
</html>

