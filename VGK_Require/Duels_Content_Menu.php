<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Duels_Section.php">Provoqués</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="Duels_Section.php?page=targeted">Ciblés</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==2){ echo 'class="active"'; }?> href="Duels_Section.php?page=friends">Amis</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==3){ echo 'class="active"'; }?> href="Duels_Section.php?page=subscriptions">Abonnements</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==4){ echo 'class="active"'; }?> href="Duels_Section.php?page=all">Tous</a></li>
    </ul>
</div>