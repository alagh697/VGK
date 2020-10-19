<?php
$theGame->loadAllPlatformsOfGame($database); 
$session_user_library_exist=$session_user->loadUserLibrary($database);
$session_user_friends_exist=$session_user->loadUserFriends($database);
//testif the session user has at least one version of the game
$session_user_own_game=false;
foreach($theGame->getGamePlatforms() as $platform)
{
    //test if the session user already own this version
    $user_own_game=new User_own_game_platform();
    $user_own_game->setAll($session_user, $theGame, $platform);
    $owned_game_exist=$user_own_game->loadOwnedGame($database);
    //if the session user doesn't already own the game we show the option
    if($owned_game_exist)
    {
        $session_user_own_game=true;
    }
}
?>
<div class="content_header">
		
    <a class="current_section_link" href="Game_Profile.php?game_name=<?php echo urlencode($theGame->getGame_name()); ?>">
        <img class="game_profile_image" src="VGK_Image/Game_Cover/<?php echo $theGame->getGame_cover_url(); ?>.jpg"/>
        <span class="page_name"><?php echo $theGame->getGame_name(); ?></span>
    </a>

    <?php
        if($session_user_own_game)
        {
        ?>   
        <div class="dropdown">
            <button class="dropbtn_icon"></button>
            <div class="dropdown-content">
                <a id="clickAddGameLibrary">Ajouter une version à votre Bibliothèque</a>
                <a id="clickAddGameWishlist">Ajouter une version à votre Whish list</a>
                <a id="clickAddSession">Ouvrir une session</a>
                <a id="clickAddAvailability">Ajouter une disponibilité</a>
                <a id="clickAddDuel">Provoquer un duel</a>
                <a id="clickAddChallenge">Lancer un défi</a>
                <a id="clickAddGoal">Ajouter un objectif</a>
            </div>
        </div>
        <?php
        }
        else
        {
        ?>
        <a><button class="button" id="clickAddGameLibrary">+ Bibliothèque</button></a>
        <a><button class="button" id="clickAddGameWishlist">+ Whish list</button></a>
        <?php
        }
    ?>
    
    <div class="game_info">
        <ul class="platform_game_list">
            <?php
            foreach($theGame->getGamePlatforms() as $platform)
            {
                //test if the session user already own this version
                $user_own_game=new User_own_game_platform();
                $user_own_game->setAll($session_user, $theGame, $platform);
                $owned_game_exist=$user_own_game->loadOwnedGame($database);
                //if the session user doesn't already own the game we show the option
                if($owned_game_exist)
                {
                    //Test if this version is the session_user main game
                    $session_user_main_game_exist=$session_user->loadUserMainGamePlatform($database);
                    if($session_user_main_game_exist AND $session_user->getUser_main_game()->getGame_number()==$theGame->getGame_number() AND $session_user->getUser_main_platform()->getPlatform_code()==$platform->getPlatform_code())
                    {?>
                        <li class="main_game_version"> 
                <?php
                    }
                    else
                    {?>
                        <li class="owned_version"> 
                <?php
                    }
                }
                else 
                {
                    //test if the session user already has this version on his whishlist
                    $user_wishlist=new User_wishlist();
                    $user_wishlist->setForInsertUser_wishlist($session_user, $theGame, $platform);
                    $wishlist_game_exist=$user_wishlist->loadWishlistGame($database);
                    //if the session user doesn't already have the game we show the option
                    if($wishlist_game_exist)
                    {?>
                    <li class="wishlist_version"> 
                    <?php
                    }
                    else 
                    {?>
                    <li> 
                    <?php
                    }
                }
                ?>
                    <span class="<?php echo $platform->getPlatform_code(); ?>_span"><?php echo $platform->getPlatform_code(); ?></span> </li>
            <?php
            }
            ?>
        </ul>
    </div>
				
</div>