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
            //Navigation in the game profile
            if(isset($_GET['page']) AND !empty($_GET['page']))
            {
                $page=$_GET['page'];
                switch ($page)
                {
                    case 'goals':
                        $page_number=1;
                        break;
                    case 'availabilities':
                        $page_number=2;
                        break;
                    case 'sessions':
                        $page_number=3;
                        break;
                    case 'challenges':
                        $page_number=4;
                        break;
                    case 'duels':
                        $page_number=5;                       
                        break;
                    default :
                        $page_number=0;
                }
            }
            else
            {
                $page_number=0; 
            }
            require('Game_Profile_Content_Header.php'); 
            require('Game_Profile_Content_Menu.php');
            switch ($page_number)
            {
                case 0:
                    require('Game_Profile_Wall.php');
                    break;
                case 1:
                    require('Goals_List_Game.php');
                    break;
                case 2:
                    require('Availabilities_List_Game.php');
                    break;
                case 3:
                    require('Sessions_List_Game.php');
                    break;
                case 4:
                    require('Challenges_List_Game.php');
                    break;
                case 5:
                    require('Duels_List_Game.php');
                    break;
                default :
                    require('Profile_Game_Content_Wall.php');
            }
            ?>
        </div>
        
        <?php 
        require('Game_Profile_Pop_Ups.php'); 
        require('VGK_Config/config_script.php'); 
        ?>
    </body>
</html>