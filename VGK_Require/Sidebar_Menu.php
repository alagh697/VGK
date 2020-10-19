<div class='sidebar'>
    <div class='top'>
        <a href="index.php"><img src="VGK_Image/VGK_Logo/vgk1.png"  class="vgk_name_img" align="center"></a>
        <span class="vgk_status">Alpha</span>
    </div>
    
    <div class="search">
        <form action="Search_Result.php" method="get">
            <input type="text" class="search_input" id="search_input" name="search_keyword" placeholder="Search.." autocomplete="off">
        </form>
        <!--<div class="autocomplete_result" id="autocomplete_result"></div>-->
    </div>

    <div class="menu_nav">

        <div class='title'>
            <div class="user_link">
                <a class="section_link" href="Profile.php?user_id=<?php echo $session_user->getUser_id(); ?>">
                    <img src="VGK_Image/Profile_Picture/<?php echo $session_user->getUser_profile_picture_url(); ?>"  class="sidebar_pp"/>
                    <span class='title_span'><?php echo $session_user->getUser_id(); ?></span>
                </a>
            </div>
                
            <div class="sidebar_profil_options">
                  <a id="clickShowChatRoomsSidebar"><span class="sidebar_button" id="sidebar_message_button"></span></a>
                  <a id="clickAddPostSidebar"><span class="sidebar_button" id="sidebar_post_button"></span></a>
                  <a href="Settings.php"><span class="sidebar_button" id="sidebar_settings_button"></span></a>
                  <a href="Logout.php"><span class="sidebar_button" id="sidebar_logout_button"></span></a>
            </div>

            <div class='friend_follow_sidebar'>
                <ul class='friend_follow_sidebar_nav'>
                    <li><a href="Friends_Page.php?user_id=<?php echo $session_user->getUser_id(); ?>">
                    <table>
                            <tr><td>amis</td></tr>
                            <tr><td><span class='friend_follow_stat'><?php echo $session_user->getUser_friend_count($database); ?></span></td></tr>
                    </table>
                    </a></li>
                    <li><a href="Friend_Requests_Page.php">
                    <table>
                            <tr><td>demande</td></tr>
                            <tr><td><span class='friend_follow_stat'><?php echo $session_user->getUser_friend_request_count($database); ?></span></td></tr>
                    </table>
                    </a></li>
                </ul>
                <ul class='friend_follow_sidebar_nav'>
                    <li><a href="Follows_Page.php?user_id=<?php echo $session_user->getUser_id(); ?>">
                    <table>
                            <tr><td>abonnements</td></tr>
                            <tr><td><span class='friend_follow_stat'><?php echo $session_user->getUser_following_count($database); ?></span></td></tr>
                    </table>
                    </a></li>
                    <li><a href="Followers_Page.php?user_id=<?php echo $session_user->getUser_id(); ?>">
                    <table>
                            <tr><td>abonnés</td></tr>
                            <tr><td><span class='friend_follow_stat'><?php echo $session_user->getUser_follower_count($database); ?></span></td></tr>
                    </table>
                    </a></li>
                </ul>
          </div>

        </div>
        
        <div class='title'>
            <a class="section_link" id="news_section" href="index.php">
                <span class='title_span'>Actualités</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="messenger_section" href="Messenger_Section.php">
                <span class='title_span'>Messagerie</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="notif_section" href="Notifications_Section.php">
                <span class='title_span'>Notifications</span>
                
                <?php 
                    $notif_count=$session_user->getUser_Notifications_Count($database);
                    if(intval($notif_count)>0)
                    {?>
                        <span class="sidebar_count"><?php echo $notif_count; ?></span>
                    <?php   
                    }
                ?>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="event_section" href="Events_Section.php">
                <span class='title_span'>Agenda</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="team_section" href="Teams_Section.php">
                <span class='title_span'>Teams</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="community_section" href="Communities_Section.php">
                <span class='title_span'>Communautés</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="game_section" href="Games_Section.php">
                <span class='title_span'>Jeux</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="goal_section" href="Goals_Section.php">
                <span class='title_span'>Objectifs</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="availability_section" href="Availabilities_Section.php">
                <span class='title_span'>Disponibilités</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="session_section" href="Sessions_Section.php">
                <span class='title_span'>Sessions</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="challenge_section" href="Challenges_Section.php">
                <span class='title_span'>Défis</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="duel_section" href="Duels_Section.php">
                    <span class='title_span'>Duels</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="compet_section" href="Competitions_Section.php">
                <span class='title_span'>Compétitions</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="broadcast_section" href="Broadcast_Section.php">
                <span class='title_span'>Broadcast</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="forums_section" href="Forums_Section.php">
                <span class='title_span'>Forums</span>
            </a>
        </div>
        <div class='title'>
            <a class="section_link" id="giveaway_section" href="Giveaways_Section.php">
                <span class='title_span'>Concours</span>
            </a>
        </div>
        
    </div>

    <div class="bottom">
        <div class='title'>
          <span class='title_span'>PLUS D'INFOS</span>
        </div>
        <ul class='bottom_nav'>
          <li>
              <a href="VGK_Infos.php" target='_blank'>Contact</a>
          </li>
          <li>
            <a href="VGK_Infos.php?page=terms" target='_blank'>Conditions</a>
          </li>
          <li>
            <a href="VGK_Infos.php?page=press" target='_blank'>Presse</a>
          </li>
          <li>
            <a href="VGK_Infos.php?page=advertising" target='_blank'>Publicité</a>
          </li>
          <li>
            <a href="VGK_Infos.php?page=partnership" target='_blank'>Partenaire</a>
          </li>
        </ul>
        <span class="copyright">Gharbi Alaaeddine &copy; 2016</span>

    </div>

</div>
