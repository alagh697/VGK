<?php
session_start();
 
setcookie('user_id','',  time()-3600);
setcookie('user_password','',  time()-3600);

$_SESSION=array();
session_destroy();
header("Location:index.php");

?>


