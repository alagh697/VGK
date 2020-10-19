<?php

    class User_wishlist
    {
	
        private $user;
        private $game;
        private $platform;
        private $wishlist_add_date;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($user, $game, $platform, $wishlist_add_date)
        {
            $this->user=$user;
            $this->game=$game;
            $this->platform=$platform;
            $this->wishlist_add_date=$wishlist_add_date;
        }
        
        public function setForInsertUser_wishlist($user, $game, $platform)
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

        //Whishlist_add_date
        public function setWishlist_add_date($wishlist_add_date)
        {
            $this->wishlist_add_date=$wishlist_add_date;
        }

        public function getWishlist_add_date()
        {
            return $this->wishlist_add_date;
        }

        //Database methods
        //Load
        //test if the user has this version of the game in his wishlist
        public function loadWishlistGame($base)
        {
            $query="Select * from user_wishlist where user_number=".$this->user->getUser_number()." AND game_number=".$this->game->getGame_number()." AND platform_code='".$this->platform->getPlatform_code()."'";
            $data=$base->fetch_all_array($query);
            $whishlist_game_exist=false;
            if(!empty($data))
            {
                $whishlist_game_exist=true;
                foreach($data as $row)
                {
                    $this->wishlist_add_date=$row['wishlist_add_date'];  
                }
            }
            return($whishlist_game_exist);
        }
		
        //Insert
        public function insert($base)
        {
            $query="insert into user_wishlist (`user_number`, `game_number`, `platform_code`, `wishlist_add_date`) ";
            $query.="values ('".$this->user->getUser_number()."', '".$this->game->getGame_number()."', '".$this->platform->getPlatform_code()."', NOW())";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from user_wishlist where user_number=".$this->user->getUser_number()." and game_number=".$this->game->getGame_number()." and platform_code='".$this->platform->getPlatform_code()."'";
            $ok=$base->query($query);
            return $ok;
        }
    }
?>