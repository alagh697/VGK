<?php
$mail_header="MIME-Version: 1.0\r\n";
$mail_header.='From:"Video Game Kingdom"<noreply@video-game-kingdom.com>'."\n";
$mail_header.='Content-Type:text/html; charset="uft-8"'."\n";
$mail_header.='Content-Transfer-Encoding: 8bit';

$mail_message='
<html>
    <body>
        <div id="Top" align="center" style="background-color: maroon; padding: 3px 3px 3px 3px;">
            <a href="http://www.video-game-kingdom.com" target="_blank">
                <img src="http://www.video-game-kingdom.com/VGK_Image/VGK_Logo/vgk1.png"/>
            </a>
        </div>
        <div id="Title"  
             style="color: white; 
             background-color: black; 
             padding: 5px 5px 5px 5px;
             font-family: Arial, Helvetica, sans-serif;">
            <h1>Bienvenue dans Video Game Kingdom '.$theUser->getUser_id().'</h1>
        </div>
        <div id="Message" 
             style="color: white; 
             background-color: #333; 
             padding: 5px 5px 5px 5px;
             font-family: Arial, Helvetica, sans-serif;">
            <p>
                Nous vous confirmons la création de votre compte sur VGK et nous vous en remercions.<br/>
                Vous pouvez maintenant profiter des services proposés par <a href="http://www.video-game-kingdom.com" target="_blank" style="color: gold;">VGK</a>.
            </p>
        </div>
        <div id="Bottom" 
             style="color: white; 
             background-color: black; 
             padding: 5px 5px 5px 5px;
             font-family: Arial, Helvetica, sans-serif;
             font-size: 10px;
             font-style: italic;">
            
            <p>
                Cet email est envoyé automatiquement. Nous ne pourrons pas répondre aux messages envoyés à cette adresse.
            </p>
        </div>
    </body>
</html>
';

mail($theUser->getUser_email(), "Bienvenue sur VGK !", $mail_message, $mail_header);

?>

