<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Availability_Detail.php?availability_number=<?php echo $availability->getAvailability_number(); ?>">Sessions</a></li>
    </ul>
</div>