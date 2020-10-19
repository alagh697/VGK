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
            //Navigation in the challenges section
            if(isset($_GET['page']) AND !empty($_GET['page']))
            {
                $page=$_GET['page'];
                switch ($page)
                {
                    case 'friends':
                        $page_number=1;
                        break;
                    case 'subscriptions':
                        $page_number=2;
                        break;
                    case 'all':
                        $page_number=3;
                        break;
                    case 'invitations':
                        $page_number=4;
                        break;
                    case 'taken':
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
            require('Challenges_Content_Header.php'); 
            require('Challenges_Content_Menu.php');
            
            switch ($page_number)
            {
                case 0:
                    require('Challenges_List_User.php');
                    break;
                case 1:
                    require('Challenges_List_Friends.php');
                    break;
                case 2:
                    require('Challenges_List_Subscriptions.php');
                    break;
                case 3:
                    require('Challenges_List_All.php');
                    break;
                case 4:
                    require('Challenges_List_Invitations.php');
                    break;
                case 5:
                    require('Challenges_List_Taken.php');
                    break;
                default :
                    require('Challenges_List_User.php');
            }
            ?>
        </div>
        <?php 
            require('Challenge_Form_Pop_Up.php'); 
            require('News_Feed_Post_Form_Pop_Up.php');
            require('VGK_Config/config_script.php'); 
        ?>
    </body>
</html>