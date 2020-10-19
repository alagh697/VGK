<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="index.php">abonnements</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="index.php?page=teams">teams</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==2){ echo 'class="active"'; }?> href="index.php?page=communities">communautés</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==3){ echo 'class="active"'; }?> href="index.php?page=press">presse</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==4){ echo 'class="active"'; }?> href="index.php?page=vip">vip</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==5){ echo 'class="active"'; }?> href="index.php?page=esport">esport</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==6){ echo 'class="active"'; }?> href="index.php?page=deals">deals</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==7){ echo 'class="active"'; }?> href="index.php?page=vgk">vgk</a></li>
    </ul>
</div>