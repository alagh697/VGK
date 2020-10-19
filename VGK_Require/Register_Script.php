<?php

if (isset($_POST) && !empty($_POST["id"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password_confirm"]) && !empty($_POST["country"]) && !empty($_POST["main_language"]) && !empty($_POST["birthday_day"]) && !empty($_POST["birthday_month"]) && !empty($_POST["birthday_year"]))
{
    $id=  htmlspecialchars($_POST["id"]);
    $email= htmlspecialchars($_POST["email"]);
    $password= sha1($_POST["password"]);
    $password_confirm= sha1($_POST["password_confirm"]);
    $birthday= $_POST["birthday_year"]."-".$_POST["birthday_month"]."-".$_POST["birthday_day"];
    $gender= 0;
    if(isset($_POST["gender"]))
    {
        $gender= 1;
    }
    
    $country=new Country();
    $country->setCountry_id($_POST["country"]);
    $country->loadCountry($database);
    $language=new Language();
    $language->setLanguage_code($_POST["main_language"]);
    $language->loadLanguage($database);
    
    //Verify if the id and the password are valid
    $valid_id=false;
    if(preg_match('/^[0-9A-Za-z_]{3,50}$/', $id)) 
    {
        $valid_id=true;
    }
    
    $valid_password=false;
    if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,50}$/', $_POST["password"])) 
    {
        $valid_password=true;
    }
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        if($valid_id)
        {
            if($valid_password)
            {
                if($password == $password_confirm)
                {
                    $theUser=new User();
                    $theUser->setForInsertUser($id, $email, $password, $gender, $birthday, $country, $language);
                    $user_exist=$theUser->testUserId($database);
                    if(!($user_exist))
                    {
                        $user_exist=$theUser->testUserEmail($database);
                        if(!($user_exist))
                        {
                            $register_ok=$theUser->insert($database);

                            if($register_ok)
                            {
                                //send mail
                                //require ('Register_Send_Mail_Welcome.php');
                                //Post to inform other users of register
                                require ('Register_Post_New_User.php');
                                //Welcome page
                                require ('Register_Welcome_Page.php');
                            }
                            else
                            {
                                $error="Problème lors de l'inscription.";
                                session_destroy();
                                require ('Register_Form.php');
                            }
                        }
                        else
                        {
                            $error="L'email saisi est déjà pris.";
                            session_destroy();
                            require ('Register_Form.php');
                        }
                    }
                    else
                    {
                        $error="L'identifiant saisi est déjà pris.";
                        session_destroy();
                        require ('Register_Form.php');
                    }
                    
                    $database->close();
                }
                else 
                {
                    $error="Les mots de passe ne correspondent pas!";
                    session_destroy();
                    require ('Register_Form.php');
                }
            }
            else 
            {
                $error="Le mot de passe n'est pas valide!";
                session_destroy();
                require ('Register_Form.php');
            }
        }
        else 
        {
            $error="L'identifiant n'est pas valide!";
            session_destroy();
            require ('Register_Form.php');
        }
        
    }
    else 
    {
        $error="L'adresse email n'est pas valide!!";
        session_destroy();
        require ('Register_Form.php');
    }


}
else
{
    $error="Mauvaise saisies!<br/>";
    session_destroy();
    require ('Register_Form.php');
}

