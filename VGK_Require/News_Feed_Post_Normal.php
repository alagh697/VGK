<li>
    <table class="tab_post">
        <tr>
            <td class="post_left_column" rowspan="2">
                <a href="Profile.php?user_id=<?php echo $post->getPost_user()->getUser_id();?>">
                    <img class="post_user_pp" src="VGK_Image/Profile_Picture/<?php echo $post->getPost_user()->getUser_profile_picture_url();?>">
                </a>
            </td>
            <td>
                <a href="Profile.php?user_id=<?php echo $post->getPost_user()->getUser_id();?>" class="post_user">
                    <?php echo $post->getPost_user()->getUser_id();?>
                </a>
                <br/>
                <span class="since">
                    <?php echo $post->getPost_date(); ?>
                </span>
            </td>
        </tr>
        <tr>
            <td class="post_message">
                <p>
                    <?php echo nl2br($post->getPost_message()); ?>
                </p>
            </td>
        </tr>
        <tr>
            <td class="post_left_column">
                <?php
                if($post->getPost_game()->getGame_number()!='0')
                {?>
                <a href="Game_Profile.php?game_name=<?php echo urlencode($post->getPost_game()->getGame_name());?>">
                    <img class="post_game_cover" src="VGK_Image/Game_Cover/<?php echo $post->getPost_game()->getGame_cover_url();?>.jpg">
                </a>
                <?php
                }
                
                if($post->getPost_platform()->getPlatform_code()!="")
                {?>
                <br/>
                <span class="<?php echo $post->getPost_platform()->getPlatform_code(); ?>_span">
                    <?php echo $post->getPost_platform()->getPlatform_code(); ?>
                </span>
                <?php
                }
                ?>
            </td>
            <td >
                <?php
                if($post->getPost_event_url()!="")
                {?>
                <a href="<?php echo $post->getPost_event_url(); ?>" class="post_event_link">Lien</a>
                <?php
                }
                ?>
            </td>
        </tr>
    </table>
</li>
