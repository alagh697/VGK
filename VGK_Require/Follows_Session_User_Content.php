<?php
    $follows_exist=$session_user->loadUserFollows($database);
?>
<div class="content_content">	
    <table class="friend_table">
        <thead>
            <tr>
                <th>Follows list</th>
            </tr>	
        </thead>
        <tbody>
<?php 
    if($follows_exist)
    {
        foreach ($session_user->getUserFollows() as $follow)
        {?>
            <tr>
                <td>
                    <a href=""><img src="VGK_Image/Profile_Picture/<?php echo $follow->getFollow_followed()->getUser_profile_picture_url(); ?>" height="30" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $follow->getFollow_followed()->getUser_id(); ?>" class="table_link"><?php echo $follow->getFollow_followed()->getUser_id(); ?></a>
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
                    <span class="nothing">No Follows</span>
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