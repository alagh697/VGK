<?php
    $followers_exist=$session_user->loadUserFollowers($database);
?>
<div class="content_content">	
    <table class="friend_table">
        <thead>
            <tr>
                <th>Followers list</th>
            </tr>	
        </thead>
        <tbody>
<?php 
    if($followers_exist)
    {
        foreach ($session_user->getUserFollowers() as $follow)
        {?>
            <tr>
                <td>
                    <a href=""><img src="VGK_Image/Profile_Picture/<?php echo $follow->getFollow_following()->getUser_profile_picture_url(); ?>" height="30" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $follow->getFollow_following()->getUser_id(); ?>" class="table_link"><?php echo $follow->getFollow_following()->getUser_id(); ?></a>
                    <span class="since"><?php echo $follow->getFollow_date()?></span>
                </td>
            </tr>	
<?php
        }
    }
    else
    {?>
            <tr>
                <td>
                    <span class="nothing">No Followers</span>
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