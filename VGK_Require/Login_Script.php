<?php

if (isset($_POST) && !empty($_POST["id"]) && !empty($_POST["password"]))
{
    $id=  htmlspecialchars($_POST["id"]);
    $password= sha1($_POST["password"]);
    $session_user=new User();
    $auth_ok=$session_user->UserAuthentification($database, $id, $password);

    if($auth_ok)
    {
        $_SESSION["user_number"]=$session_user->getUser_number();
        $_SESSION["user_id"]=$id;
        
        if(isset($_POST["remember_me"]))
        {
            setcookie('user_id',$id, time()+365*24*3600, null, null, false,true);
            setcookie('user_password',$password, time()+365*24*3600, null, null, false,true);
        }
        
        header("Location:index.php"); 

    }
    else
    {
        $error="Vous n'etes pas reconnu en temps qu'utilisateur !";
        session_destroy();
        require ('Login_Form.php');
    }
    $database->close();

}
else
{
    $error="Erreur de saisie!<br/>";
    session_destroy();
    require ('Login_Form.php');
}

?>

