<div class="content_menu_nav">
		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Session_Detail.php?session_number=<?php echo $session->getSession_number(); ?>">Joueurs</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="Session_Detail.php?session_number=<?php echo $session->getSession_number(); ?>&page=waiting_list">Liste d'attente</a></li>
    </ul>

</div>