<?php
    $session_joiners_exist=$session->loadSessionJoiners($database);
?>
<div class="content_content">	
    <table class="activity_table">
        <thead>
            <tr>
                <th colspan="2">Les joueurs participants à la session <?php echo $session->getSession_title(); ?></th>
            </tr>
            <tr>
                <th>Joueur</th>
                <th>Date</th>
            </tr>
            
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $session->getSession_host()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $session->getSession_host()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $session->getSession_host()->getUser_id(); ?>" class="table_link"><?php echo $session->getSession_host()->getUser_id(); ?></a>
                </td>
                <td>
                    <?php echo date_format(date_create($session->getSession_creation_date()), 'd/m/Y');?>
                </td>
                
            </tr>	
            <?php  
           
            if($session_user->getUser_number()!=$session->getSession_host()->getUser_number() AND $session_joined_exist)
            {   
            ?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $session_joined->getJoin_user()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $session_joined->getJoin_user()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $session_joined->getJoin_user()->getUser_id(); ?>" class="table_link"><?php echo $session_joined->getJoin_user()->getUser_id(); ?></a>
                </td>
                <td>
                    <?php echo date_format(date_create($session_joined->getJoin_date()), 'd/m/Y');?>
                </td>
                
            </tr>	
            <?php
            }   
            ?>
        </thead>
        <tbody>
<?php 
    if($session_joiners_exist)
    {
        foreach ($session->getSessionJoiners() as $session_joiner)
        {
            if($session_user->getUser_number()!=$session_joiner->getJoin_user()->getUser_number())    
            {?>
            <tr>
                <td>
                    <a href="Profile.php?user_id=<?php echo $session_joiner->getJoin_user()->getUser_id(); ?>"><img src="VGK_Image/Profile_Picture/<?php echo $session_joiner->getJoin_user()->getUser_profile_picture_url(); ?>" height="auto" width="30" align="center"></a>
                    <a href="Profile.php?user_id=<?php echo $session_joiner->getJoin_user()->getUser_id(); ?>" class="table_link"><?php echo $session_joiner->getJoin_user()->getUser_id(); ?></a>
                </td>
                <td>
                    <?php echo date_format(date_create($session_joiner->getJoin_date()), 'd/m/Y');?>
                </td>
                
                <?php
                if($session_user->getUser_number()==$session->getSession_host()->getUser_number() AND !($finished))
                {?>
                <td class="table_button">
                    <a href="Delete_Session_Joiner.php?session_number=<?php echo $session_joiner->getJoin_session()->getSession_number(); ?>&user_id=<?php echo $session_joiner->getJoin_user()->getUser_id(); ?>">
                        <button class="button">Exclure</button>
                    </a>
                </td>
                <?php
                }
                ?>
                
            </tr>	
<?php
            }
        }
    }
    else
    {?>
            <tr>
                <td colspan="2">
                    <span class="nothing">Aucun joueur n'a rejoint la session.</span>
                </td>
            </tr>
<?php   
    }
?>
            
        </tbody>

        <tfoot>
        </tfoot>
    </table>
</div>