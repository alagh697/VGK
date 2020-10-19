<?php

if(isset($_FILES['user_new_pp']) AND !empty($_FILES['user_new_pp']['name']))
{
    $pp=$_FILES['user_new_pp']['name'];
    $maxsize=2097152;
    $extensions=  array('jpg', 'jpeg', 'gif', 'png');
    if($_FILES['user_new_pp']['size']<=$maxsize)
    {
        $fileextension=strtolower(substr(strrchr($pp, '.'), 1));
        if(in_array($fileextension, $extensions))
        {
            //Delete former pp to avoid doubles
            if($session_user->getUser_profile_picture_url()!="0.png")
            {
                $pathPP="VGK_Image/Profile_Picture/".$session_user->getUser_profile_picture_url();
                unlink($pathPP);
            }
            $path="VGK_Image/Profile_Picture/".$session_user->getUser_number().".".$fileextension;
            $result=  move_uploaded_file($_FILES['user_new_pp']['tmp_name'], $path);
            if($result)
            {
                $profile_picture_url=$session_user->getUser_number().".".$fileextension;
                $session_user->setUser_profile_picture_url($profile_picture_url);
                $ok=$session_user->updateUserPP($database);
                if(!$ok)
                {
                    $error="Impossible de sauvegarder la nouvelle photo de profil.";
                }
            }
            else
            {
                $error="Impossible de sauvegarder la nouvelle photo de profil.";
            }
        }
        else
        {
            $error="bad extension";
        }
    }
    else
    {
        $error="too big";
    }

}
