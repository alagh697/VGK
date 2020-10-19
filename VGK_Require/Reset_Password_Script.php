<?php
if(isset($_POST) && !empty($_POST["email"]))
{
    $email= htmlspecialchars($_POST["email"]);
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $theUser=new User();
        $theUser->setUser_email($email);
        $user_exist=$theUser->testUserEmail($database);
        if($user_exist)
        {
            //We load the user id for the mail link
            $user_exist=$theUser->loadUserIdByEmail($database);
            //We generate a reset password code with mt_rand
            $reset_password_code='';
            for($i=0; $i < 9; $i++)
            {
                $reset_password_code.=mt_rand(0,9);
            }
            $theUser->setUser_reset_password_code($reset_password_code);
            $ok=$theUser->updateUserResetPasswordCode($database);
            if($ok)
            {
                //Send email with the link
                //require('Reset_Password_Code_Send_Mail.php');
                require('Reset_Password_Email_Confirm.php');
            }
            else
            {
                $error="Problème lors de l'envoi du mail.";
                session_destroy(); 
                require('Reset_Password_Email_Form.php');
            }
        }
        else
        {
            $error="L'email saisi ne correspond à aucun utilisateur.";
            session_destroy(); 
            require('Reset_Password_Email_Form.php');
        }
    }
    else 
    {
        $error="L'adresse email n'est pas valide!";
        session_destroy();
        require('Reset_Password_Email_Form.php');
    }
}
elseif(!isset($_POST["password"]) && !empty($_GET['user_id']) && !empty($_GET['reset_password_code']))
{
    $id=  htmlspecialchars($_GET['user_id']);
    $reset_password_code=htmlspecialchars($_GET['reset_password_code']);
    $theUser=new User();
    $theUser->setUser_id($id);
    $theUser->setUser_reset_password_code($reset_password_code);
    $user_exist=$theUser->matchUserIdresetPasswordCode($database);
    if($user_exist && $reset_password_code!='0')
    {
        require('Reset_Password_Update_Password_Form.php');
    }
    else 
    {
        $error="Le lien de réinitialisation de mot de passe n'est plus valide.";
        session_destroy();
        require('Reset_Password_Email_Form.php');
    }
}
elseif(isset($_POST) && !empty($_GET['user_id']) && !empty($_GET['reset_password_code']) && !empty($_POST["password"]) && !empty($_POST["password_confirm"]))
{
    $id=  htmlspecialchars($_GET['user_id']);
    $reset_password_code=htmlspecialchars($_GET['reset_password_code']);
    $password= sha1($_POST["password"]);
    $password_confirm= sha1($_POST["password_confirm"]);
    $valid_password=false;
    if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $_POST["password"])) 
    {
        $valid_password=true;
    }
    $theUser=new User();
    $theUser->setUser_id($id);
    if($valid_password)
    {
        if($password == $password_confirm)
        {
            $theUser->setUser_reset_password_code($reset_password_code);
            $user_exist=$theUser->matchUserIdresetPasswordCode($database);
            if($user_exist && $reset_password_code!='0')
            {
                $user_exist=$theUser->loadUserById($database);
                $theUser->setUser_password($password);
                $ok=$theUser->updateUserPassword($database);
                if($ok)
                {
                    $theUser->setUser_reset_password_code('0');
                    $ok=$theUser->updateUserResetPasswordCode($database);
                    require('Reset_Password_Update_Confirm.php');
                }
                else 
                {
                    $error="Problème lors de la réinitialisation de votre mot de passe.";
                    session_destroy(); 
                    require('Reset_Password_Update_Password_Form.php');
                }
            }
            else 
            {
                $error="Le lien de réinitialisation de mot de passe n'est plus valide.";
                session_destroy();
                require('Reset_Password_Email_Form.php');
            }
        }
        else
        {
            $error="Les mots de passe ne correspondent pas!";
            session_destroy(); 
            require('Reset_Password_Update_Password_Form.php');
        }
        
    }
    else 
    {
        $error="Le mot de passe saisie n'est pas valide.";
        session_destroy();
        require('Reset_Password_Update_Password_Form.php');
    }
}
else
{
    require('Reset_Password_Email_Form.php');
}
?>

