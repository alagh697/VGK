<?php
if(!isset($theUser))
{
    $theUser=$session_user;
}
$user_subscriptions_posts_exist=$theUser->loadUserSubscriptionsPosts($database);
?>
<div class="content_content">
    <div class="news_feed">
        
    <?php 
    if($user_subscriptions_posts_exist)
    {?>
        <ul class="news_feed_list"> 
    <?php
        foreach ($theUser->getUserSubscriptionsPosts() as $post)
        {
            require('News_Feed_Post_Normal.php');
        }?>
        </ul>
    <?php
    }
    else 
    {
    ?>
    <br/><span class="nothing_left">Il n'y a aucuns posts</span>
    <?php
    }
    ?>       
    </div>
</div>

