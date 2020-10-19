<?php
if($session_user->getUser_number()==$duel->getDuel_originator()->getUser_number())
{
    require('Duel_Update_Result_Form_Pop_Up.php');
}
require('News_Feed_Post_Form_Pop_Up.php');
?>
