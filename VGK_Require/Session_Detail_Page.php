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
            //Navigation in the availability detail
            if(isset($_GET['page']) AND !empty($_GET['page']))
            {
                $page=$_GET['page'];
                switch ($page)
                {
                    case 'waiting_list':
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
            require('Session_Detail_Content_Header.php'); 
            require('Session_Detail_Content_Menu.php');
            switch ($page_number)
            {
                case 0:
                    require('Session_Detail_Content_Players.php');
                    break;
                case 1:
                    require('Session_Detail_Content_Waiting_List.php');
                    break;
                default :
                    require('Session_Detail_Content_Players.php');
            }
            ?>
        </div>
        <?php require('Session_Detail_Pop_Ups.php'); ?>
        
        <?php require('VGK_Config/config_script.php'); ?>
    </body>
</html>