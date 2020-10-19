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
            //Navigation in the broadcast section
            if(isset($_GET['page']) AND !empty($_GET['page']))
            {
                $page=$_GET['page'];
                switch ($page)
                {
                    case 'poll':
                        $page_number=1;
                        break;
                    case 'q_a':
                        $page_number=2;
                        break;
                    case 'guide':
                        $page_number=3;
                        break;
                    case 'case_file':
                        $page_number=4;
                        break;
                    case 'petition':
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
            require('Forums_Content_Header.php'); 
            require('Forums_Content_Menu.php');
            switch ($page_number)
            {
                case 0:
                    require('Forums_List_Chat_Rooms.php');
                    break;
                case 1:
                    require('Forums_List_Polls.php');
                    break;
                case 2:
                    require('Forums_List_Q_A.php');
                    break;
                case 3:
                    require('Forums_List_Guides.php');
                    break;
                case 4:
                    require('Forums_List_Case_Files.php');
                    break;
                case 5:
                    require('Forums_List_Petitions.php');
                    break;
                default :
                    require('Forums_List_Chat_Rooms.php');
            }
            ?>
        </div>
        
        <?php require('VGK_Config/config_script.php'); ?>
    </body>
</html>