<?php

    class Availability
    {

        private $availability_number;
        private $availability_user;
        private $availability_game;
        private $availability_platform;
        private $availability_title;
        private $availability_description;
        private $availability_creation_date;
        private $availability_start_date;
        private $availability_end_date;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setForInsertAvailability($user, $game, $platform, $title, $description, $start_date, $end_date)
        {
            $this->availability_user=$user;
            $this->availability_game=$game;
            $this->availability_platform=$platform;
            $this->availability_title=$title;
            $this->availability_description=$description;
            $this->availability_start_date=$start_date;
            $this->availability_end_date=$end_date;
        }

        public function setAll($number, $user, $game, $platform, $title, $description, $creation_date, $start_date, $end_date)
        {
            $this->availability_number=$number;
            $this->availability_user=$user;
            $this->availability_game=$game;
            $this->availability_platform=$platform;
            $this->availability_title=$title;
            $this->availability_description=$description;
            $this->availability_creation_date=$creation_date;
            $this->availability_start_date=$start_date;
            $this->availability_end_date=$end_date;
        }

        //Getter Setter
        //Availability_number
        public function setAvailability_number($number)
        {
            $this->availability_number=$number;
        }

        public function getAvailability_number()
        {
            return $this->availability_number;
        }
        
        //Availability_user
        public function setAvailability_user($user)
        {
            $this->availability_user=$user;
        }

        public function getAvailability_user()
        {
            return $this->availability_user;
        }
        
        //Availability_game
        public function setAvailability_game($game)
        {
            $this->availability_game=$game;
        }

        public function getAvailability_game()
        {
            return $this->availability_game;
        }
        
        //Availability_platform
        public function setAvailability_platform($platform)
        {
            $this->availability_platform=$platform;
        }

        public function getAvailability_platform()
        {
            return $this->availability_platform;
        }
        
        //Availability_title
        public function setAvailability_title($title)
        {
            $this->availability_title=$title;
        }

        public function getAvailability_title()
        {
            return $this->availability_title;
        }
        
        //Availability_description
        public function setAvailability_description($description)
        {
            $this->availability_description=$description;
        }

        public function getAvailability_description()
        {
            return $this->availability_description;
        }
        
        //Availability_creation_date
        public function setAvailability_creation_date($creation_date)
        {
            $this->availability_creation_date=$creation_date;
        }

        public function getAvailability_creation_date()
        {
            return $this->availability_creation_date;
        }
        
        //Availability_start_date
        public function setAvailability_start_date($start_date)
        {
            $this->availability_start_date=$start_date;
        }

        public function getAvailability_start_date()
        {
            return $this->availability_start_date;
        }
        
        //Availability_end_date
        public function setAvailability_end_date($end_date)
        {
            $this->availability_end_date=$end_date;
        }

        public function getAvailability_end_date()
        {
            return $this->availability_end_date;
        }


        //Database methods
        //Load
        //Load 1
        public function loadAvailability($base)
        {
            $query="Select * from availability where availability_number=".$this->availability_number;
            $data=$base->fetch_all_array($query);
            $availability_exist=false;
            if(!empty($data))
            {
                $availability_exist=true;
                foreach($data as $row)
                {
                    $user_number=$row['availability_user_number'];
                    $game_number=$row['availability_game_number'];
                    $platform_code=$row['availability_platform_code'];
                    $user=new User();
                    $user->setUser_number($user_number);
                    $user->loadUser($base);
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $platform=new Platform();
                    $platform->setPlatform_code($platform_code);
                    $platform->loadPlatform($base);
                    $this->availability_user=$user;
                    $this->availability_game=$game;
                    $this->availability_platform=$platform;
                    $this->availability_title=$row['availability_title'];
                    $this->availability_description=$row['availability_description'];
                    $this->availability_creation_date=$row['availability_creation_date'];
                    $this->availability_start_date=$row['availability_start_date'];
                    $this->availability_end_date=$row['availability_end_date'];
                }
            }
            return($availability_exist);
        }

        //Load list
        public static function loadAllAvailabilities($base)
        {
            $query="Select * from availability";
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

        //Insert
        public function insert($base)
        {
            $query="insert into availability (`availability_user_number`, `availability_game_number`, `availability_platform_code`, `availability_title`, `availability_description`, `availability_creation_date`, `availability_start_date`, `availability_end_date`) ";
            $query.="values ('".$this->availability_user->getUser_number()."', '".$this->availability_game->getGame_number()."', '".$this->availability_platform->getPlatform_code()."', ";
            $query.="'".$this->availability_title."', '".$this->availability_description."', NOW(), '".$this->availability_start_date."', '".$this->availability_end_date."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function update($base)
        {
            $query="update availability set ";
            $query.="where =".$this->availability_number;
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from availability where availability_number=".$this->availability_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>