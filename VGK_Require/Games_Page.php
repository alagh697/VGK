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
            //Navigation in the games section
            if(isset($_GET['page']) AND !empty($_GET['page']))
            {
                $page=$_GET['page'];
                switch ($page)
                {
                    case 'news':
                        $page_number=1;
                        break;
                    case 'activity':
                        $page_number=2;
                        break;
                    case 'competition':
                        $page_number=3;
                        break;
                    default :
                        $page_number=0;
                }
            }
            else
            {
                $page_number=0; 
            }
            require('Games_Content_Header.php'); 
            require('Games_Content_Menu.php'); 
            switch ($page_number)
            {
                case 0:
                    require('Games_List.php');
                    break;
                case 1:
                    require('Games_News_Feed.php');
                    break;
                case 2:
                    require('Games_Activities.php');
                    break;
                case 3:
                    require('Games_Competitions.php');
                    break;
                default :
                    require('Games_List.php');
            }
            ?>
        </div>
        
        <?php 
        require('News_Feed_Post_Form_Pop_Up.php');
        require('VGK_Config/config_script.php'); 
        ?>
    </body>
</html>