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
                <img src="http://www.video-game-kingdom.com/VGK_Image/VGK_Logo/vgk1.png" width="80%" height="auto" />
            </a>
        </div>
        <div id="Title"  
             style="color: white; 
             background-color: black; 
             padding: 5px 5px 5px 5px;
             font-family: Arial, Helvetica, sans-serif;">
            <h2>Réinitialisation du mot de passe</h2>
        </div>
        <div id="Message" 
             style="color: white; 
             background-color: #333; 
             padding: 5px 5px 5px 5px;
             font-family: Arial, Helvetica, sans-serif;">
            <p>
                Nous avons reçu une demande de réinitialisation de mot de passe pour le compte de  '.$theUser->getUser_id().'.
            Veuillez confirmer la réinitialisation pour choisir un nouveau mot de passe en cliquant 
            <a href="http://www.video-game-kingdom.com/Reset_Password.php?user_id='.$theUser->getUser_id().'&reset_password_code='.$theUser->getUser_reset_password_code().'"> ici</a>.<br/>
            Si vous ne souhaitez pas réinitialiser votre mot de passe ignorer cet email.
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

