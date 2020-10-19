<?php
require('VGK_Config/config_object.php');

define("SERVER","localhost");
define("LOGIN","root");
define("PASSWORD","");
define("BASE","video-game-kingdom");

$database=new Database(SERVER,LOGIN,PASSWORD,BASE);
?>
