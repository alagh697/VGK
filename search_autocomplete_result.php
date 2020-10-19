<?php
    require('VGK_Config/connect.php');
    
    if(isset($_GET['keyword']))
    {
        $keyword=$_GET['keyword'];
        $searchUsers_List=User::searchUsers($database, $keyword);
        $searchGames_List=Game::searchGames($database, $keyword);
        if(!empty($searchUsers_List))
        {
            foreach($searchUsers_List as $user)
            {
                echo '<a href="Profile.php?user_id='.$user->getUser_id().'">'.$user->getUser_id().'</a><br/>';
            }
        }
        else
        {
            echo 'No users <br/>';
        }
        
        if(!empty($searchGames_List))
        {
            foreach($searchGames_List as $game)
            {
                echo $game->getGame_name()."<br/>";
            }
        }
        else
        {
            echo 'No games <br/>';
        }
    }
?>
