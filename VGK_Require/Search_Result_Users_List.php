<?php $searchUsers_List=user::searchUsers($database, $keyword);?>
<div class="search_user_list">
    <span class="list_title">Utilisateurs</span>
    <ul class="user_list">
    <?php
    if(!empty($searchUsers_List))
    {?>
        <ul class="user_list">
        <?php
        foreach ($searchUsers_List as $user) 
        {?>
            <li>
                <table class="user_list_table">
                    <tr>
                        <td>
                            <a href="Profile.php?user_id=<?php echo $user->getUser_id(); ?>">
                            <img class="user_list_image" src="VGK_Image/Profile_Picture/<?php echo $user->getUser_profile_picture_url(); ?>" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a class="user_name" href="Profile.php?user_id=<?php echo $user->getUser_id(); ?>">
                            <p><?php echo $user->getUser_id(); ?></p>
                            </a>
                        </td>
                    </tr>
                </table>
            </li>
        <?php
        }
        ?>
        </ul>
    <?php
    }
    else
    {
    ?>
        <br/><span class="nothing_left">No users found</span>
    <?php
    }
    ?>
        
</div>