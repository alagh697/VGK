<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Challenge_Detail.php?session_number=<?php echo $challenge->getChallenge_number(); ?>">Tentatives</a></li>
    </ul>
</div>