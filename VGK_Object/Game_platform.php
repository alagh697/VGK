<?php
    
    class Game_platform
    {

        private $game;
        private $platform;
        
        private $theGameVersionSessions=array();
        private $theGameVersionDuels=array();
        private $theGameVersionAvailabilities=array();
        private $theGameVersionGoals=array();

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($game, $platform)
        {
            $this->game=$game;
            $this->platform=$platform;
        }

        //Getter Setter
        //Game
        public function setGame($game)
        {
            $this->game=$game;
        }

        public function getGame()
        {
            return $this->game;
        }

        //Platform
        public function setPlatform($platform)
        {
            $this->platform=$platform;
        }

        public function getPlatform()
        {
            return $this->platform;
        }


        //Database methods
        //Load one
        //Test if a game is available on a platform
        public function loadGamePlatform($base)
        {
            $query="Select * from game_platform where platform_code='".$this->platform->getPlatform_code()."' AND game_number=".$this->game->getGame_number();
            $data=$base->fetch_all_array($query);
            $version_exist=false;
            if(!empty($data))
            {
                $version_exist=true;
            }
            return($version_exist);
        }
        
        //Load the platforms for a game
        public function loadAllPlatformsOneGame($base,$game)
        {

        }
        
        
        //Load the platforms for a game
        public function loadAllGamesOnePlatform($base,$platform)
        {
            $query="Select * from game_platform where platform_code='".$platform->getPlatform_code()."'";
            $data=$base->fetch_all_array($query);
            $theGames=array();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['game_number'];
                    $game=new Game();
                    $game->setGame_number($number);
                    $game->loadGameByNumber($base);
                    $theGames[]=$game;
                }
            }
            return $theGames;
        }
        
        public function getGameVersionSessions()
        {
            return $this->theGameVersionSessions;
        }
        
        //Load the sessions played on the game
        public function loadGameVersionSessions($base)
        {
            $query="Select * from session where session_game_number=".$this->game->getGame_number()." AND session_platform_code='".$this->platform->getPlatform_code()."'";
            $data=$base->fetch_all_array($query);
            $game_version_sessions_exist=false;
            if(!empty($data))
            {
                $game_version_sessions_exist=true;
                foreach($data as $row)
                {
                    $number=$row['session_number'];
                    $session=new Session();
                    $session->setSession_number($number);
                    $session->loadSession($base);
                    $this->theGameVersionSessions[]=$session;
                }
            }
            return($game_version_sessions_exist);
        }
        
        public function getGameVersionDuels()
        {
            return $this->theGameVersionDuels;
        }
        
        //Load the duels played on the game
        public function loadGameVersionDuels($base)
        {
            $query="Select * from duel where duel_game_number=".$this->game->getGame_number()." AND duel_platform_code='".$this->platform->getPlatform_code()."'";
            $data=$base->fetch_all_array($query);
            $game_version_duels_exist=false;
            if(!empty($data))
            {
                $game_version_duels_exist=true;
                foreach($data as $row)
                {
                    $number=$row['duel_number'];
                    $duel=new Duel();
                    $duel->setDuel_number($number);
                    $duel->loadDuel($base);
                    $this->theGameVersionDuels[]=$duel;
                }
            }
            return($game_version_duels_exist);
        }
        
        public function getGameVersionAvailabilities()
        {
            return $this->theGameVersionAvailabilities;
        }
        
        //Load the availabilities played on the game
        public function loadGameVersionAvailabilities($base)
        {
            $query="Select * from availability where availability_game_number=".$this->game->getGame_number()." AND availability_platform_code='".$this->platform->getPlatform_code()."'";
            $data=$base->fetch_all_array($query);
            $game_version_availabilities_exist=false;
            if(!empty($data))
            {
                $game_version_availabilities_exist=true;
                foreach($data as $row)
                {
                    $number=$row['availability_number'];
                    $availability=new Availability();
                    $availability->setAvailability_number($number);
                    $availability->loadAvailability($base);
                    $this->theGameVersionAvailabilities[]=$availability;
                }
            }
            return($game_version_availabilities_exist);
        }
        
        public function getGameVersionGoals()
        {
            return $this->theGameVersionGoals;
        }
        
        //Load the goals played on the game
        public function loadGameVersionGoals($base)
        {
            $query="Select * from goal where goal_game_number=".$this->game->getGame_number()." AND goal_platform_code='".$this->platform->getPlatform_code()."'";
            $data=$base->fetch_all_array($query);
            $game_version_goals_exist=false;
            if(!empty($data))
            {
                $game_version_goals_exist=true;
                foreach($data as $row)
                {
                    $number=$row['goal_number'];
                    $goal=new Goal();
                    $goal->setGoal_number($number);
                    $goal->loadGoal($base);
                    $this->theGameVersionGoals[]=$goal;
                }
            }
            return($game_version_goals_exist);
        }

        //Insert
        public function insert($base)
        {
            $query="insert into gamme_platform (`game_number`, `platform_code`) ";
            $query.="values ('".$this->game->getGame_number()."', '".$this->platform->getPlatform_code()."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from game_platform where game_number=".$this->game->getGame_number()." and platform_code=".$this->platform->getPlatform_code();
            $ok=$base->query($query);
            return $ok;
        }
    }
?>