<?php
if($session_user->getUser_number()==$goal->getGoal_user()->getUser_number())
{
    require('Goal_Update_Achievement_Form_Pop_Up.php');
}
require('News_Feed_Post_Form_Pop_Up.php');
?>
