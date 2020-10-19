<?php

    class User_own_game_platform
    {

        private $user;
        private $game;
        private $platform;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($user, $game, $platform)
        {
            $this->user=$user;
            $this->game=$game;
            $this->platform=$platform;
        }

        //Getter Setter
        //User
        public function setUser($user)
        {
            $this->user=$user;
        }

        public function getUser()
        {
            return $this->user;
        }

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
        //Load
        //test if the user owned the game on that platform
        public function loadOwnedGame($base)
        {
            $query="Select * from user_own_game_platform where user_number=".$this->user->getUser_number()." AND game_number=".$this->game->getGame_number()." AND platform_code='".$this->platform->getPlatform_code()."'";
            $data=$base->fetch_all_array($query);
            $owned_game_exist=false;
            if(!empty($data))
            {
                $owned_game_exist=true;
            }
            return($owned_game_exist);
        }


        //Insert
        public function insert($base)
        {
            $query="insert into user_own_game_platform (`user_number`, `game_number`, `platform_code`) ";
            $query.="values (".$this->user->getUser_number().", ".$this->game->getGame_number().", '".$this->platform->getPlatform_code()."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from  where user_number=".$this->user->getUser_number()." and game_number=".$this->game->getGame_number()." and platform_code='".$this->platform->getPlatform_code()."'";
            $ok=$base->query($query);
            return $ok;
        }
    }
?>