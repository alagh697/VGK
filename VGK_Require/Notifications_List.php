<?php
    $notifications_exist=$session_user->loadUserNotifications($database);
?>
<div class="content_content">
    
    <div class="notif_list">
        <table class="notif_list_table">
            <thead>
                <tr>
                    <th>Notifications list</th>
                </tr>	
            </thead>
            <tbody>
<?php 
    if($notifications_exist)
    {
        foreach ($session_user->getUserNotifications() as $notif)
        {?>
            <tr>
                <td>
                    <span class="notif_message"><?php echo $notif->getNotification_message(); ?></span><br/>
                    <span class="since"><?php echo $notif->getNotification_date(); ?></span>
                </td>
            </tr>	
<?php
            //update the read attribute if not done
            if(intval($notif->getNotification_read())==0)
            {
                $ok=$notif->updateRead($database);
            }
        }
    }
    else
    {?>
            <tr>
                <td>
                    <span class="nothing">No notifications</span>
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
    
</div>