<?php 
$thePlatforms=  Platform::loadAllPlatforms($database);
$user_wishlist_exist=$theUser->loadUserWishlist($database);
?>
<div class="content_content">
<div class="library">
    
    
    <?php
    if(!empty($thePlatforms) AND $user_wishlist_exist)
    {
        foreach ($thePlatforms as $platform)
        {
            $theUserWishlistOnPlatform=$theUser->getUserWishlistOnOnePlatform($database, $platform);
            if(!empty($theUserWishlistOnPlatform))
            {?>
        <span class="list_title"><?php echo $platform->getPlatform_name(); ?></span>
        <ul class="game_list">
        <?php
            foreach ($theUserWishlistOnPlatform as $game) 
            {?>
                <li>
                    <table class="game_list_table">
                        <tr>
                            <td>
                                <a href="Game_Profile.php?game_name=<?php echo urlencode($game->getGame_name()); ?>">
                                <img class="game_list_image" src="VGK_Image/Game_Cover/<?php echo $game->getGame_cover_url(); ?>.jpg" />
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a class="game_name" href="Game_Profile.php?game_name=<?php echo urlencode($game->getGame_name()); ?>">
                                <p><?php echo $game->getGame_name(); ?></p>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <button class="dropbtn_options">Options</button>
                                    <div class="dropdown-content">
                                        <a href="#">Ajouter à votre bibliothèque</a>
                                        <a href="#">Retirer de votre liste d'envies</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </li>
            <?php
            }
            echo"<br/><br/>";
            }
        }
        ?>
        </ul>
    <?php
    }
    elseif($theUser->getUser_number()==$session_user->getUser_number())
    {
    ?>
        <span class="nothing_left">Votre liste d'envies est vide!</span>
    <?php
    }
    else
    {
    ?>
        <span class="nothing_left">La liste d'envies de <?php echo $theUser->getUser_id(); ?> est vide!</span>
    <?php
    }
    ?>  
    
</div>
</div>