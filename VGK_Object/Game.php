<?php

    class Game
    {

        private $game_number;
        private $game_name;
        private $game_cover_url;
        private $game_release_date;
        
        private $theGamePlatforms=array();
        private $theGamePosts=array();
        private $theGameSessions=array();
        private $theGameChallenges=array();
        private $theGameDuels=array();
        private $theGameAvailabilities=array();
        private $theGameGoals=array();
        private $theGameEvents=array();
        private $theGameOwners=array();
        private $theGameWhishlists=array();
        private $theGameOwnersAsMain=array();
        private $theGameCommunitiesAsMain=array();
        private $theGameTeamsAsMain=array();
        
        //private $game_activity_count;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $name, $cover, $release_date)
        {
            $this->game_number=$number;
            $this->game_name=$name;
            $this->game_cover_url=$cover;
            $this->game_release_date=$release_date;
        }

        public function setForInsertGame($name, $cover, $release_date)
        {
            $this->game_name=$name;
            $this->game_cover_url=$cover;
            $this->game_release_date=$release_date;
        }


        //Getter Setter
        //Game_number
        public function setGame_number($number)
        {
            $this->game_number=$number;
        }

        public function getGame_number()
        {
            return $this->game_number;
        }

        //Game_name
        public function setGame_name($name)
        {
            $this->game_name=$name;
        }

        public function getGame_name()
        {
            return $this->game_name;
        }

        //Game_cover_url
        public function setGame_cover_url($cover)
        {
            $this->game_cover_url=$cover;
        }

        public function getGame_cover_url()
        {
            return $this->game_cover_url;
        }
        
        //Game_release_date
        public function setGame_release_date($release_date)
        {
            $this->game_release_date=$release_date;
        }

        public function getGame_release_date()
        {
            return $this->game_release_date;
        }
        
        //theGamePlatforms
        public function setGamePlatforms($GamePlatforms)
        {
            $this->theGamePlatforms=$GamePlatforms;
        }

        public function getGamePlatforms()
        {
            return $this->theGamePlatforms;
        }

        //Database methods
        //Load
        //Load 1
        public function loadGame($base)
        {
            $query="Select * from game where game_number='".$this->game_number."'";
            $data=$base->fetch_all_array($query);
            $game_exist=false;
            if(!empty($data))
            {
                $game_exist=true;
                foreach($data as $row)
                {
                    $this->game_name=$row['game_name'];
                    $this->game_cover_url=$row['game_cover_url'];
                    $this->game_release_date=$row['game_release_date'];
                } 
            }
            return($game_exist);
        }
        
        public function loadGameByName($base)
        {
            $query="Select * from game where game_name='".addslashes($this->game_name)."'";
            $data=$base->fetch_all_array($query);
            $game_exist=false;
            if(!empty($data))
            {
                $game_exist=true;
                foreach($data as $row)
                {
                    $this->game_number=$row['game_number'];
                    $this->game_name=$row['game_name'];
                    $this->game_cover_url=$row['game_cover_url'];
                    $this->game_release_date=$row['game_release_date'];
                } 
            }
            return($game_exist);
        }

        //Load list
        public static function loadAllGames($base)
        {
            $query="Select * from game";
            $data=$base->fetch_all_array($query);
            $theGames=array();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['game_number'];
                    $name=$row['game_name'];
                    $cover=$row['game_cover_url'];
                    $release_date=$row['game_release_date'];
                    $game=new Game();
                    $game->setAll($number, $name, $cover, $release_date);
                    $theGames[]=$game;
                }
            }
            return $theGames;
        }
        
        //Search games
        public static function searchGames($base, $keyword)
        {
            $query="Select * from game where game_name like '".$keyword."%' or game_cover_url like '".$keyword."%'";
            $data=$base->fetch_all_array($query);
            $theGames=array();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['game_number'];
                    $name=$row['game_name'];
                    $cover=$row['game_cover_url'];
                    $release_date=$row['game_release_date'];
                    $game=new Game();
                    $game->setAll($number, $name, $cover, $release_date);
                    $theGames[]=$game;
                }
            }
            return $theGames;
        }

        //Load the platforms of the game
        public function loadAllPlatformsOfGame($base)
        {
            $query="Select * from game_platform where game_number=".$this->game_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $code=$row['platform_code'];
                    $platform=new Platform();
                    $platform->setPlatform_code($code);
                    $platform->loadPlatform($base);
                    $this->theGamePlatforms[]=$platform;
                }
            }
        }
        
        //Load the users who own the game
        public function loadAllOwnersOfGame($base)
        {
            $query="Select DISTINCT user_number from user_own_game_platform where game_number=".$this->game_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $this->theGameOwners[]=$user;
                }
            }
        }
        
         //Load the users who add the game to their whishlist
        public function loadAllWhishlistsOfGame($base)
        {
            $query="Select DISTINCT user_number from user_whishlist where game_number=".$this->game_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $this->theGameWhishlists[]=$user;
                }
            }
        }
        
        public function getGamePosts()
        {
            return $this->theGamePosts;
        }
        
        //Load the posts of the user
        public function loadGamePosts($base)
        {
            $query="Select * from post where post_game_number=".$this->game_number." ORDER BY post_date DESC";
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
                    $this->theGamePosts[]=$post;
                }
            }
            return($posts_exist);
        }
        
        public function getGameSessions()
        {
            return $this->theGameSessions;
        }
        
        //Load the sessions played on the game
        public function loadGameSessions($base)
        {
            $query="Select * from session where session_game_number=".$this->game_number." ORDER BY session_creation_date DESC";
            $data=$base->fetch_all_array($query);
            $game_sessions_exist=false;
            if(!empty($data))
            {
                $game_sessions_exist=true;
                foreach($data as $row)
                {
                    $number=$row['session_number'];
                    $session=new Session();
                    $session->setSession_number($number);
                    $session->loadSession($base);
                    $this->theGameSessions[]=$session;
                }
            }
            return($game_sessions_exist);
        }
        
        public function getGameChallenges()
        {
            return $this->theGameChallenges;
        }
        
        //Load the challenges played on the game
        public function loadGameChallenges($base)
        {
            $query="Select * from challenge where challenge_game_number=".$this->game_number." ORDER BY challenge_creation_date DESC";
            $data=$base->fetch_all_array($query);
            $game_challenges_exist=false;
            if(!empty($data))
            {
                $game_challenges_exist=true;
                foreach($data as $row)
                {
                    $number=$row['challenge_number'];
                    $challenge=new Challenge();
                    $challenge->setChallenge_number($number);
                    $challenge->loadChallenge($base);
                    $this->theGameChallenges[]=$challenge;
                }
            }
            return($game_challenges_exist);
        }
        
        public function getGameDuels()
        {
            return $this->theGameDuels;
        }
        
        //Load the duels played on the game
        public function loadGameDuels($base)
        {
            $query="Select * from duel where duel_game_number=".$this->game_number." ORDER BY duel_creation_date DESC";
            $data=$base->fetch_all_array($query);
            $game_duels_exist=false;
            if(!empty($data))
            {
                $game_duels_exist=true;
                foreach($data as $row)
                {
                    $number=$row['duel_number'];
                    $duel=new Duel();
                    $duel->setDuel_number($number);
                    $duel->loadDuel($base);
                    $this->theGameDuels[]=$duel;
                }
            }
            return($game_duels_exist);
        }
        
        public function getGameAvailabilities()
        {
            return $this->theGameAvailabilities;
        }
        
        //Load the availabilities played on the game
        public function loadGameAvailabilities($base)
        {
            $query="Select * from availability where availability_game_number=".$this->game_number." ORDER BY availability_creation_date DESC";
            $data=$base->fetch_all_array($query);
            $game_availabilities_exist=false;
            if(!empty($data))
            {
                $game_availabilities_exist=true;
                foreach($data as $row)
                {
                    $number=$row['availability_number'];
                    $availability=new Availability();
                    $availability->setAvailability_number($number);
                    $availability->loadAvailability($base);
                    $this->theGameAvailabilities[]=$availability;
                }
            }
            return($game_availabilities_exist);
        }
        
        public function getGameGoals()
        {
            return $this->theGameGoals;
        }
        
        //Load the goals played on the game
        public function loadGameGoals($base)
        {
            $query="Select * from goal where goal_game_number=".$this->game_number." ORDER BY goal_creation_date DESC";
            $data=$base->fetch_all_array($query);
            $game_goals_exist=false;
            if(!empty($data))
            {
                $game_goals_exist=true;
                foreach($data as $row)
                {
                    $number=$row['goal_number'];
                    $goal=new Goal();
                    $goal->setGoal_number($number);
                    $goal->loadGoal($base);
                    $this->theGameGoals[]=$goal;
                }
            }
            return($game_goals_exist);
        }
        
        public function getGameEvents()
        {
            return $this->theGameEvents;
        }
        
        //Load the events played on the game
        public function loadGameEvents($base)
        {
            $query="Select * from event where event_game_number=".$this->game_number;
            $data=$base->fetch_all_array($query);
            $game_events_exist=false;
            if(!empty($data))
            {
                $game_events_exist=false;
                foreach($data as $row)
                {
                    $number=$row['event_number'];
                    $event=new Event();
                    $event->setEvent_number($number);
                    $event->loadEvent($base);
                    $this->theGameEvents[]=$event;
                }
            }
            return($game_events_exist);
        }
        
        //Load the users who own the game as main game
        public function loadAllOwnersOfGameAsMain($base)
        {
            $query="Select user_number from user where user_main_game_number=".$this->game_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $this->theGameOwnersAsMain[]=$user;
                }
            }
        }
        
        //Load the teams who own the game as main game
        public function loadAllTeamsOfGameAsMain($base)
        {
            $query="Select team_number from team where team_main_game_number=".$this->game_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['team_number'];
                    $team=new Team();
                    $team->setTeam_number($number);
                    $team->loadTeam($base);
                    $this->theGameTeamsAsMain[]=$team;
                }
            }
        }
        
        //Load the communities who own the game as main game
        public function loadAllCommunitiesOfGameAsMain($base)
        {
            $query="Select community_number from community where community_main_game_number=".$this->game_number;
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['community_number'];
                    $community=new Community();
                    $community->setCommunity_number($number);
                    $community->loadCommunity($base);
                    $this->theGameCommunitiesAsMain[]=$team;
                }
            }
        }
        
        //Insert
        public function insert($base)
        {
            $query="insert into game (`game_name`, `game_cover_url`) ";
            $query.="values ('".$this->game_name."', '".$this->game_cover_url."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function update($base)
        {
            $query="update game set game_name='".$this->game_name."', game_cover_url='".$this->game_cover_url."' where =".$this->game_number;
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from game where =".$this->game_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>