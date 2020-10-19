<?php

    class Session
    {

        private $session_number;
        private $session_host;
        private $session_game;
        private $session_platform;
        private $session_max_player;
        private $session_title;
        private $session_description;
        private $session_creation_date;
        private $session_start_date;
        private $session_end_date;
        private $session_microphone;
        private $session_private;
        
        private $theSessionJoiners=array();
        private $theSessionInvitations=array();

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $host, $game, $platform, $max_player, $title, $description, $creation_date, $start_date, $end_date, $microphone, $private)
        {
            $this->session_number=$number;
            $this->session_host=$host;
            $this->session_game=$game;
            $this->session_platform=$platform;
            $this->session_max_player=$max_player;
            $this->session_title=$title;
            $this->session_description=$description;
            $this->session_creation_date=$creation_date;
            $this->session_start_date=$start_date;
            $this->session_end_date=$end_date;
            $this->session_microphone=$microphone;
            $this->session_private=$private;
        }

        public function setForInsertSession($host, $game, $platform, $max_player, $title, $description, $start_date, $end_date, $microphone, $private)
        {
            $this->session_host=$host;
            $this->session_game=$game;
            $this->session_platform=$platform;
            $this->session_max_player=$max_player;
            $this->session_title=$title;
            $this->session_description=$description;
            $this->session_start_date=$start_date;
            $this->session_end_date=$end_date;
            $this->session_microphone=$microphone;
            $this->session_private=$private;
        }


        //Getter Setter
        //Session_number
        public function setSession_number($number)
        {
            $this->session_number=$number;
        }

        public function getSession_number()
        {
            return $this->session_number;
        }

        //Session_host
        public function setSession_host($host)
        {
            $this->session_host=$host;
        }

        public function getSession_host()
        {
            return $this->session_host;
        }

        //Session_game
        public function setSession_game($game)
        {
            $this->session_game=$game;
        }

        public function getSession_game()
        {
            return $this->session_game;
        }

        //Session_platform
        public function setSession_platform($platform)
        {
            $this->session_platform=$platform;
        }

        public function getSession_platform()
        {
            return $this->session_platform;
        }

        //Session_max_player
        public function setSession_max_player($max_player)
        {
            $this->session_max_player=$max_player;
        }

        public function getSession_max_player()
        {
            return $this->session_max_player;
        }

        //Session_title
        public function setSession_title($title)
        {
            $this->session_title=$title;
        }

        public function getSession_title()
        {
            return $this->session_title;
        }

        //Session_description
        public function setSession_description($description)
        {
            $this->session_description=$description;
        }

        public function getSession_description()
        {
            return $this->session_description;
        }

        //Session_creation_date
        public function setSession_creation_date($creation_date)
        {
            $this->session_creation_date=$creation_date;
        }

        public function getSession_creation_date()
        {
            return $this->session_creation_date;
        }

        //Session_start_date
        public function setSession_start_date($start_date)
        {
            $this->session_start_date=$start_date;
        }

        public function getSession_start_date()
        {
            return $this->session_start_date;
        }

        //Session_end_date
        public function setSession_end_date($end_date)
        {
            $this->session_end_date=$end_date;
        }

        public function getSession_end_date()
        {
            return $this->session_end_date;
        }

        //Session_microphone
        public function setSession_microphone($microphone)
        {
            $this->session_microphone=$microphone;
        }

        public function getSession_microphone()
        {
            return $this->session_microphone;
        }

        //Session_private
        public function setSession_private($private)
        {
            $this->session_private=$private;
        }

        public function getSession_private()
        {
            return $this->session_private;
        }

        //Database methods
        //Load
        //Load 1
        public function loadSession($base)
        {
            $query="Select * from session where session_number=".$this->session_number;
            $data=$base->fetch_all_array($query);
            $session_exist=false;
            if(!empty($data))
            {
                $session_exist=true;
                foreach($data as $row)
                {
                    $user_number=$row['session_host_number'];
                    $game_number=$row['session_game_number'];
                    $platform_code=$row['session_platform_code'];
                    $user=new User();
                    $user->setUser_number($user_number);
                    $user->loadUser($base);
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $platform=new Platform();
                    $platform->setPlatform_code($platform_code);
                    $platform->loadPlatform($base);
                    $this->session_host=$user;
                    $this->session_game=$game;
                    $this->session_platform=$platform;
                    $this->session_max_player=$row['session_max_player'];
                    $this->session_title=$row['session_title'];
                    $this->session_description=$row['session_description'];
                    $this->session_creation_date=$row['session_creation_date'];
                    $this->session_start_date=$row['session_start_date'];
                    $this->session_end_date=$row['session_end_date'];
                    $this->session_microphone=$row['session_microphone'];
                    $this->session_private=$row['session_private'];
                }
            }
            return($session_exist);
        }

        
        public function getSessionJoiners()
        {
            return $this->theSessionJoiners;
        }
        
        //Load list
        public function loadSessionJoiners($base)
        {
            $query="Select * from session_joiner where join_session_number=".$this->session_number;
            $data=$base->fetch_all_array($query);
            $session_joiners_exist=false;
            if(!empty($data))
            {
                $session_joiners_exist=true;
                foreach($data as $row)
                {
                    $number=$row['join_user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $joiner=new Session_joiner();
                    $joiner->setJoin_user($user);
                    $joiner->setJoin_session($this);
                    $joiner->loadSession_joiner($base);
                    $this->theSessionJoiners[]=$joiner;
                }
            }
            return($session_joiners_exist);
        }
        
        public function getSessionInvitations()
        {
            return $this->theSessionInvitations;
        }
        
        //Load the invitations sent for the session  
        public function loadAllSessionInvitations($base)
        {
            $query="Select * from session_invitation where invitation_session_number=".$this->session_number;
            $data=$base->fetch_all_array($query);
            $session_invitations_exist=false;
            if(!empty($data))
            {
                $session_invitations_exist=true;
                foreach($data as $row)
                {
                    $number=$row['invitation_user_number'];
                    $user=new User();
                    $user->setUser_number($number);
                    $user->loadUser($base);
                    $invitation=new Session_inviattion();
                    $invitation->setInvitation_user($user);
                    $invitation->setInvitation_session($this);
                    $invitation->loadSessionInvitation($base);
                    $this->theSessionInvitations[]=$invitation;
                }
            }
            return($session_invitations_exist);
        }
        
        //Session joiner count
        public function getSession_joiner_count($base)
        {
            $query="Select count(*) as joiner_count from session_joiner where join_session_number=".$this->session_number;
            $data=$base->fetch_all_array($query);
            $joiner_count='0';
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $joiner_count=$row['joiner_count'];  
                }
            }
            return($joiner_count);
        }

        //Insert
        public function insert($base)
        {
            $query="insert into session (`session_host_number`, `session_game_number`, `session_platform_code`, `session_max_player`, `session_title`, `session_description`";
            $query.=", `session_creation_date`, `session_start_date`, `session_end_date`, `session_microphone`, `session_private`) ";
            $query.="values ('".$this->session_host->getUser_number()."', '".$this->session_game->getGame_number()."', '".$this->session_platform->getPlatform_code()."', '".$this->session_max_player."', '".$this->session_title."'";
            $query.=", '".$this->session_description."', NOW(), '".$this->session_start_date."', '".$this->session_end_date."', '".$this->session_microphone."', '".$this->session_private."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function updateSessionInfo($base)
        {
            $query="update session set ";
            $query.="where session_number=".$this->session_number;
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from session where session_number=".$this->session_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>