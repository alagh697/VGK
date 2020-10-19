<?php
    $friend_requests_received_exist=$session_user->loadUserFriendRequestsReceived($database);
    $friend_requests_sent_exist=$session_user->loadUserFriendRequestsSent($database);
?>
<div class="content_content">	
    <table class="friend_request_table">
        <thead>
            <tr>
                <th>Friend requests received list</th>
            </tr>	
        </thead>
        <tbody>
<?php 
    if($friend_requests_received_exist)
    {
        foreach ($session_user->getUserFriendRequestsReceived() as $friend_request)
        {?>
            <tr>
                <td>
                    <a href=""><img src="VGK_Image/Profile_Picture/<?php echo $friend_request->getRequest_sender()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $friend_request->getRequest_sender()->getUser_id(); ?>" class="table_link"><?php echo $friend_request->getRequest_sender()->getUser_id(); ?></a>
                    <span class="since"><?php echo $friend_request->getRequest_date()?></span>
                </td>
                <td class="submit_request">
                    <a href="Add_Friendship.php?user_id=<?php echo $friend_request->getRequest_sender()->getUser_id(); ?>"><button class="button" id="accept_button">Accepter</button></a>
                    <a href="Delete_Friend_Request.php?user_id=<?php echo $friend_request->getRequest_sender()->getUser_id(); ?>"><button class="button" id="deny_button">Refuser</button></a>
                </td>
            </tr>	
<?php
        }
    }
    else
    {?>
            <tr>
                <td>
                    <span class="nothing">No friend requests received</span>
                </td>
            </tr>
<?php   
    }
?>
            
        </tbody>

        <tfoot>
        </tfoot>
    </table>
    
    <table class="friend_request_table">
        <thead>
            <tr>
                <th>Friend requests sent list</th>
            </tr>	
        </thead>
        <tbody>
<?php 
    if($friend_requests_sent_exist)
    {
        foreach ($session_user->getUserFriendRequestsSent() as $friend_request)
        {?>
            <tr>
                <td>
                    <a href=""><img src="VGK_Image/Profile_Picture/<?php echo $friend_request->getRequest_target()->getUser_profile_picture_url(); ?>" height="30" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $friend_request->getRequest_target()->getUser_id(); ?>" class="table_link"><?php echo $friend_request->getRequest_target()->getUser_id(); ?></a>
                    <span class="since"><?php echo $friend_request->getRequest_date()?></span>
                </td>
                
                <td class="submit_request">
                    <a href="Delete_Friend_Request.php?user_id=<?php echo $friend_request->getRequest_target()->getUser_id(); ?>"><button class="button" id="cancel_button">Annuler</button></a>
                </td>
            </tr>	
<?php
        }
    }
    else
    {?>
            <tr>
                <td>
                    <span class="nothing">No friend requests sent</span>
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
    
    
			
			
		