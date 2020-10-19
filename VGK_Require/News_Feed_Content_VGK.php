<?php
$VGK=new User();
$VGK->setUser_number('1');
$vgk_posts_exist=$VGK->loadUserPosts($database);
?>
<div class="content_content">
    <div class="news_feed">
        
    <?php 
    if($vgk_posts_exist)
    {?>
        <ul class="news_feed_list"> 
    <?php
        foreach ($VGK->getUserPosts() as $post)
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
