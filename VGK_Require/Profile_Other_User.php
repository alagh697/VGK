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
                    case 'library':
                        $page_number=1;
                        break;
                    case 'wishlist':
                        $page_number=2;
                        break;
                    case 'goals':
                        $page_number=3;
                        break;
                    case 'availabilities':
                        $page_number=4;
                        break;
                    case 'sessions':
                        $page_number=5;
                        break;
                    case 'challenges':
                        $page_number=6;
                        break;
                    case 'duels':
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
            require('Profile_Other_User_Content_Header.php'); 
            require('Profile_Other_User_Content_Menu.php');
            switch ($page_number)
            {
                case 0:
                    require('Profile_User_Content_Wall.php');
                    break;
                case 1:
                    require('Profile_User_Content_Library.php');
                    break;
                case 2:
                    require('Profile_User_Content_Wishlist.php');
                    break;
                case 3:
                    require('Profile_User_Content_Goals.php');
                    break;
                case 4:
                    require('Availabilities_List_User.php');
                    break;
                case 5:
                    require('Sessions_List_User.php');
                    break;
                case 6:
                    require('Challenges_List_User.php');
                    break;
                case 7:
                    require('Duels_List_User.php');
                    break;
                default :
                    require('Profile_User_Content_Wall.php');
            }
            ?>
        </div>
        <?php 
        require('Profile_Other_User_Pop_Ups.php'); 
        
        require('VGK_Config/config_script.php'); 
        ?>
    </body>
</html>