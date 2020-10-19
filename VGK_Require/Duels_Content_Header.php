<?php
$session_user_library_exist=$session_user->loadUserLibrary($database);
$session_user_friends_exist=$session_user->loadUserFriends($database);
?>
<div class="content_header">
	
    <span class="page_name">Duels</span>
    <a><button class="button" id="clickAddDuel">+ Duel</button></a>

</div>