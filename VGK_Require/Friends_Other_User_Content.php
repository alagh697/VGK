<?php
    $friends_exist=$theUser->loadUserFriends($database);
?>
<div class="content_content">	
    <table class="friend_table">
        <thead>
            <tr>
                <th>Friends list</th>
            </tr>	
        </thead>
        <tbody>
<?php 
    if($friends_exist)
    {
        foreach ($theUser->getUserFriends() as $friendship)
        {?>
            <tr>
                <td>
                    <a href=""><img src="VGK_Image/Profile_Picture/<?php echo $friendship->getFriendship_friend1()->getUser_profile_picture_url(); ?>" height="30" width="35" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $friendship->getFriendship_friend1()->getUser_id(); ?>" class="table_link"><?php echo $friendship->getFriendship_friend1()->getUser_id(); ?></a>
                    <span class="since"><?php echo $friendship->getFriendship_start_date()?></span>
                </td>
            </tr>	
<?php
        }
    }
    else
    {?>
            <tr>
                <td>
                    <span class="nothing">No Friends</span>
                </td>
            </tr>
<?php   
    }
?>
            
        </tbody>

        <tfoot>
        </tfoot>
    </table>
</div>