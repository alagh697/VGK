<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Profile.php?user_id=<?php echo $theUser->getUser_id(); ?>">mur</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="Profile.php?user_id=<?php echo $theUser->getUser_id(); ?>&page=library">biblioteque</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==2){ echo 'class="active"'; }?> href="Profile.php?user_id=<?php echo $theUser->getUser_id(); ?>&page=wishlist">liste d'envies</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==3){ echo 'class="active"'; }?> href="Profile.php?user_id=<?php echo $theUser->getUser_id(); ?>&page=goals">objectifs</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==4){ echo 'class="active"'; }?> href="Profile.php?user_id=<?php echo $theUser->getUser_id(); ?>&page=availabilities">Disponibilités</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==5){ echo 'class="active"'; }?> href="Profile.php?user_id=<?php echo $theUser->getUser_id(); ?>&page=sessions">Sessions</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==6){ echo 'class="active"'; }?> href="Profile.php?user_id=<?php echo $theUser->getUser_id(); ?>&page=challenges">Défis</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==7){ echo 'class="active"'; }?> href="Profile.php?user_id=<?php echo $theUser->getUser_id(); ?>&page=duels">Duels</a></li>        
    </ul>
</div>