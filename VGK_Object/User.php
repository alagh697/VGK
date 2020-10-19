<?php

class User
    {
        private $user_number;
        private $user_id;
        private $user_email;
        private $user_password;
        private $user_gender;
        private $user_birthday;
        private $user_country;
        private $user_main_language;
        private $user_description;
        private $user_profile_picture_url;
        private $user_account_creation_date;
        private $user_main_game;
        private $user_main_platform;
        private $user_team;
        private $user_join_team_date;
        private $user_psn;
        private $user_xboxlive;
        private $user_nintendo_id;
        private $user_steam;
        private $user_battlenet;
        private $user_origin;
        private $user_uplay;
        private $user_youtube_channel;
        private $user_twitch_channel;
        private $user_website;
        
        private $user_reset_password_code;
        
        private $theUserPlatforms=array();
        private $theUserGames=array();
        private $theUserLibrary=array();
        private $theUserWishlist=array();
        private $theUserLanguages=array();
        private $theUserFollows=array();
        private $theUserFollowers=array();
        private $theUserFriends=array();
        private $theUserCommunitiesFounded=array();
        private $theUserCommunitiesJoined=array();
        private $theUserPosts=array();
        private $theUserEvents=array();
        private $theUserNotifications=array();
        private $theUserAvailabilities=array();
        private $theUserGoals=array();
        private $theUserSessionsHosted=array();
        private $theUserSessionsJoined=array();
        private $theUserChallengesMade=array();
        private $theUserChallengesTaken=array();
        private $theUserDuelsOriginated=array();
        private $theUserDuelsTargeted=array();
        private $theUserTeamInvitaions=array();
        private $theUserTeamApplications=array();
        private $theUserCommunityInvitaions=array();
        private $theUserChallengeInvitaions=array();
        private $theUserSessionInvitaions=array();
        private $theUserFriendRequestsSent=array();
        private $theUserFriendRequestsReceived=array();
        
        private $theUserFriendsAvailabilities=array();
        private $theUserFriendsChallengesMade=array();
        private $theUserFriendsDuelsOriginated=array();
        private $theUserFriendsGoals=array();
        private $theUserFriendsSessionsHosted=array();
        
        private $theUserFollowsAvailabilities=array();
        private $theUserFollowsChallengesMade=array();
        private $theUserFollowsDuelsOriginated=array();
        private $theUserFollowsGoals=array();
        private $theUserFollowsSessionsHosted=array();
        
        private $theUserLibraryAvailabilities=array();
        private $theUserLibraryChallengesMade=array();
        private $theUserLibraryDuelsOriginated=array();
        private $theUserLibraryGoals=array();
        private $theUserLibrarySessionsHosted=array();
        
        private $theUserFollowsPosts=array();
        private $theUserSubscriptionsPosts=array();//His posts, his follows posts and vgk's posts
        

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $id, $email, $password, $gender, $birthday, $country, $main_language, $description, $profile_picture_url, $account_creation_date, $main_game, $main_platform, $team, $join_team_date, $psn, $xboxlive, $steam, $youtube_channel, $twitch_channel, $website)
        {
            $this->user_number=$number;
            $this->user_id=$id;
            $this->user_email=$email;
            $this->user_password=$password;
            $this->user_gender=$gender;
            $this->user_birthday=$birthday;
            $this->user_country=$country;
            $this->user_main_language=$main_language;
            $this->user_description=$description;
            $this->user_profile_picture_url=$profile_picture_url;
            $this->user_account_creation_date=$account_creation_date;
            $this->user_main_game=$main_game;
            $this->user_main_platform=$main_platform;
            $this->user_team=$team;
            $this->user_join_team_date=$join_team_date;
            $this->user_psn=$psn;
            $this->user_xboxlive=$xboxlive;
            $this->user_steam=$steam;
            $this->user_youtube_channel=$youtube_channel;
            $this->user_twitch_channel=$twitch_channel;
            $this->user_website=$website;

        }

        public function setForInsertUser($id, $email, $password, $gender, $birthday, $country, $language)
        {
            $this->user_id=$id;
            $this->user_email=$email;
            $this->user_password=$password;
            $this->user_gender=$gender;
            $this->user_birthday=$birthday;
            $this->user_country=$country;
            $this->user_main_language=$language;
        }


        //Getter Setter
        //User_number
        public function setUser_number($number)
        {
            $this->user_number=$number;
        }

        public function getUser_number()
        {
            return $this->user_number;
        }

        //User_id
        public function setUser_id($id)
        {
            $this->user_id=$id;
        }

        public function getUser_id()
        {
            return $this->user_id;
        }

        //User_email
        public function setUser_email($email)
        {
            $this->user_email=$email;
        }

        public function getUser_email()
        {
            return $this->user_email;
        }

        //User_password
        public function setUser_password($password)
        {
            $this->user_password=$password;
        }

        public function getUser_password()
        {
            return $this->user_password;
        }

        //User_gender
        public function setUser_gender($gender)
        {
            $this->user_gender=$gender;
        }

        public function getUser_gender()
        {
            return $this->user_gender;
        }

        //User_birthday
        public function setUser_birthday($birthday)
        {
            $this->user_birthday=$birthday;
        }

        public function getUser_birthday()
        {
            return $this->user_birthday;
        }

        //User_country
        public function setUser_country($country)
        {
            $this->user_country=$country;
        }

        public function getUser_country()
        {
            return $this->user_country;
        }

        //User_main_language
        public function setUser_main_language($main_language)
        {
            $this->user_main_language=$main_language;
        }

        public function getUser_main_language()
        {
            return $this->user_main_language;
        }

        //User_description
        public function setUser_description($description)
        {
            $this->user_description=$description;
        }

        public function getUser_description()
        {
            return $this->user_description;
        }

        //User_profile_picture_url
        public function setUser_profile_picture_url($profile_picture_url)
        {
            $this->user_profile_picture_url=$profile_picture_url;
        }

        public function getUser_profile_picture_url()
        {
            return $this->user_profile_picture_url;
        }
        
        //User_account_creation_date
        public function setUser_account_creation_date($account_creation_date)
        {
            $this->user_account_creation_date=$account_creation_date;
        }

        public function getUser_account_creation_date()
        {
            return $this->user_account_creation_date;
        }

        //User_main_game
        public function setUser_main_game($main_game)
        {
            $this->user_main_game=$main_game;
        }

        public function getUser_main_game()
        {
            return $this->user_main_game;
        }

        //User_main_platform
        public function setUser_main_platform($platform)
        {
            $this->user_main_platform=$platform;
        }

        public function getUser_main_platform()
        {
            return $this->user_main_platform;
        }

        //User_team
        public function setUser_team($team)
        {
            $this->user_team=$team;
        }

        public function getUser_team()
        {
            return $this->user_team;
        }

        //User_team_join_date
        public function setUser_team_join_date($team_join_date)
        {
            $this->user_team_join_date=$team_join_date;
        }

        public function getUser_team_join_date()
        {
            return $this->user_team_join_date;
        }

        //User_psn
        public function setUser_psn($psn)
        {
            $this->user_psn=$psn;
        }

        public function getUser_psn()
        {
            return $this->user_psn;
        }

        //User_xboxlive
        public function setUser_xboxlive($xboxlive)
        {
            $this->user_xboxlive=$xboxlive;
        }

        public function getUser_xboxlive()
        {
            return $this->user_xboxlive;
        }
        
        //User_nintendo_id
        public function setUser_nintendo_id($nintendo_id)
        {
            $this->user_nintendo_id=$nintendo_id;
        }

        public function getUser_nintendo_id()
        {
            return $this->user_nintendo_id;
        }

        //User_steam
        public function setUser_steam($steam)
        {
            $this->user_steam=$steam;
        }

        public function getUser_steam()
        {
            return $this->user_steam;
        }
        
        //User_battlenet
        public function setUser_battlenet($battlenet)
        {
            $this->user_battlenet=$battlenet;
        }

        public function getUser_battlenet()
        {
            return $this->user_battlenet;
        }
        
        //User_uplay
        public function setUser_uplay($uplay)
        {
            $this->user_uplay=$uplay;
        }

        public function getUser_uplay()
        {
            return $this->user_uplay;
        }
        
        //User_origin
        public function setUser_origin($origin)
        {
            $this->user_origin=$origin;
        }

        public function getUser_origin()
        {
            return $this->user_origin;
        }


        //User_youtube_channel
        public function setUser_youtube_channel($youtube_channel)
        {
            $this->user_youtube_channel=$youtube_channel;
        }

        public function getUser_youtube_channel()
        {
            return $this->user_youtube_channel;
        }

        //User_twitch_channel
        public function setUser_twitch_channel($twitch_channel)
        {
            $this->user_twitch_channel=$twitch_channel;
        }

        public function getUser_twitch_channel()
        {
            return $this->user_twitch_channel;
        }
        
        //User_website
        public function setUser_website($website)
        {
            $this->user_website=$website;
        }

        public function getUser_website()
        {
            return $this->user_website;
        }
        
        
        //User stats
        //Follower number
        public function getUser_follower_count($base)
        {
            $query="Select count(*) as follower_count from follow where follow_followed_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $follower_count='0';
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $follower_count=$row['follower_count'];  
                }
            }
            return($follower_count);
        }
        
        //Follower number
        public function getUser_following_count($base)
        {
            $query="Select count(*) as following_count from follow where follow_following_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $following_count='0';
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $following_count=$row['following_count'];  
                }
            }
            return($following_count);
        }
        
        //Follower number
        public function getUser_friend_count($base)
        {
            $query="Select count(*) as friend_count from friendship where friendship_friend1_number=".$this->user_number." OR friendship_friend2_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $friend_count='0';
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $friend_count=$row['friend_count'];  
                }
            }
            return($friend_count);
        }
        
        //Follower number
        public function getUser_friend_request_count($base)
        {
            $query="Select count(*) as request_count from friend_request where request_target_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $request_count='0';
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $request_count=$row['request_count'];  
                }
            }
            return($request_count);
        }
        
        
        //Follower number
        public function getUser_Notifications_Count($base)
        {
            $query="Select count(*) as notif_count from notification where notification_read=0 AND notification_user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $notif_count='0';
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $notif_count=$row['notif_count'];  
                }
            }
            return($notif_count);
        }
        
        public static function getUserCount($base)
        {
            $query="Select count(*) as user_count from user ";
            $data=$base->fetch_all_array($query);
            $user_count='0';
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $user_count=$row['user_count'];  
                }
            }
            return($user_count);
        }

        //Database methods
        //Load
        //Load the user id and profile picture using his number
        public function loadUser($base)
        {
            $query="Select * from user where user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $user_exist=false;
            if(!empty($data))
            {
                $user_exist=true;
                foreach($data as $row)
                {
                    $this->user_id=$row['user_id'];
                    $this->user_profile_picture_url=$row['user_profile_picture_url']; 
                    $this->user_gender=$row['user_gender'];
                    $this->user_birthday=$row['user_birthday'];
                    $this->user_description=$row['user_description'];
                    $this->user_account_creation_date=$row['user_account_creation_date'];
                    $country_id=$row['user_country_id']; 
                    $country=new Country();
                    $country->setCountry_id($country_id);
                    $country->loadCountry($base);
                    $this->user_country=$country;
                    $language_code=$row['user_main_language_code'];
                    $language=new Language();
                    $language->setLanguage_code($language_code);
                    $language->loadLanguage($base);
                    $this->user_main_language=$language;
                }
            }
            return($user_exist);
        }
        
        //Load the user number and profile picture using his id
        public function loadUserById($base)
        {
            $query="Select * from user where user_id='".addslashes($this->user_id)."'";
            $data=$base->fetch_all_array($query);
            $user_exist=false;
            if(!empty($data))
            {
                $user_exist=true;
                foreach($data as $row)
                {
                    $this->user_number=$row['user_number'];
                    $this->user_profile_picture_url=$row['user_profile_picture_url'];  
                    $this->user_gender=$row['user_gender'];
                    $this->user_birthday=$row['user_birthday'];
                    $this->user_description=$row['user_description'];
                    $this->user_account_creation_date=$row['user_account_creation_date'];
                    $country_id=$row['user_country_id']; 
                    $country=new Country();
                    $country->setCountry_id($country_id);
                    $country->loadCountry($base);
                    $this->user_country=$country;
                    $language_code=$row['user_main_language_code'];
                    $language=new Language();
                    $language->setLanguage_code($language_code);
                    $language->loadLanguage($base);
                    $this->user_main_language=$language;
                }
            }
            return($user_exist);
        }
        
        //Test if the user id is already in database before insert
        public function testUserId($base)
        {
            $query="Select * from user where user_id='".addslashes($this->user_id)."'";
            $data=$base->fetch_all_array($query);
            $user_exist=false;
            if(!empty($data))
            {
                $user_exist=true;
            }
            return($user_exist);
        }
        
        //Test if the user email is already in database before insert
        public function testUserEmail($base)
        {
            $query="Select * from user where user_email='".addslashes($this->user_email)."'";
            $data=$base->fetch_all_array($query);
            $user_exist=false;
            if(!empty($data))
            {
                $user_exist=true;
            }
            return($user_exist);
        }
        
        public function UserAuthentification($base, $id, $password)
        {
            $query="Select * from user where user_id='".$id."' AND user_password='".$password."'";
            $data=$base->fetch_all_array($query);
            $ok=true;
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $this->user_number=$row['user_number'];  
                    $this->user_id=$row['user_id'];
                }
            }
            else 
            {
                $ok=false;
            }
            return($ok);
        }
        
        //Load the user main game and platform
        public function loadUserMainGamePlatform($base)
        {
            $query="Select user_main_game_number, user_main_platform_code from user where user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $main_game_exist=false;
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $game_number=$row['user_main_game_number'];
                    $platform_code=$row['user_main_platform_code'];
                    $this->user_main_game=new Game();
                    $this->user_main_game->setGame_number($game_number);
                    $main_game_exist=$this->user_main_game->loadGame($base);
                    if($main_game_exist)
                    {
                        $this->user_main_platform=new Platform();
                        $this->user_main_platform->setPlatform_code($platform_code);
                        $this->user_main_platform->loadPlatform($base);
                    }
                }
            }
            return($main_game_exist);
        }
        
        public function loadUserGamertags($base)
        {
            $query="Select * from user where user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $this->user_psn=$row['user_psn'];
                    $this->user_xboxlive=$row['user_xboxlive']; 
                    $this->user_nintendo_id=$row['user_nintendo_id'];
                    $this->user_steam=$row['user_steam'];
                    $this->user_battlenet=$row['user_battlenet'];
                    $this->user_uplay=$row['user_uplay'];
                    $this->user_origin=$row['user_origin'];
                    $this->user_youtube_channel=$row['user_youtube_channel'];
                    $this->user_twitch_channel=$row['user_twitch_channel'];
                    $this->user_website=$row['user_website'];
                }
            }
        }
        
        //Load list
        public static function loadAllUsers($base)
        {

        }
        
        //Search games
        public static function searchUsers($base, $keyword)
        {
            $query="Select * from user where user_id like '".$keyword."%'";
            $data=$base->fetch_all_array($query);
            $theUsers=array();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $theUsers[]=$user;
                }
            }
            return $theUsers;
        }
        
        public function getUserPlatforms()
        {
            return $this->theUserPlatforms;
        }
        
        //Load the platforms owned by the user
        public function loadUserPlatforms($base)
        {
            $query="Select DISTINCT platform_code from user_own_game_platform where user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $userPlatforms_exist=false;
            if(!empty($data))
            {
                $userPlatforms_exist=true;
                foreach($data as $row)
                {
                    $code=$row['platform_code'];
                    $platform=new Platform();
                    $platform->setPlatform_code($code);
                    $platform->loadPlatform($base);
                    $this->theUserPlatforms[]=$platform;
                }
            }
            return($userPlatforms_exist);
        }
        
        public function getUserGames()
        {
            return $this->theUserGames;
        }
        
        //Load the platforms owned by the user
        public function loadUserGames($base)
        {
            $this->theUserGames=array();
            $query="Select DISTINCT game_number from user_own_game_platform where user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $userGames_exist=false;
            if(!empty($data))
            {
                $userGames_exist=true;
                foreach($data as $row)
                {
                    $game_number=$row['game_number'];
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $this->theUserGames[]=$game;
                }
            }
            return($userGames_exist);
        }
        
        public function getUserGamesOnOnePlatform($base, $platform)
        {
            $query="Select * from user_own_game_platform where user_number=".$this->user_number." AND platform_code='".$platform->getPlatform_code()."'";
            $data=$base->fetch_all_array($query);
            $theUserGamesOnPlatform=array();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $game_number=$row['game_number'];
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $theUserGamesOnPlatform[]=$game;
                }
            }
            return($theUserGamesOnPlatform);
        }
        
        public function getUserLibrary()
        {
            return $this->theUserLibrary;
        }
        
        //Load the library of games by platforms owned by the user
        public function loadUserLibrary($base)
        {
            $this->theUserLibrary=array();
            $query="Select * from user_own_game_platform where user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $user_library_exist=false;
            if(!empty($data))
            {
                $user_library_exist=true;
                foreach($data as $row)
                {
                    $code=$row['platform_code'];
                    $game_number=$row['game_number'];
                    $platform=new Platform();
                    $platform->setPlatform_code($code);
                    $platform->loadPlatform($base);
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $user_game_version=new User_own_game_platform();
                    $user_game_version->setAll($this, $game, $platform);
                    $this->theUserLibrary[]=$user_game_version;
                }
            }
            return($user_library_exist);
        }
        
        public function getUserWishlistOnOnePlatform($base, $platform)
        {
            $query="Select * from user_wishlist where user_number=".$this->user_number." AND platform_code='".$platform->getPlatform_code()."'";
            $data=$base->fetch_all_array($query);
            $theUserWishlistOnPlatform=array();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $game_number=$row['game_number'];
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $theUserWishlistOnPlatform[]=$game;
                }
            }
            return($theUserWishlistOnPlatform);
        }
        
        //Load the wishlist of the user
        public function loadUserWishlist($base)
        {
            $query="Select * from user_wishlist where user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $user_wishlist_exist=false;
            if(!empty($data))
            {
                $user_wishlist_exist=true;
                foreach($data as $row)
                {
                    $code=$row['platform_code'];
                    $game_number=$row['game_number'];
                    $add_date=$row['wishlist_add_date'];
                    $platform=new Platform();
                    $platform->setPlatform_code($code);
                    $platform->loadPlatform($base);
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $user_wishlist=new User_wishlist();
                    $user_wishlist->setAll($this, $game, $platform, $add_date);
                    $this->theUserWishlist[]=$user_wishlist;
                }
            }
            return($user_wishlist_exist);
        }
        
        //Load the other languages spoken by the user
        public function loadUserLanguages($base)
        {
            $query="Select * from user_language where user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $code=$row['language_code'];
                    $language=new Language();
                    $language->setLanguage_code($code);
                    $language->loadLanguage($base);
                    $this->theUserLanguages[]=$language;
                }
            }
        }
        
        public function getUserFollows()
        {
            return $this->theUserFollows;
        }
        
        //Load the users who are followed by the user
        public function loadUserFollows($base)
        {
            $query="Select * from follow where follow_following_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $follows_exist=false;
            if(!empty($data))
            {
                $follows_exist=true;
                foreach($data as $row)
                {
                    $number=$row['follow_followed_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $date=$row['follow_date'];
                    $follow=new Follow();
                    $follow->setAll($this, $user, $date);
                    $this->theUserFollows[]=$follow;
                }
            }
            return($follows_exist);
        }
        
        public function getUserFollowers()
        {
            return $this->theUserFollowers;
        }         
        
        //Load the users who follow the user
        public function loadUserFollowers($base)
        {
            $query="Select * from follow where follow_followed_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $followers_exist=false;
            if(!empty($data))
            {
                $followers_exist=true;
                foreach($data as $row)
                {
                    $number=$row['follow_following_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $date=$row['follow_date'];
                    $follow=new Follow();
                    $follow->setAll($user, $this, $date);
                    $this->theUserFollowers[]=$follow;
                }
            }
            return($followers_exist);
        }
        
        public function getUserFriends()
        {
            return $this->theUserFriends;
        }
        
        //Load the users who are followed by the user
        public function loadUserFriends($base)
        {
            $this->theUserFriends=array();
            $query="Select * from friendship where friendship_friend1_number=".$this->user_number." OR friendship_friend2_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $friends_exist=false;
            if(!empty($data))
            {
                $friends_exist=true;
                foreach($data as $row)
                {
                    //get the friend user_number
                    $number=$row['friendship_friend1_number'];
                    if ($number == $this->user_number) 
                    {
                        $number = $row['friendship_friend2_number'];
                    }
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $start_date=$row['friendship_start_date'];
                    $friendship=new Friendship();
                    $friendship->setAll($user, $this, $start_date);
                    $this->theUserFriends[]=$friendship;
                }
            }
            return($friends_exist);
        }
        
        public function getUserPosts()
        {
            return $this->theUserPosts;
        }
        
        //Load the posts of the user
        public function loadUserPosts($base)
        {
            $query="Select * from post where post_user_number=".$this->user_number." ORDER BY post_date DESC";
            $data=$base->fetch_all_array($query);
            $posts_exist=false;
            if(!empty($data))
            {
                $posts_exist=true;
                foreach($data as $row)
                {
                    $number=$row['post_number'];
                    $post=new Post();
                    $post->setPost_number($number);
                    $post->loadPost($base);
                    $this->theUserPosts[]=$post;
                }
            }
            return($posts_exist);
        }
        
        public function getUserNotifications()
        {
            return $this->theUserNotifications;
        }
        
        //Load the notifications of the user
        public function loadUserNotifications($base)
        {
            $query="Select * from notification where notification_user_number=".$this->user_number." ORDER BY notification_date DESC";
            $data=$base->fetch_all_array($query);
            $notifs_exist=false;
            if(!empty($data))
            {
                $notifs_exist=true;
                foreach($data as $row)
                {
                    $number=$row['notification_number'];
                    $date=$row['notification_date'];
                    $message=$row['notification_message'];
                    $read=$row['notification_read'];
                    $notification=new Notification();
                    $notification->setAll($number, $this, $date, $message, $read);
                    $this->theUserNotifications[]=$notification;
                }
            }
            return($notifs_exist);
        }
        
        //Load the events of the user
        public function loadUserEvents($base)
        {
            $query="Select * from event where event_user_number=".$this->user_number." ORDER BY event_date DESC";
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['event_number'];
                    $event=new Event();
                    $event->setEvent_number($number);
                    $event->loadEvent($base);
                    $this->theUserEvents[]=$event;
                }
            }
        }
        
        public function getUserAvailabilities()
        {
            return $this->theUserAvailabilities;
        }
        
        //Load the availabilities of the user
        public function loadUserAvailabilities($base)
        {
            $query="Select * from availability where availability_user_number=".$this->user_number." ORDER BY availability_start_date DESC";
            $data=$base->fetch_all_array($query);
            $user_availabilities_exist=false;
            if(!empty($data))
            {
                $user_availabilities_exist=true;
                foreach($data as $row)
                {
                    $number=$row['availability_number'];
                    $availability=new Availability();
                    $availability->setAvailability_number($number);
                    $availability->loadAvailability($base);
                    $this->theUserAvailabilities[]=$availability;
                }
            }
            return($user_availabilities_exist);
        }
        
        public function getUserGoals()
        {
            return $this->theUserGoals;
        }
        
        //Load the goals of the user
        public function loadUserGoals($base)
        {
            $query="Select * from goal where goal_user_number=".$this->user_number." ORDER BY goal_creation_date DESC";
            $data=$base->fetch_all_array($query);
            $user_goals_exist=false;
            if(!empty($data))
            {
                $user_goals_exist=true;
                foreach($data as $row)
                {
                    $number=$row['goal_number'];
                    $goal=new Goal();
                    $goal->setGoal_number($number);
                    $goal->loadGoal($base);
                    $this->theUserGoals[]=$goal;
                }
            }
            return($user_goals_exist);
        }
        
        public function getUserSessionsHosted()
        {
            return $this->theUserSessionsHosted;
        }
        
        //Load the session hosted by the user
        public function loadUserSessionsHosted($base)
        {
            $query="Select * from session where session_host_number=".$this->user_number." ORDER BY session_start_date DESC";
            $data=$base->fetch_all_array($query);
            $user_sessions_hosted_exist=false;
            if(!empty($data))
            {
                $user_sessions_hosted_exist=true;
                foreach($data as $row)
                {
                    $number=$row['session_number'];
                    $session=new Session();
                    $session->setSession_number($number);
                    $session->loadSession($base);
                    $this->theUserSessionsHosted[]=$session;
                }
            }
            return($user_sessions_hosted_exist);
        }
        
        public function getUserSessionsJoined()
        {
            return $this->theUserSessionsJoined;
        }
        
        //Load the session joined by the user
        public function loadUserSessionsJoined($base)
        {
            $query="Select * from session_joiner where join_user_number=".$this->user_number." ORDER BY join_date DESC";
            $data=$base->fetch_all_array($query);
            $user_sessions_joined_exist=false;
            if(!empty($data))
            {
                $user_sessions_joined_exist=true;
                foreach($data as $row)
                {
                    $number=$row['join_session_number'];
                    $session=new Session();
                    $session->setSession_number($number);
                    $session->loadSession($base);
                    $this->theUserSessionsJoined[]=$session;
                }
            }
            return($user_sessions_joined_exist);
        }
        
        //Load the communities founded by the user
        public function loadUserCommunitiesFounded($base)
        {
            $query="Select * from community where community_leader_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['community_number'];
                    $community=new Community();
                    $community->setCommunity_number($number);
                    $community->loadCommunity($base);
                    $this->theUserCommunitiesFounded[]=$community;
                }
            }
        }
        
        //Load the communities joined by the user
        public function loadUserCommunitiesJoined($base)
        {
            $query="Select * from membership where membership_user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['membership_community_number'];
                    $community=new Community();
                    $community->setCommunity_number($number);
                    $community->loadCommunity($base);
                    $this->theUserCommunitiesFounded[]=$community;
                }
            }
        }
        
        public function getUserChallengesMade()
        {
            return $this->theUserChallengesMade;
        }
        
        //Load the challenges made by the user
        public function loadUserChallengesMade($base)
        {
            $query="Select * from challenge where challenge_originator_number=".$this->user_number." ORDER BY challenge_creation_date DESC";
            $data=$base->fetch_all_array($query);
            $user_challenges_made_exist=false;
            if(!empty($data))
            {
                $user_challenges_made_exist=true;
                foreach($data as $row)
                {
                    $number=$row['challenge_number'];
                    $challenge=new Challenge();
                    $challenge->setChallenge_number($number);
                    $challenge->loadChallenge($base);
                    $this->theUserChallengesMade[]=$challenge;
                }
            }
            return($user_challenges_made_exist);
        }
        
        public function getUserChallengesTaken()
        {
            return $this->theUserChallengesTaken;
        }
        
        //Load the challenges taken up by the user
        public function loadUserChallengesTaken($base)
        {
            $query="Select * from challenge_taker where take_up_user_number=".$this->user_number." ORDER BY take_up_date DESC";
            $data=$base->fetch_all_array($query);
            $user_challenges_taken_exist=false;
            if(!empty($data))
            {
                $user_challenges_taken_exist=true;
                foreach($data as $row)
                {
                    $number=$row['take_up_challenge_number'];
                    $challenge=new Challenge();
                    $challenge->setChallenge_number($number);
                    $challenge->loadChallenge($base);
                    $challenge_taker=new Challenge_taker();
                    $challenge_taker->setTake_up_user($this);
                    $challenge_taker->setTake_up_challenge($challenge);
                    $challenge_taker->loadChallenge_taker($base);
                    $this->theUserChallengesTaken[]=$challenge_taker;
                }
            }
            return($user_challenges_taken_exist);
        }
        
        public function getUserDuelsOriginated()
        {
            return $this->theUserDuelsOriginated;
        }
        
        //Load the duel originated by the user
        public function loadUserDuelsOriginated($base)
        {
            $query="Select * from duel where duel_originator_number=".$this->user_number." ORDER BY duel_creation_date DESC";
            $data=$base->fetch_all_array($query);
            $user_duels_originated_exist=false;
            if(!empty($data))
            {
                $user_duels_originated_exist=true;
                foreach($data as $row)
                {
                    $number=$row['duel_number'];
                    $duel=new Duel();
                    $duel->setDuel_number($number);
                    $duel->loadDuel($base);
                    $this->theUserDuelsOriginated[]=$duel;
                }
            }
            return($user_duels_originated_exist);
        }
        
        public function getUserDuelsTargeted()
        {
            return $this->theUserDuelsTargeted;
        }
        
        //Load the duel where the user is the target
        public function loadUserDuelsTargeted($base)
        {
            $query="Select * from duel where duel_target_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $user_duels_targeted_exist=false;
            if(!empty($data))
            {
                $user_duels_targeted_exist=true;
                foreach($data as $row)
                {
                    $number=$row['duel_number'];
                    $duel=new Duel();
                    $duel->setDuel_number($number);
                    $duel->loadDuel($base);
                    $this->theUserDuelsTargeted[]=$duel;
                }
            }
            return($user_duels_targeted_exist);
        }

        //Invitations loading
        
        //Load the invitations to join a team received by the user
        public function loadUserTeamInvitations($base)
        {
            $query="Select * from team_invitation where invitation_user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['invitation_team_number'];
                    $team=new Team();
                    $team->setTeam_number($number);
                    $team->loadTeam($base);
                    $invitation=new Team_inviattion();
                    $invitation->setInvitation_user($this);
                    $invitation->setInvitation_team($team);
                    $invitation->loadTeam_invitation($base);
                    $this->theUserTeamInvitations[]=$invitation;
                }
            }
        }
        
        //Load the team applications made by the user
        public function loadUserTeamApplications($base)
        {
            $query="Select * from team_application where application_applicant_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['application_team_number'];
                    $team=new Team();
                    $team->setTeam_number($number);
                    $team->loadTeam($base);
                    $application=new Team_application();
                    $application->setApplication_applicant($this);
                    $application->setApplication_team($team);
                    $application->loadTeam_application($base);
                    $this->theUserTeamApplications[]=$application;
                }
            }
        }
        
        //Load the invitations to join a community received by the user
        public function loadUserCommunityInvitations($base)
        {
            $query="Select * from community_invitation where invitation_user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['invitation_community_number'];
                    $community=new Community();
                    $community->setCommunity_number($number);
                    $community->loadCommunity($base);
                    $invitation=new Community_inviattion();
                    $invitation->setInvitation_user($this);
                    $invitation->setInvitation_community($community);
                    $invitation->loadCommunity_invitation($base);
                    $this->theUserCommunityInvitations[]=$invitation;
                }
            }
        }
        
        //Load the invitations to take up a challenge received by the user
        public function loadUserChallengeInvitations($base)
        {
            $query="Select * from challenge_invitation where invitation_user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['invitation_challenge_number'];
                    $challenge=new Challenge();
                    $challenge->setChallenge_number($number);
                    $challenge->loadChallenge($base);
                    $invitation=new Challenge_inviattion();
                    $invitation->setInvitation_user($this);
                    $invitation->setInvitation_challenge($challenge);
                    $invitation->loadChallenge_invitation($base);
                    $this->theUserChallengeInvitations[]=$invitation;
                }
            }
        }
        
        //Load the invitations to join a session received by the user
        public function loadUserSessionInvitations($base)
        {
            $query="Select * from session_invitation where invitation_user_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['invitation_session_number'];
                    $session=new Session();
                    $session->setSession_number($number);
                    $session->loadSession($base);
                    $invitation=new Session_inviattion();
                    $invitation->setInvitation_user($this);
                    $invitation->setInvitation_session($session);
                    $invitation->loadSession_invitation($base);
                    $this->theUserSessionInvitations[]=$invitation;
                }
            }
        }
        
        public function getUserFriendRequestsSent()
        {
            return $this->theUserFriendRequestsSent;
        }
        
        //Load the friend requests sent by the user
        public function loadUserFriendRequestsSent($base)
        {
            $query="Select * from friend_request where request_sender_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $friend_requests_sent_exist=false;
            if(!empty($data))
            {
                $friend_requests_sent_exist=true;
                foreach($data as $row)
                {
                    $number=$row['request_target_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $date=$row['request_date'];
                    $message=$row['request_message'];   
                    $request=new Friend_request();
                    $request->setAll($this, $user, $date, $message);
                    $this->theUserFriendRequestsSent[]=$request;
                }
            }
            return($friend_requests_sent_exist);
        }
        
        public function getUserFriendRequestsReceived()
        {
            return $this->theUserFriendRequestsReceived;
        }
        
        //Load the friend requests received by the user
        public function loadUserFriendRequestsReceived($base)
        {
            $query="Select * from friend_request where request_target_number=".$this->user_number;
            $data=$base->fetch_all_array($query);
            $friend_requests_received_exist=false;
            if(!empty($data))
            {
                $friend_requests_received_exist=true;
                foreach($data as $row)
                {
                    $number=$row['request_sender_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $date=$row['request_date'];
                    $message=$row['request_message'];   
                    $request=new Friend_request();
                    $request->setAll($user, $this, $date, $message);
                    $this->theUserFriendRequestsReceived[]=$request;
                }
            }
            return($friend_requests_received_exist);
        }
        
        //User Friends Info
        
        //User Friends challenges
        private static function cmpDateChallengesMade($a, $b)
        {
            return ( date_create($a->getChallenge_creation_date()) < date_create($b->getChallenge_creation_date()) );
        }
        public function getUserFriendsChallengesMade()
        {
            
            usort($this->theUserFriendsChallengesMade, array('User','cmpDateChallengesMade'));
            return $this->theUserFriendsChallengesMade;
        }
        
        //Load the friends challenges made 
        public function loadUserFriendsChallengesMade($base)
        {
            $friends_exist=$this->loadUserFriends($base);
            $friends_challenges_exist=false;
            if($friends_exist)
            {
                foreach ($this->theUserFriends as $friendship)
                {
                    $friend_challenges_made_exist=$friendship->getFriendship_friend1()->loadUserChallengesMade($base);
                    if($friend_challenges_made_exist)
                    {
                        foreach ($friendship->getFriendship_friend1()->getUserChallengesMade() as $challenge)
                        {   
                            $this->theUserFriendsChallengesMade[]=$challenge;
                        }
                    }
                }
                if(!empty($this->theUserFriendsChallengesMade))
                {
                    $friends_challenges_exist=true;
                }
            }
            return($friends_challenges_exist);
        }
        
        //User Friends availabilities
        private static function cmpDateAvailabilities($a, $b)
        {
            return ( date_create($a->getAvailability_creation_date()) < date_create($b->getAvailability_creation_date()) );
        }
        
        public function getUserFriendsAvailabilities()
        {
            usort($this->theUserFriendsAvailabilities, array('User', 'cmpDateAvailabilities'));
            return $this->theUserFriendsAvailabilities;
        }
        
        //Load the friends availabilities 
        public function loadUserFriendsAvailabilities($base)
        {
            $friends_exist=$this->loadUserFriends($base);
            $friends_availabilities_exist=false;
            if($friends_exist)
            {
                foreach ($this->theUserFriends as $friendship)
                {
                    $friend_availabilities_exist=$friendship->getFriendship_friend1()->loadUserAvailabilities($base);
                    if($friend_availabilities_exist)
                    {
                        foreach ($friendship->getFriendship_friend1()->getUserAvailabilities() as $availability)
                        {   
                            $this->theUserFriendsAvailabilities[]=$availability;
                        }
                    }
                }
                if(!empty($this->theUserFriendsAvailabilities))
                {
                    $friends_availabilities_exist=true;
                }
            }
            return($friends_availabilities_exist);
        }
        
        //User Friends sessions hosted
        private static function cmpDateSessionsHosted($a, $b)
        {
            return ( date_create($a->getSession_creation_date()) < date_create($b->getSession_creation_date()) );
        }
        
        public function getUserFriendsSessionsHosted()
        {
            usort($this->theUserFriendsSessionsHosted, array('User', 'cmpDateSessionsHosted'));
            return $this->theUserFriendsSessionsHosted;
        }
        
        //Load the friends sessions hosted
        public function loadUserFriendsSessionsHosted($base)
        {
            $friends_exist=$this->loadUserFriends($base);
            $friends_sessions_hosted_exist=false;
            if($friends_exist)
            {
                foreach ($this->theUserFriends as $friendship)
                {
                    $friend_sessions_hosted_exist=$friendship->getFriendship_friend1()->loadUserSessionsHosted($base);
                    if($friend_sessions_hosted_exist)
                    {
                        foreach ($friendship->getFriendship_friend1()->getUserSessionsHosted() as $session)
                        {   
                            $this->theUserFriendsSessionsHosted[]=$session;
                        }
                    }
                }
                if(!empty($this->theUserFriendsSessionsHosted))
                {
                    $friends_sessions_hosted_exist=true;
                }
            }
            return($friends_sessions_hosted_exist);
        }
        
        //User Friends goals
        private static function cmpDateGoals($a, $b)
        {
            return ( date_create($a->getGoal_creation_date()) < date_create($b->getGoal_creation_date()) );
        }
        
        public function getUserFriendsGoals()
        {
            usort($this->theUserFriendsGoals, array('User', 'cmpDateGoals'));
            return $this->theUserFriendsGoals;
        }
        
        //Load the friends goals
        public function loadUserFriendsGoals($base)
        {
            $friends_exist=$this->loadUserFriends($base);
            $friends_goals_exist=false;
            if($friends_exist)
            {
                foreach ($this->theUserFriends as $friendship)
                {
                    $friend_goals_exist=$friendship->getFriendship_friend1()->loadUserGoals($base);
                    if($friend_goals_exist)
                    {
                        foreach ($friendship->getFriendship_friend1()->getUserGoals() as $goal)
                        {   
                            $this->theUserFriendsGoals[]=$goal;
                        }
                    }
                }
                if(!empty($this->theUserFriendsGoals))
                {
                    $friends_goals_exist=true;
                }
            }
            return($friends_goals_exist);
        }
        
        //User Friends duels originated
        private static function cmpDateDuelsOriginated($a, $b)
        {
            return ( date_create($a->getDuel_creation_date()) < date_create($b->getDuel_creation_date()) );
        }
        
        public function getUserFriendsDuelsOriginated()
        {
            usort($this->theUserFriendsDuelsOriginated, array('User', 'cmpDateDuelsOriginated'));
            return $this->theUserFriendsDuelsOriginated;
        }
        
        //Load the friends duels originated
        public function loadUserFriendsDuelsOriginated($base)
        {
            $this->theUserFriends=  array();
            $friends_exist=$this->loadUserFriends($base);
            $friends_duels_originated_exist=false;
            if($friends_exist)
            {
                foreach ($this->theUserFriends as $friendship)
                {
                    $friend_duels_originated_exist=$friendship->getFriendship_friend1()->loadUserDuelsOriginated($base);
                    if($friend_duels_originated_exist)
                    {
                        foreach ($friendship->getFriendship_friend1()->getUserDuelsOriginated() as $duel)
                        {   
                            $this->theUserFriendsDuelsOriginated[]=$duel;
                        }   
                    }
                }
                if(!empty($this->theUserFriendsDuelsOriginated))
                {
                    $friends_duels_originated_exist=true;
                }
            }
            return($friends_duels_originated_exist);
        }
        
        //User follows info
        
        //User Follows challenges
        public function getUserFollowsChallengesMade()
        {
            usort($this->theUserFollowsChallengesMade, array('User','cmpDateChallengesMade'));
            return $this->theUserFollowsChallengesMade;
        }
        
        //Load the Follows challenges made 
        public function loadUserFollowsChallengesMade($base)
        {
            $follows_exist=$this->loadUserFollows($base);
            $follows_challenges_exist=false;
            if($follows_exist)
            {
                foreach ($this->theUserFollows as $follow)
                {
                    $follow_challenges_made_exist=$follow->getFollow_followed()->loadUserChallengesMade($base);
                    if($follow_challenges_made_exist)
                    {
                        foreach ($follow->getFollow_followed()->getUserChallengesMade() as $challenge)
                        {   
                            $this->theUserFollowsChallengesMade[]=$challenge;
                        }
                    }
                }
                if(!empty($this->theUserFollowsChallengesMade))
                {
                    $follows_challenges_exist=true;
                }
            }
            return($follows_challenges_exist);
        }
        
        //User Follows Availabilities
        public function getUserFollowsAvailabilities()
        {
            usort($this->theUserFollowsAvailabilities, array('User', 'cmpDateAvailabilities'));
            return $this->theUserFollowsAvailabilities;
        }
        
        //Load the friends availabilities 
        public function loadUserFollowsAvailabilities($base)
        {
            $follows_exist=$this->loadUserFollows($base);
            $follows_availabilities_exist=false;
            if($follows_exist)
            {
                foreach ($this->theUserFollows as $follow)
                {
                    $follow_availabilities_exist=$follow->getFollow_followed()->loadUserAvailabilities($base);
                    if($follow_availabilities_exist)
                    {
                        foreach ($follow->getFollow_followed()->getUserAvailabilities() as $availability)
                        {   
                            $this->theUserFollowsAvailabilities[]=$availability;
                        }
                    }
                }
                if(!empty($this->theUserFollowsAvailabilities))
                {
                    $follows_availabilities_exist=true;
                }
            }
            return($follows_availabilities_exist);
        }
        
        //User Follows sessions hosted
        public function getUserFollowsSessionsHosted()
        {
            usort($this->theUserFollowsSessionsHosted, array('User', 'cmpDateSessionsHosted'));
            return $this->theUserFollowsSessionsHosted;
        }
        
        //Load the Follows sessions hosted
        public function loadUserFollowsSessionsHosted($base)
        {
            $follows_exist=$this->loadUserFollows($base);
            $follows_sessions_hosted_exist=false;
            if($follows_exist)
            {
                foreach ($this->theUserFollows as $follow)
                {
                    $follow_sessions_hosted_exist=$follow->getFollow_followed()->loadUserSessionsHosted($base);
                    if($follow_sessions_hosted_exist)
                    {
                        foreach ($follow->getFollow_followed()->getUserSessionsHosted() as $session)
                        {   
                            $this->theUserFollowsSessionsHosted[]=$session;
                        }
                    }
                }
                if(!empty($this->theUserFollowsSessionsHosted))
                {
                    $follows_sessions_hosted_exist=true;
                }
            }
            return($follows_sessions_hosted_exist);
        }
        
        //User Follows goals
        public function getUserFollowsGoals()
        {
            usort($this->theUserFollowsGoals, array('User', 'cmpDateGoals'));
            return $this->theUserFollowsGoals;
        }
        
        //Load the Follows goals
        public function loadUserFollowsGoals($base)
        {
            $follows_exist=$this->loadUserFollows($base);
            $follows_goals_exist=false;
            if($follows_exist)
            {
                foreach ($this->theUserFollows as $follow)
                {
                    $follow_goals_exist=$follow->getFollow_followed()->loadUserGoals($base);
                    if($follow_goals_exist)
                    {
                        foreach ($follow->getFollow_followed()->getUserGoals() as $goal)
                        {   
                            $this->theUserFollowsGoals[]=$goal;
                        }
                    }
                }
                if(!empty($this->theUserFollowsGoals))
                {
                    $follows_goals_exist=true;
                }
            }
            return($follows_goals_exist);
        }
        
        //User Follows duels originated
        public function getUserFollowsDuelsOriginated()
        {
            usort($this->theUserFollowsDuelsOriginated, array('User', 'cmpDateDuelsOriginated'));
            return $this->theUserFollowsDuelsOriginated;
        }
        
        //Load the Follows duels originated
        public function loadUserFollowsDuelsOriginated($base)
        {
            $this->theUserFollows=  array();
            $follows_exist=$this->loadUserFollows($base);
            $follows_duels_originated_exist=false;
            if($follows_exist)
            {
                foreach ($this->theUserFollows as $follow)
                {
                    $follow_duels_originated_exist=$follow->getFollow_followed()->loadUserDuelsOriginated($base);
                    if($follow_duels_originated_exist)
                    {
                        foreach ($follow->getFollow_followed()->getUserDuelsOriginated() as $duel)
                        {   
                            $this->theUserFollowsDuelsOriginated[]=$duel;
                        }   
                    }
                }
                if(!empty($this->theUserFollowsDuelsOriginated))
                {
                    $follows_duels_originated_exist=true;
                }
            }
            return($follows_duels_originated_exist);
        }
        
        //User subscriptions posts
        //User Friends sessions hosted
        private static function cmpDatePost($a, $b)
        {
            return ( date_create($a->getPost_date()) < date_create($b->getPost_date()) );
        }
        
        public function getUserFollowsPosts()
        {
            usort($this->theUserFollowsPosts, array('User', 'cmpDatePost'));
            return $this->theUserFollowsPosts;
        }
        
        //Load the friends sessions hosted
        public function loadUserFollowsPosts($base)
        {
            $this->theUserFollows=  array();
            $follows_exist=$this->loadUserFollows($base);
            $follows_posts_exist=false;
            if($follows_exist)
            {
                foreach ($this->theUserFollows as $follow)
                {
                    $follow_posts_exist=$follow->getFollow_followed()->loadUserPosts($base);
                    if($follow_posts_exist)
                    {
                        foreach ($follow->getFollow_followed()->getUserPosts() as $post)
                        {   
                            $this->theUserFollowsPosts[]=$post;
                        }
                    }
                }
                if(!empty($this->theUserFollowsPosts))
                {
                    $follows_posts_exist=true;
                }
            }
            return($follows_posts_exist);
        }
        
        public function getUserSubscriptionsPosts()
        {
            usort($this->theUserSubscriptionsPosts, array('User', 'cmpDatePost'));
            return $this->theUserSubscriptionsPosts;
        }
        
        //Load the friends sessions hosted
        public function loadUserSubscriptionsPosts($base)
        {
            $subscriptions_posts_exist=false;
            //User posts
            $user_posts_exist=$this->loadUserPosts($base);
            if($user_posts_exist)
            {
                foreach ($this->theUserPosts as $post)
                {
                    $this->theUserSubscriptionsPosts[]=$post;
                }
            }
            //Follows posts
            $follows_posts_exist=$this->loadUserFollowsPosts($base);
            if($follows_posts_exist)
            {
                foreach ($this->theUserFollowsPosts as $post)
                {
                    $this->theUserSubscriptionsPosts[]=$post;
                }
            }
            //VGK's posts
            $VGK=new User();
            $VGK->setUser_number('1');
            $vgk_posts_exist=$VGK->loadUserPosts($base);
            if($vgk_posts_exist)
            {
                foreach ($VGK->getUserPosts() as $post)
                {
                    $this->theUserSubscriptionsPosts[]=$post;
                }
            }
            if(!empty($this->theUserSubscriptionsPosts))
            {
                $subscriptions_posts_exist=true;
            }
            return($subscriptions_posts_exist);
        }
        
        //User library info
        
        //User Library challenges
        public function getUserLibraryChallengesMade()
        {
            usort($this->theUserLibraryChallengesMade, array('User','cmpDateChallengesMade'));
            return $this->theUserLibraryChallengesMade;
        }
        
        //Load the Library challenges made 
        public function loadUserLibraryChallengesMade($base)
        {
            $user_games_exist=$this->loadUserGames($base);
            $user_games_challenges_exist=false;
            if($user_games_exist)
            {
                foreach ($this->theUserGames as $game)
                {
                    $game_challenges_made_exist=$game->loadGameChallenges($base);
                    if($game_challenges_made_exist)
                    {
                        foreach ($game->getGameChallenges() as $challenge)
                        {   
                            $this->theUserLibraryChallengesMade[]=$challenge;
                        }
                    }
                }
                if(!empty($this->theUserLibraryChallengesMade))
                {
                    $user_games_challenges_exist=true;
                }
            }
            return($user_games_challenges_exist);
        }
        
        //User Library Availabilities
        public function getUserLibraryAvailabilities()
        {
            usort($this->theUserLibraryAvailabilities, array('User', 'cmpDateAvailabilities'));
            return $this->theUserLibraryAvailabilities;
        }
        
        //Load the friends availabilities 
        public function loadUserLibraryAvailabilities($base)
        {
            $library_exist=$this->loadUserLibrary($base);
            $library_availabilities_exist=false;
            if($library_exist)
            {
                foreach ($this->theUserLibrary as $user_game_version)
                {
                    $game_version=new Game_platform();
                    $game_version->setAll($user_game_version->getGame(), $user_game_version->getPlatform());
                    $game_version_availabilities_exist=$game_version->loadGameVersionAvailabilities($base);
                    if($game_version_availabilities_exist)
                    {
                        foreach ($game_version->getGameVersionAvailabilities() as $availability)
                        {   
                            $this->theUserLibraryAvailabilities[]=$availability;
                        }
                    }
                }
                if(!empty($this->theUserLibraryAvailabilities))
                {
                    $library_availabilities_exist=true;
                }
            }
            return($library_availabilities_exist);
        }
        
        //User Library sessions hosted
        public function getUserLibrarySessionsHosted()
        {
            usort($this->theUserLibrarySessionsHosted, array('User', 'cmpDateSessionsHosted'));
            return $this->theUserLibrarySessionsHosted;
        }
        
        //Load the Library sessions hosted
        public function loadUserLibrarySessionsHosted($base)
        {
            $library_exist=$this->loadUserLibrary($base);
            $library_sessions_hosted_exist=false;
            if($library_exist)
            {
                foreach ($this->theUserLibrary as $user_game_version)
                {
                    $game_version=new Game_platform();
                    $game_version->setAll($user_game_version->getGame(), $user_game_version->getPlatform());
                    $game_version_sessions_hosted_exist=$game_version->loadGameVersionSessions($base);
                    if($game_version_sessions_hosted_exist)
                    {
                        foreach ($game_version->getGameVersionSessions() as $session)
                        {   
                            $this->theUserLibrarySessionsHosted[]=$session;
                        }
                    }
                }
                if(!empty($this->theUserLibrarySessionsHosted))
                {
                    $library_sessions_hosted_exist=true;
                }
            }
            return($library_sessions_hosted_exist);
        }
        
        //User Library goals
        public function getUserLibraryGoals()
        {
            usort($this->theUserLibraryGoals, array('User', 'cmpDateGoals'));
            return $this->theUserLibraryGoals;
        }
        
        //Load the Library goals
        public function loadUserLibraryGoals($base)
        {
            $library_exist=$this->loadUserLibrary($base);
            $library_goals_exist=false;
            if($library_exist)
            {
                foreach ($this->theUserLibrary as $user_game_version)
                {
                    $game_version=new Game_platform();
                    $game_version->setAll($user_game_version->getGame(), $user_game_version->getPlatform());
                    $game_version_goals_exist=$game_version->loadGameVersionGoals($base);
                    if($game_version_goals_exist)
                    {
                        foreach ($game_version->getGameVersionGoals() as $goal)
                        {   
                            $this->theUserLibraryGoals[]=$goal;
                        }
                    }
                }
                if(!empty($this->theUserLibraryGoals))
                {
                    $library_goals_exist=true;
                }
            }
            return($library_goals_exist);
        }
        
        //User Library duels originated
        public function getUserLibraryDuelsOriginated()
        {
            usort($this->theUserLibraryDuelsOriginated, array('User', 'cmpDateDuelsOriginated'));
            return $this->theUserLibraryDuelsOriginated;
        }
        
        //Load the Library duels originated
        public function loadUserLibraryDuelsOriginated($base)
        {
            $this->theUserLibrary=  array();
            $library_exist=$this->loadUserLibrary($base);
            $library_duels_originated_exist=false;
            if($library_exist)
            {
                foreach ($this->theUserLibrary as $user_game_version)
                {
                    $game_version=new Game_platform();
                    $game_version->setAll($user_game_version->getGame(), $user_game_version->getPlatform());
                    $game_version_duels_originated_exist=$game_version->loadGameVersionDuels($base);
                    if($game_version_duels_originated_exist)
                    {
                        foreach ($game_version->getGameVersionDuels() as $duel)
                        {   
                            $this->theUserLibraryDuelsOriginated[]=$duel;
                        }   
                    }
                }
                if(!empty($this->theUserLibraryDuelsOriginated))
                {
                    $library_duels_originated_exist=true;
                }
            }
            return($library_duels_originated_exist);
        }
        
        //Insert
        public function insert($base)
        {
            $query="insert into user (`user_id`, `user_email`, `user_password`, `user_gender`, `user_birthday`, `user_account_creation_date`, `user_country_id`, `user_main_language_code`) ";
            $query.="values ('".$this->user_id."', '".$this->user_email."', '".$this->user_password."', '".$this->user_gender."', '".$this->user_birthday."', NOW(), ".$this->user_country->getCountry_id().", '".$this->user_main_language->getLanguage_code()."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function updateUserInfo($base)
        {
            $query="update user set user_description='".$this->user_description."'";
            $query.=" where user_number=".$this->user_number;
            $ok=$base->query($query);
            return $ok;
        }
        
        public function updateUserMainGamePlatform($base)
        {
            $query="update user set user_main_game_number=".$this->user_main_game->getGame_number().", user_main_platform_code='".$this->user_main_platform->getPlatform_code()."'";
            $query.=" where user_number=".$this->user_number;
            $ok=$base->query($query);
            return $ok;
        }
        
        public function updateUserPP($base)
        {
            $query="update user set user_profile_picture_url='".$this->user_profile_picture_url;
            $query.="' where user_number=".$this->user_number;
            $ok=$base->query($query);
            return $ok;
        }
        
        public function updateUserTeam($base)
        {
            $query="update user set user_team_number=".$this->user_team->getTeam_number().", user_join_team_date=NOW() ";
            $query.=" where user_number=".$this->user_number;
            $ok=$base->query($query);
            return $ok;
        }
        
        public function updateUserPassword($base)
        {
            $query="update user set user_password='".$this->user_password."' ";
            $query.=" where user_number=".$this->user_number;
            $ok=$base->query($query);
            return $ok;
        }
        
        public function updateUserGamertags($base)
        {
            $query="update user set user_psn=".$this->user_psn.", user_xboxlive=".$this->user_xboxlive.", user_nintendo_id=".$this->user_nintendo_id.", user_steam=".$this->user_steam;
            $query.=", user_battlenet=".$this->user_battlenet.", user_uplay=".$this->user_uplay.", user_origin=".$this->user_origin;
            $query.=", user_youtube_channel=".$this->user_youtube_channel.", user_twitch_channel=".$this->user_twitch_channel.", user_website=".$this->user_website;
            $query.=" where user_number=".$this->user_number;
            $ok=$base->query($query);
            return $ok;
        }
        
        //Delete
        public function delete($base)
        {
            $query="delete user from  where user_number=".$this->user_number;
            $ok=$base->query($query);
            return $ok;
        }
        
        //Reset User password
        //user_reset_password_code;
        public function setUser_reset_password_code($reset_password_code)
        {
            $this->user_reset_password_code=$reset_password_code;
        }

        public function getUser_reset_password_code()
        {
            return $this->user_reset_password_code;
        }
        
        public function updateUserResetPasswordCode($base)
        {
            $query="update user set user_reset_password_code=".$this->user_reset_password_code;
            $query.=" where user_id='".$this->user_id."'";
            $ok=$base->query($query);
            return $ok;
        }
        
        public function loadUserIdByEmail($base)
        {
            $query="Select * from user where user_email='".addslashes($this->user_email)."'";
            $data=$base->fetch_all_array($query);
            $user_exist=false;
            if(!empty($data))
            {
                $user_exist=true;
                foreach($data as $row)
                {
                    $this->user_id=$row['user_id'];
                }
            }
            return($user_exist);
        }
        
        public function matchUserIdresetPasswordCode($base)
        {
            $query="Select * from user where user_id='".addslashes($this->user_id)."' AND user_reset_password_code=".$this->user_reset_password_code;
            $data=$base->fetch_all_array($query);
            $user_exist=false;
            if(!empty($data))
            {
                $user_exist=true;
            }
            return($user_exist);
        }
    }
?>