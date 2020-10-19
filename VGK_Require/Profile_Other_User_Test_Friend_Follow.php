<?php
$friendship=new Friendship();
$friendship->setFriendship_friend1($theUser);
$friendship->setFriendship_friend2($session_user);
$friendship_exist=$friendship->loadFriendship($database);
if($friendship_exist)
{//show friendship and follow info
?>
    <div class="dropdown">
        <button class="dropbtn_friend">Amis</button>
        <div class="dropdown-content">
            <a id="clickAddSessionInvite">Inviter à une session</a>
            <a id="clickAddDuel">Provoquer en duel</a>
            <a id="clickAddChallengeInvite">Lancer un défi</a>
            <a href="Delete_Friendship.php?user_id=<?php echo $theUser->getUser_id(); ?>">Supprimer de mes amis</a>
        </div>
    </div>
<?php
}
else
{
    //Test if the session user sent a friend request to the other user
    $friend_request_sent=new Friend_request();
    $friend_request_sent->setRequest_sender($session_user);
    $friend_request_sent->setRequest_target($theUser);
    $friend_request_exist=$friend_request_sent->loadFriend_request($database);
    if($friend_request_exist)
    {//friend request link
    ?>
        <a href="Friend_Requests_Page.php"><button class="button" id="request_sent_button"></button></a>
    <?php
    }
    else
    {
        //Test if the session user received a friend request by the other user
        $friend_request_received=new Friend_request();
        $friend_request_received->setRequest_sender($theUser);
        $friend_request_received->setRequest_target($session_user);
        $friend_request_exist=$friend_request_received->loadFriend_request($database);
        if($friend_request_exist)
        {//friend_request link
        ?>
        <a href="Friend_Requests_Page.php"><button class="button" id="request_received_button"></button></a>
        <?php
        }
        else
        {//Show send friend request button
        ?>  
            <a><button class="button" id="clickSendFriendRequest" >+ Amis</button></a>
        <?php
        }
    }
    //Test if the session user follow the other user
    $follow=new Follow();
    $follow->setFollow_following($session_user);
    $follow->setFollow_followed($theUser);
    $follow_exist=$follow->loadFollow($database);
    if($follow_exist)
    {//Unfollow button
    ?>  
            <a href="Delete_Follow.php?user_id=<?php echo $theUser->getUser_id(); ?>"><button class="button" id="unfollow_button"></button></a>
            
            <div class="dropdown">
                <button class="dropbtn_icon"></button>
                <div class="dropdown-content">
                    <a id="clickAddSessionInvite">Inviter à une session</a>
                    <a id="clickAddDuel">Provoquer en duel</a>
                    <a id="clickAddChallengeInvite">Lancer un défi</a>
                </div>
            </div>
    <?php
    }
    else 
    {//follow button
    ?>  
        <a href="Add_Follow.php?user_id=<?php echo $theUser->getUser_id(); ?>"><button class="button" id="follow_button">Suivre</button></a>
        
        <div class="dropdown">
            <button class="dropbtn_icon"></button>
            <div class="dropdown-content">
                <a id="clickAddSessionInvite">Inviter à une session</a>
                <a id="clickAddDuel">Provoquer en duel</a>
                <a id="clickAddChallengeInvite">Lancer un défi</a>
            </div>
        </div>
    <?php
    }
    
    //Test if the session user is followed by the other user
    $follow->setFollow_following($theUser);
    $follow->setFollow_followed($session_user);
    $follow_exist=$follow->loadFollow($database);
    if($follow_exist)
    {//Show follow info
    ?>  
        <span>Vous suit</span>
    <?php 
    }
}


 

