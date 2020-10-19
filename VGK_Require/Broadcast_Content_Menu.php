<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Broadcast_Section.php">Videos</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="Broadcast_Section.php?page=livestreams">Livestreams</a></li>
    </ul>
</div>