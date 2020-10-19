<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Forums_Section.php">Discussions</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="Forums_Section.php?page=poll">Sondage</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==2){ echo 'class="active"'; }?> href="Forums_Section.php?page=q_a">F.A.Q</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==3){ echo 'class="active"'; }?> href="Forums_Section.php?page=guide">Guides</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==4){ echo 'class="active"'; }?> href="Forums_Section.php?page=case_file">Dossiers</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==5){ echo 'class="active"'; }?> href="Forums_Section.php?page=petition">Pétitions</a></li>
    </ul>
</div>