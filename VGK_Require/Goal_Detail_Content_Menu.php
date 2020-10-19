<div class="content_menu_nav">
		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Goal_Detail.php?goal_number=<?php echo $goal->getGoal_number(); ?>">Mises à jour</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="Goal_Detail.php?goal_number=<?php echo $goal->getGoal_number(); ?>&page=copies">copies</a></li>
    </ul>

</div>