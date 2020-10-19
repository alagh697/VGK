<?php

if(isset($_POST))
{
    $description="";
    if(!empty($_POST['user_description']))
    {
        $description= addslashes(htmlspecialchars($_POST['user_description']));
    }
    
    if($description!=$session_user->getUser_description())
    {
        $session_user->setUser_description($description);
        $ok=$session_user->updateUserInfo($database);
        if(!ok)
        {
            $error.="Impossible de modifier votre bio.";
        }
    }
    
}
