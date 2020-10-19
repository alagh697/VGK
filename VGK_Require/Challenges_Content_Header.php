<?php
$session_user_games_exist=$session_user->loadUserGames($database);
$session_user_library_exist=$session_user->loadUserLibrary($database);
?>
<div class="content_header">
	
    <span class="page_name">Défis</span>
    <a><button class="button" id="clickAddChallenge">+ Défis</button></a>

</div>