<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Duel_Detail.php?session_number=<?php echo $duel->getDuel_number(); ?>">Témoins</a></li>
    </ul>
</div>