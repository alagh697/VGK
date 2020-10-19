<?php

    class Platform
    {

        private $platform_code;
        private $platform_name;
        
        private $thePlatformGames=array();

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($code, $name)
        {
            $this->platform_code=$code;
            $this->platform_name=$name;
        }

        //Getter Setter
        //Platform_code
        public function setPlatform_code($code)
        {
            $this->platform_code=$code;
        }

        public function getPlatform_code()
        {
            return $this->platform_code;
        }

        //Platform_name
        public function setPlatform_name($name)
        {
            $this->platform_name=$name;
        }

        public function getPlatform_name()
        {
            return $this->platform_name;
        }
        
        //thePlatformGames
        public function setPlatformGames($PlatformGames)
        {
            $this->thePlatformGames=$PlatformGames;
        }

        public function getPlatformGames()
        {
            return $this->thePlatformGames;
        }


        //Database methods
        //Load
        //Load 1
        public function loadPlatform($base)
        {
            $query="Select * from platform where platform_code='".$this->platform_code."'";
            $data=$base->fetch_all_array($query);
            $platform_exist=false;
            if(!empty($data))
            {
                $platform_exist=true;
                foreach($data as $row)
                {
                    $this->platform_name=$row['platform_name'];
                } 
            }
            return($platform_exist);
        }

        //Load list
        public static function loadAllPlatforms($base)
        {
            $query="Select * from platform";
            $data=$base->fetch_all_array($query);
            $thePlatforms=array();
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $code=$row['platform_code'];
                    $name=$row['platform_name'];
                    $platform=new Platform();
                    $platform->setAll($code, $name);
                    $thePlatforms[]=$platform;
                }
            }
            return $thePlatforms;
        }
		
        
        //Load the games of the platform
        public function loadAllGamesOfPlatform($base)
        {
            $query="Select * from game_platform where platform_code='".$this->platform_code."'";
            $data=$base->fetch_all_array($query);
            if(!empty($data))
            {
                foreach($data as $row)
                {
                    $number=$row['game_number'];
                    $game=new Game();
                    $game->setGame_number($number);
                    $game->loadGame($base);
                    $this->thePlatformGames[]=$game;
                }
            }
        }
        
        //Insert
        public function insert($base)
        {
            $query="insert into platform (`platform_code`, `platform_name`) ";
            $query.="values ('".$this->platform_code."', '".$this->platform_name."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Update
        public function update($base)
        {
            $query="update game set platform_code='".$this->platform_code."', platform_name='".$this->platform_name."' where platform_code='".$this->platform_code."'";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from platform where platform_code=".$this->platform_code;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>