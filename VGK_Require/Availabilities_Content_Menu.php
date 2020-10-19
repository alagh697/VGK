<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Availabilities_Section.php">Vos Disponibilités</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="Availabilities_Section.php?page=friends">Amis</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==2){ echo 'class="active"'; }?> href="Availabilities_Section.php?page=subscriptions">Abonnements</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==3){ echo 'class="active"'; }?> href="Availabilities_Section.php?page=all">Tous</a></li>
    </ul>
</div>