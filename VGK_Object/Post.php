<?php

    class Post
    {

        private $post_number;
        private $post_user;
        private $post_target_user;
        private $post_game;
        private $post_platform;
        private $post_message;
        private $post_date;
        private $post_event_url;

        //Constructeurs
        public function __construct()
        {
        }

        //Insert
        public function setAll($number, $user, $game, $platform, $message, $date, $event_url)
        {
            $this->post_number=$number;
            $this->post_user=$user;
            $this->post_game=$game;
            $this->post_platform=$platform;
            $this->post_message=$message;
            $this->post_date=$date;
            $this->post_event_url=$event_url;
        }

        public function setForInsertPost($user, $target_user, $game, $platform, $message, $event_url)
        {
            $this->post_user=$user;
            $this->post_target_user=$target_user;
            $this->post_game=$game;
            $this->post_platform=$platform;
            $this->post_message=$message;
            $this->post_event_url=$event_url;
        }

        //Getter Setter
        //Post_number
        public function setPost_number($number)
        {
            $this->post_number=$number;
        }

        public function getPost_number()
        {
            return $this->post_number;
        }

        //Post_user
        public function setPost_user($user)
        {
            $this->post_user=$user;
        }

        public function getPost_user()
        {
            return $this->post_user;
        }
        
        //Post target_user
        public function setPost_target_user($target_user)
        {
            $this->post_target_user=$target_user;
        }

        public function getPost_target_user()
        {
            return $this->post_target_user;
        }
        
        //Post_game
        public function setPost_game($game)
        {
            $this->post_game=$game;
        }

        public function getPost_game()
        {
            return $this->post_game;
        }

        //Post_platform
        public function setPost_platform($platform)
        {
            $this->post_platform=$platform;
        }

        public function getPost_platform()
        {
            return $this->post_platform;
        }

        //Post_message
        public function setPost_message($message)
        {
            $this->post_message=$message;
        }

        public function getPost_message()
        {
            return $this->post_message;
        }

        //Post_date
        public function setPost_date($date)
        {
            $this->post_date=$date;
        }

        public function getPost_date()
        {
            return $this->post_date;
        }

        //Post_event_url
        public function setPost_event_url($event_url)
        {
            $this->post_event_url=$event_url;
        }

        public function getPost_event_url()
        {
            return $this->post_event_url;
        }

        //Database methods
        //Load
        //Load 1
        public function loadPost($base)
        {
            $query="Select * from post where post_number=".$this->post_number;
            $data=$base->fetch_all_array($query);
            $post_exist=false;
            if(!empty($data))
            {
                $post_exist=true;
                foreach($data as $row)
                {
                    $user_number=$row['post_user_number'];
                    $game_number=$row['post_game_number'];
                    $platform_code=$row['post_platform_code'];
                    $this->post_user=new User();
                    $this->post_user->setUser_number($user_number);
                    $this->post_user->loadUser($base);
                    $this->post_game=new Game();
                    $this->post_game->setGame_number($game_number);
                    $this->post_game->loadGame($base);
                    $this->post_platform=new Platform();
                    $this->post_platform->setPlatform_code($platform_code);
                    $this->post_platform->loadPlatform($base);
                    $this->post_message=$row['post_message'];
                    $this->post_date=$row['post_date'];
                    $this->post_event_url=$row['post_event_url'];
                }
            }
            return($post_exist);
        }
        
        //Insert
        public function insert($base)
        {
            $query="insert into post (`post_user_number`, `post_target_user_number`, `post_game_number`, `post_platform_code`, `post_message`, `post_date`, `post_event_url`) ";
            $query.="values (".$this->post_user->getUser_number().", ".$this->post_target_user->getUser_number().", ".$this->post_game->getGame_number().", '".$this->post_platform->getPlatform_code()."', '".$this->post_message."', NOW(), '".$this->post_event_url."')";
            $ok=$base->query($query);
            return $ok;
        }

        //Delete
        public function delete($base)
        {
            $query="delete from post where post_number=".$this->post_number;
            $ok=$base->query($query);
            return $ok;
        }
    }
?>