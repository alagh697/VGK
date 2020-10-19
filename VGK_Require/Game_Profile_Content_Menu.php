<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Game_Profile.php?game_name=<?php echo urlencode($theGame->getGame_name()); ?>">mur</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="Game_Profile.php?game_name=<?php echo urlencode($theGame->getGame_name()); ?>&page=goals">objectifs</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==2){ echo 'class="active"'; }?> href="Game_Profile.php?game_name=<?php echo urlencode($theGame->getGame_name()); ?>&page=availabilities">Disponibilités</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==3){ echo 'class="active"'; }?> href="Game_Profile.php?game_name=<?php echo urlencode($theGame->getGame_name()); ?>&page=sessions">Sessions</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==4){ echo 'class="active"'; }?> href="Game_Profile.php?game_name=<?php echo urlencode($theGame->getGame_name()); ?>&page=challenges">Défis</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==5){ echo 'class="active"'; }?> href="Game_Profile.php?game_name=<?php echo urlencode($theGame->getGame_name()); ?>&page=duels">Duels</a></li>        
    </ul>
</div>