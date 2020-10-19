<div class="content_menu_nav">		
    <ul>
        <li><a <?php if(isset($page_number) AND $page_number==0){ echo 'class="active"'; }?> href="Settings.php">Profil</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==1){ echo 'class="active"'; }?> href="Settings.php?page=confidentiality">Confidentialité</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==2){ echo 'class="active"'; }?> href="Settings.php?page=notifications">Notifications</a></li>
        <li><a <?php if(isset($page_number) AND $page_number==3){ echo 'class="active"'; }?> href="Settings.php?page=password">Mot de passe</a></li>
    </ul>
</div>