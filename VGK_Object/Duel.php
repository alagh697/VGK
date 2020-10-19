<?php

    class Duel
    {

        private $duel_number;
        private $duel_originator;
        private $duel_target;
        private $duel_game;
        private $duel_platform;
        private $duel_title;
        private $duel_description;
        private $duel_creation_date;
        private $duel_start_date;
        private $duel_end_date;
        private $duel_winner;
        private $duel_progress;
        private $duel_target_confirmation;


        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $originator, $target, $game, $platform, $title, $description, $creation_date, $start_date, $end_date, $winner, $progress, $target_confirmation)
        {
            $this->duel_number=$number;
            $this->duel_originator=$originator;
            $this->duel_target=$target;
            $this->duel_game=$game;
            $this->duel_platform=$platform;
            $this->duel_title=$title;
            $this->duel_description=$description;
            $this->duel_creation_date=$creation_date;
            $this->duel_start_date=$start_date;
            $this->duel_end_date=$end_date;
            $this->duel_winner=$winner;
            $this->duel_progress=$progress;
            $this->duel_target_confirmation=$target_confirmation;
        }

        public function setForInsertDuel($originator, $target, $game, $platform, $title, $description)
        {
            $this->duel_originator=$originator;
            $this->duel_target=$target;
            $this->duel_game=$game;
            $this->duel_platform=$platform;
            $this->duel_title=$title;
            $this->duel_description=$description;
        }

        //Getter Setter
        //Duel_number
        public function setDuel_number($number)
        {
            $this->duel_number=$number;
        }

        public function getDuel_number()
        {
            return $this->duel_number;
        }

        //Duel_originator
        public function setDuel_originator($originator)
        {
            $this->duel_originator=$originator;
        }

        public function getDuel_originator()
        {
            return $this->duel_originator;
        }

        //Duel_target
        public function setDuel_target($target)
        {
            $this->duel_target=$target;
        }

        public function getDuel_target()
        {
            return $this->duel_target;
        }

        //Duel_game
        public function setDuel_game($game)
        {
            $this->duel_game=$game;
        }

        public function getDuel_game()
        {
            return $this->duel_game;
        }

        //Duel_platform
        public function setDuel_platform($platform)
        {
            $this->duel_platform=$platform;
        }

        public function getDuel_platform()
        {
            return $this->duel_platform;
        }

        //Duel_title
        public function setDuel_title($title)
        {
            $this->duel_title=$title;
        }

        public function getDuel_title()
        {
            return $this->duel_title;
        }

        //Duel_description
        public function setDuel_description($description)
        {
            $this->duel_description=$description;
        }

        public function getDuel_description()
        {
            return $this->duel_description;
        }

        //Duel_creation_date
        public function setDuel_creation_date($creation_date)
        {
            $this->duel_creation_date=$creation_date;
        }

        public function getDuel_creation_date()
        {
            return $this->duel_creation_date;
        }

        //Duel_start_date
        public function setDuel_start_date($start_date)
        {
            $this->duel_start_date=$start_date;
        }

        public function getDuel_start_date()
        {
            return $this->duel_start_date;
        }

        //Duel_end_date
        public function setDuel_end_date($end_date)
        {
            $this->duel_end_date=$end_date;
        }

        public function getDuel_end_date()
        {
            return $this->duel_end_date;
        }

        //Duel_winner
        public function setDuel_winner($winner)
        {
            $this->duel_winner=$winner;
        }

        public function getDuel_winner()
        {
            return $this->duel_winner;
        }

        //Duel_progress
        public function setDuel_progress($progress)
        {
            $this->duel_progress=$progress;
        }

        public function getDuel_progress()
        {
            return $this->duel_progress;
        }

        //Duel_target_confirmation
        public function setDuel_target_confirmation($target_confirmation)
        {
            $this->duel_target_confirmation=$target_confirmation;
        }

        public function getDuel_target_confirmation()
        {
            return $this->duel_target_confirmation;
        }

        //Database methods
        //Load
        //Load 1
        public function loadDuel($base)
        {
            $query="Select * from duel where duel_number=".$this->duel_number;
            $data=$base->fetch_all_array($query);
            $duel_exist=false;
            if(!empty($data))
            {
                $duel_exist=true;
                foreach($data as $row)
                {
                    $user_number=$row['duel_originator_number'];
                    $target_number=$row['duel_target_number'];
                    $game_number=$row['duel_game_number'];
                    $platform_code=$row['duel_platform_code'];
                    $user=new User();
                    $user->setUser_number($user_number);
                    $user->loadUser($base);
                    $target=new User();
                    $target->setUser_number($target_number);
                    $target->loadUser($base);
                    $game=new Game();
                    $game->setGame_number($game_number);
                    $game->loadGame($base);
                    $platform=new Platform();
                    $platform->setPlatform_code($platform_code);
                    $platform->loadPlatform($base);
                    $this->duel_originator=$user;
                    $this->duel_target=$target;
                    $this->duel_game=$game;
                    $this->duel_platform=$platform;
                    $this->duel_title=$row['duel_title'];
                    $this->duel_description=$row['duel_description'];
                    $this->duel_creation_date=$row['duel_creation_date'];
                    $this->duel_start_date=$row['duel_start_date'];
                    $this->duel_end_date=$row['duel_end_date'];
                    $winner_number=$row['duel_winner_number'];
                    $this->duel_winner=new User();
                    $this->duel_winner->setUser_number($winner_number);
                    $winner_exist=$this->duel_winner->loadUser($base);
                    if(!($winner_exist))
                    {
                        $this->duel_winner->setUser_id('');
                    }
                    $this->duel_progress=$row['duel_progress'];
                    $this->duel_target_confirmation=$row['duel_target_confirmation'];
                }
            }
            return($duel_exist);
        }

        //Load list

        //Insert
        public function insert($base)
        {
            $query="insert into duel (`duel_originator_number`, `duel_target_number`, `duel_game_number`, `duel_platform_code`, `duel_title`, `duel_description`, `duel_creation_date`) ";
            $query.="values ('".$this->duel_originator->getUser_number()."', '".$this->duel_target->getUser_number()."', '".$this->duel_game->getGame_number()."', '".$this->duel_platform->getPlatform_code()."', '".$this->duel_title."', '".$this->duel_description."', NOW())";
            $ok=$base->query($query);
            return $ok;
        }

        //Updates
        //Set the start date when the target accept the duel
        public function updateDuelStart($base)
        {
            $query="update duel set duel_start_date=NOW() ";
            $query.="where duel_number=".$this->duel_number;
            $ok=$base->query($query);
            return $ok;
        }
        
        public function updateDuelResult($base)
        {
            $query="update duel set duel_end_date=NOW(), duel_winner_number=".$this->duel_winner->getUser_number().", duel_progress='".$this->duel_progress."' ";
            $query.="where duel_number=".$this->duel_number;
            $ok=$base->query($query);
            return $ok;
        }
        
        public function updateDuelConfirm($base)
        {
            $query="update duel set duel_target_confirmation=1 ";
            $query.="where duel_number=".$this->duel_number;
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from duel where duel_number=".$this->duel_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>